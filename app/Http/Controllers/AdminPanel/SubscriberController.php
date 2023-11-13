<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscriberController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:View Subscriber', ['only' => ['index', 'store']]);
        $this->middleware('permission:Send Email', ['only' => ['store']]);
    }

    public function index()
    {
        $subscribers = Subscriber::all();
        return view('AdminPanel.subscribers.index',get_defined_vars());
    }


    // public function create()
    // {
    //     //
    // }


    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:subscribers,email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        Mail::to($request->email)->send(new \App\Mail\UserEmail($request->subject, $request->message));

        return redirect()->route('subscribers.index')->with('success',__('lang.sended'));
    }

    // public function show($id)
    // {
    //     //
    // }

    // public function edit($id)
    // {
    //     //
    // }

    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // public function destroy($id)
    // {
    //     //
    // }
}
