<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function SignUp(Request $request){
        $validator = Validator::make($request->all(),
            User::$rules,
            [
                'required' => trans('validation.required'),
                'string' => trans('validation.string'),
                'email' => trans('validation.email'),
                'unique' => trans('validation.unique'),
                'same' => trans('validation.same')
            ]
        );

        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],422);
        }
        $code = (rand(1, 1000000));
        $request['code'] = $code;
        $user = User::create($request->input());
        Mail::to($request->email)->send(new \App\Mail\UserVerify($code));
        return response()->json(['message'=>__('lang.userCreated')],200);
    }

    public function verify(Request $request)
    {
        $validatore = Validator::make(
            $request->all(),
            [
                'email' => 'required|email|exists:users,email',
                'code' => 'required'
            ],
            [
                'required' => __('validation.required'),
                'email' => __('validation.email'),
                'exists' => __('validation.exists'),
            ]
        );
        if ($validatore->fails()) {
            return response()->json(['errors' => $validatore->errors()], 422);
        }
        $user = User::where('email', $request->email)->first();
        if ($user->code != $request->code) {
            return response()->json(['message' => __('lang.invalidcode')], 422);
        }
        $user->email_verified_at = today();
        $user->save();
        return response()->json(['message' => __('lang.verified')], 200);
    }
    public function Login()
    {
        $credentials = request(['email', 'password']);
        $credentials['status'] = 1;

        if (!$token = auth('user')->attempt($credentials)) {
            return response()->json(['errors' => __('lang.wrongCredentials')], 422);
        }

        return $this->respondWithToken($token);
    }
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
        ]);
    }

    public function Profile(){
        return response()->json(['profile'=>auth('user')->user()],200);
    }

    public function UpdateProfile(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:users,name,'.auth('user')->user()->id,
            'email' => 'required|email|unique:users,email,' . auth('user')->user()->id,
        ],[
            'required' => __('validation.required'),
            'string' => __('validation.string'),
            'email' => __('validation.email'),
            'unique' => __('validation.unique'),
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $user = User::findOrFail(auth('user')->user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return response()->json(["message" => __('lang.updated'),'profile' => $user], 200);
    }

    public function Logout(){
        auth('user')->logout();

        return response()->json(['message' => __('lang.logout')],200);
    }

    public function ForgetPassword(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
        ],[
            'required' =>__('validation.required'),
            'email' => __('validation.email'),
            'exists' => __('validation.exists'),
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $user = User::where("email", $request->email)->first();

        // check if exists
        if (!$user) {
            return response()->json(["message" => __('lang.userNotFound')], 404);
        }

        $details = (rand(1, 1000000));

        Mail::to($request->email)->send(new \App\Mail\ForgetPassword($details));

        $user->update([
            "reset_code" => $details
        ]);


        return response()->json(["message" => __('lang.checkUrEmail')],200);
    }

    public function ConfrimCode(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'code' => 'required|exists:users,reset_code',
            'password' => 'required|min:8|same:confirm-password'
        ],[
            'required'=>__('validation.required'),
            'email' => __('validation.required'),
            'exists' => __('validation.exists'),
            'min' => __('validation.min'),
            'same' => __('validation.same'),
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $check_email = User::where("email", $request->email)->first();

        // if (!$check_email) {
        //     return response()->json(["message" => __('lang.userNotFound')], 404);
        // }

        // checking email
        if ($check_email->reset_code != $request->code) {
            return response()->json(["message" => __('lang.invalidcode')], 404);
        }

        $check_email->update([
            "password" => $request->password
        ]);


        return response()->json([
            'message' => __('lang.passwordChanded')
        ], 200);
    }

    public function ChangePassword(Request $request){
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required|min:8',
            'confirm-password' => 'required|same:password',
        ],[
            'required' => __('validation.required'),
            'min' => __('validation.min'),
            'same' => __('validation.same'),
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(),], 422);
        }
        $user = auth('user')->user();
        if (Hash::check($request->old_password, $user->password)) {
            $user->update(['password' => $request->password]);
            return response()->json(["message" => __('lang.passwordChanded')], 200);
        } else {
            return response()->json(["message" => __('lang.wrongPassword')], 404);
        }

    }
}