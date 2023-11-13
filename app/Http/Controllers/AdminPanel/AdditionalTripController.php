<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\CreateAdditionalTripRequest;
use App\Http\Requests\UpdateAdditionalTripRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\AdditionalTripRepository;
use Illuminate\Http\Request;
use App\Models\AdditionalTrip;
use Flash;

class AdditionalTripController extends AppBaseController
{
    /** @var AdditionalTripRepository $additionalTripRepository*/
    private $additionalTripRepository;

    public function __construct(AdditionalTripRepository $additionalTripRepo)
    {
        $this->middleware('permission:View View AdditionalTrip |Add Dekete AdditionalTrip|Edit Dekete AdditionalTrip|Delete Decks', ['only' => ['index', 'store']]);
        $this->middleware('permission:Add AdditionalTrip', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit AdditionalTrip', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Dekete AdditionalTrip', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $addtrips = AdditionalTrip::all();
        // return 'Done';
        return view('AdminPanel.additional_trips.index',  get_defined_vars() );
    }


    public function create()
    {

    }


    public function store(CreateAdditionalTripRequest $request)
    {

    }

    public function show($id)
    {

    }


    public function edit($id)
    {

    }


    public function update($id, UpdateAdditionalTripRequest $request)
    {

    }

    public function destroy($id)
    {
        AdditionalTrip::findOrFail($id)->delete();
        return redirect(route('additional-trips.index'))->with('warning',__('lang.deleted'));
    }
}
