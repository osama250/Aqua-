<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateCabinSliderRequest;
use App\Http\Requests\AdminPanel\UpdateCabinSliderRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\CabinSliderRepository;
use Illuminate\Http\Request;
use Flash;
use App\Models\Cabin;
use App\Models\CabinSlider;

class CabinSliderController extends AppBaseController
{
    /** @var CabinSliderRepository $cabinSliderRepository*/
    private $cabinSliderRepository;

    public function __construct(CabinSliderRepository $cabinSliderRepo)
    {
        $this->cabinSliderRepository = $cabinSliderRepo;
        $this->middleware('permission:View CabinSlider|Add CabinSlider|Edit CabinSlider|Delete CabinSlider', ['only' => ['index', 'store']]);
        $this->middleware('permission:Add CabinSlider', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit CabinSlider', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete CabinSlider', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        // $cabinSliders = $this->cabinSliderRepository->paginate(10);
        $cabinSliders = CabinSlider::all();
        return view('AdminPanel.cabin_sliders.index' , get_defined_vars() );
    }

    public function create()
    {
        $cabins = Cabin::all();
        return view('AdminPanel.cabin_sliders.create' , get_defined_vars() );
    }

    public function store(CreateCabinSliderRequest $request)
    {
        $input       = $request->all();
        $cabinSlider = $this->cabinSliderRepository->create($input);
        return redirect( route('cabin-sliders.index') )->with('success',__('lang.created') );
    }

    public function show($id)
    {
        $cabinSlider = $this->cabinSliderRepository->find($id);
        return view('cabin_ sliders.show')->with('cabinSlider', $cabinSlider);
    }

    public function edit($id)
    {
        $cabinSlider = $this->cabinSliderRepository->find($id);
        $cabins      = Cabin::all();
        return view('AdminPanel.cabin_sliders.edit' , get_defined_vars() );
    }

    public function update($id, UpdateCabinSliderRequest $request)
    {
        $cabinSlider = $this->cabinSliderRepository->find($id);
        $cabinSlider = $this->cabinSliderRepository->update($request->all(), $id);
        return redirect(route('cabin-sliders.index'))->with('success',__('lang.updated'));
    }

    public function destroy($id)
    {
        $cabinSlider = $this->cabinSliderRepository->find($id);
        $this->cabinSliderRepository->delete($id);
        return redirect(route('cabin-sliders.index'))->with('warning',__('lang.deleted'));
    }
}
