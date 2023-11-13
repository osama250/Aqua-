<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminPanel\AboutUsRequest;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:View Aboutus|Edit Aboutus', ['only' => ['index']]);
        $this->middleware('permission:Edit Aboutus', ['only' => ['edit', 'update']]);
    }

    public function index()
    {
        $aboutus=AboutUs::all();
        return view('AdminPanel.aboutus.index',get_defined_vars());
    }


    // public function create()
    // {
    //     //
    // }


    // public function store(Request $request)
    // {
    //     //
    // }


    // public function show($id)
    // {
    //     //
    // }


    public function edit($id)
    {
        $about = AboutUs::first();
        return view('AdminPanel.aboutus.edit',get_defined_vars());
    }


    public function update(AboutUsRequest $request, $id)
    {
        $about = AboutUs::first();
        $about->update($request->all());
        return redirect()->route('aboutus.index')->with('success', __('lang.updated'));
    }


    // public function destroy($id)
    // {
    //     //
    // }
}