<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\CreateTripCategoryRequest;
use App\Http\Requests\UpdateTripCategoryRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\TripCategoryRepository;
use Illuminate\Http\Request;
use App\Models\TripCategory;
use Flash;

class TripCategoryController extends AppBaseController
{


    public function __construct(TripCategoryRepository $tripCategoryRepo)
    {
        $this->middleware('permission:View View TripCategory|Add TripCategory|Edit TripCategory|Delete TripCategory', ['only' => ['index', 'store']]);
        $this->middleware('permission:Add TripCategory', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit TripCategory', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete TripCategory', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $tripcategories  = TripCategory::all();
        return view('AdminPanel.trip_categories.index' , get_defined_vars() );
    }


    public function create()
    {
        return view('AdminPanel.trip_categories.create');
    }


    public function store(CreateTripCategoryRequest $request)
    {
        TripCategory::create($request->all());
        return redirect(route('trip-categories.index'))->with('success',__('lang.created'));
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $tripcat = TripCategory::findOrFail($id);
        return view('AdminPanel.trip_categories.edit' , get_defined_vars() );
    }

    public function update($id, UpdateTripCategoryRequest $request)
    {
        $tripcat = TripCategory::findOrFail($id);
        $tripcat->update($request->all());
        return redirect(route('trip-categories.index'))->with('success',__('lang.updated'));
    }

    public function destroy($id)
    {
        TripCategory::findOrFail($id)->delete();
        return redirect(route('trip-categories.index'))->with('warning',__('lang.deleted'));
    }
}
