<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\CreateItineraryDetailRequest;
use App\Http\Requests\UpdateItineraryDetailRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ItineraryDetailRepository;
use Illuminate\Http\Request;
use App\Models\ItineraryDetail;
use App\Models\Itinerary;
use Flash;

class ItineraryDetailController extends AppBaseController
{
    /** @var ItineraryDetailRepository $itineraryDetailRepository*/
    private $itineraryDetailRepository;

    public function __construct(ItineraryDetailRepository $itineraryDetailRepo)
    {
        $this->middleware('permission:View ItineraryDetail|Add ItineraryDetail|Edit ItineraryDetail|Delete ItineraryDetail', ['only' => ['index', 'store']]);
        $this->middleware('permission:Add ItineraryDetail', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit ItineraryDetail', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete ItineraryDetail', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $itinerariesdetails  = ItineraryDetail::all();
        return view('AdminPanel.itinerary_details.index' , get_defined_vars() );
    }

    public function create()
    {
        $itineraries  = Itinerary::all();
        return view('AdminPanel.itinerary_details.create' , get_defined_vars() );
    }

    public function store(CreateItineraryDetailRequest $request)
    {
        ItineraryDetail::create($request->all());
        return redirect(route('itinerary-details.index'))->with('success',__('lang.created'));
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        // return $id;
        $itinerarydetail = ItineraryDetail::findOrFail($id);
        $itineraries     = Itinerary::all();
        return view('AdminPanel.itinerary_details.edit' , get_defined_vars() );
    }

    public function update($id, UpdateItineraryDetailRequest $request)
    {
        $itinerarydetail = ItineraryDetail::findOrFail($id);
        $itinerarydetail->update($request->all());
        return redirect( route('itinerary-details.index') )->with( 'success',__('lang.deleted') );
    }

    public function destroy($id)
    {
        // return $id;
        ItineraryDetail::findOrFail($id)->delete();
        return redirect( route('itinerary-details.index') )->with( 'warning',__('lang.deleted') );
    }
}
