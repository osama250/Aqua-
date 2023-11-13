<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\CreateTripRequest;
use App\Http\Requests\UpdateTripRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Trip;
use App\Repositories\TripRepository;
use Illuminate\Http\Request;
use App\Models\TripCategory;
use App\Models\Trips;
use Flash;

class TripController extends AppBaseController
{
    /** @var TripRepository $tripRepository*/
    private $tripRepository;

    public function __construct()
    {
        $this->middleware('permission:View  View Trips|Add Trips|Edit Trips|Delete Trips', ['only' => ['index', 'store']]);
        $this->middleware('permission:Add Trips', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Trips', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete Trips', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $tripCategories = TripCategory::get()->pluck('name', 'id');
        $trips          = Trip::all();
        return view('AdminPanel.trips.index' , get_defined_vars() );
    }

    public function create()
    {
        $tripCategories = TripCategory::get();
        return view('AdminPanel.trips.create' , get_defined_vars() );
    }

    public function store(CreateTripRequest $request)
    {
        Trip::create($request->all());
        return redirect(route('trips.index'))->with('success',__('lang.created'));
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $trip               = Trip::findOrFail($id);
        $tripCategories     = TripCategory::get()->pluck('name', 'id');
          // return $id;
        return view('AdminPanel.trips.edit' , get_defined_vars() );
    }

    public function update($id, UpdateTripRequest $request)
    {
        $tripcat = Trip::findOrFail($id);
        $tripcat->update($request->all());
        return redirect(route('trips.index'))->with('success',__('lang.updated'));
    }

    public function destroy($id)
    {
        $trip = Trip::findOrFail($id)->delete();
        return redirect(route('trip-categories.index'))->with('warning',__('lang.deleted'));
    }
}
