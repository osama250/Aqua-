<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminPanel\SocialRequest;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:View Social|Add Social|Edit Social|Delete Social', ['only' => ['index', 'store']]);
        $this->middleware('permission:Add Social', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Social', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete Social', ['only' => ['destroy']]);
    }

    public function index()
    {
        $socials =SocialMedia::all();
        return view('AdminPanel.socials.index',get_defined_vars());
    }


    public function create()
    {
        return view('AdminPanel.socials.create');
    }


    public function store(SocialRequest $request)
    {
        SocialMedia::create($request->input());
        return redirect()->route('socials.index')->with('success', __('lang.created'));
    }


    // public function show($id)
    // {
    //     //
    // }


    public function edit($id)
    {
        $social = SocialMedia::findOrFail($id);
        return view('AdminPanel.socials.edit',get_defined_vars());
    }


    public function update(SocialRequest $request, $id)
    {
        $social = SocialMedia::findOrFail($request->id);
        $social->update($request->all());
        return redirect()->route('socials.index')->with('success', __('lang.updated'));

    }


    public function destroy($id)
    {
        SocialMedia::findOrFail($id)->delete();
        return redirect()->route('socials.index')->with('warning', __('lang.deleted'));
    }
}