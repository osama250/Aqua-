<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\CreateItineraryRequest;
use App\Http\Requests\UpdateItineraryRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ItineraryRepository;
use Illuminate\Http\Request;
use App\Models\Itinerary;
use App\Models\TripCategory;
use Flash;

class ItineraryController extends AppBaseController
{

    private $itineraryRepository;

    public function __construct(ItineraryRepository $itineraryRepo)
    {
        $this->middleware('permission:View Itinerary|Add Itinerary|Edit Itinerary|Delete Itinerary', ['only' => ['index', 'store']]);
        $this->middleware('permission:Add Itinerary', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Itinerary', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete Itinerary', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $itineraries  = Itinerary::all();
        return view( 'AdminPanel.itineraries.index' , get_defined_vars() );
    }

    public function create()
    {
        $tripCategories = TripCategory::get();
        return view('AdminPanel.itineraries.create' , get_defined_vars() );
    }

    public function store(CreateItineraryRequest $request)
    {
        Itinerary::create($request->all());
        return redirect(route('itineraries.index'))->with('success',__('lang.created'));
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        // return $id;
        $itinerary          = Itinerary::findOrFail($id);
        $tripCategories     = TripCategory::get();
        return view('AdminPanel.itineraries.edit' , get_defined_vars() );
    }

    public function update($id, UpdateItineraryRequest $request)
    {
        $itinerary = Itinerary::findOrFail($id);
        $itinerary->update($request->all());
        return redirect(route('itineraries.index'))->with('success',__('lang.updated'));
    }

    public function destroy($id)
    {
        // return $id;
        Itinerary::findOrFail($id)->delete();
        return redirect(route('itineraries.index'))->with('warning',__('lang.deleted'));
    }
}
