<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateCabinfeatureRequest;
use App\Http\Requests\AdminPanel\UpdateCabinfeatureRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Cabinfeature;
use App\Models\Cabin;
use App\Repositories\CabinfeatureRepository;
use Illuminate\Http\Request;
use Flash;

class CabinfeatureController extends AppBaseController
{
    /** @var CabinfeatureRepository $cabinfeatureRepository*/
    private $cabinfeatureRepository;

    public function __construct(CabinfeatureRepository $cabinfeatureRepo)
    {
        $this->cabinfeatureRepository = $cabinfeatureRepo;
        $this->middleware('permission:View Cabinfeature|Add Cabinfeature|Edit Cabinfeature|Delete Cabinfeature', ['only' => ['index', 'store']]);
        $this->middleware('permission:Add Cabinfeature', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Cabinfeature', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete Cabinfeature', ['only' => ['destroy']]);
    }


    public function index(Request $request)
    {
        // $cabinfeatures = $this->cabinfeatureRepository->paginate(10);
        $cabinfeatures  = Cabinfeature::all();
        return view('AdminPanel.cabinfeatures.index' , get_defined_vars() );
    }

    public function create()
    {
        $cabins = Cabin::all();
        return view('AdminPanel.cabinfeatures.create' , get_defined_vars() );
    }

    public function store(CreateCabinfeatureRequest $request)
    {
        $input = $request->all();
        $cabinfeature = $this->cabinfeatureRepository->create($input);
        return redirect(route('cabinfeatures.index'))->with('success',__('lang.created'));
    }

    public function show($id)
    {
        // $cabinfeature = $this->cabinfeatureRepository->find($id);
        // return view('cabinfeatures.show')->with('cabinfeature', $cabinfeature);
    }

    public function edit($id)
    {
        // $cabinfeature = $this->cabinfeatureRepository->find($id);
        $cabinfeature  = Cabinfeature::findOrFail($id);
        $cabins        =  Cabin::all();
        return view('AdminPanel.cabinfeatures.edit' , get_defined_vars() );
    }


    public function update($id, UpdateCabinfeatureRequest $request)
    {
        $cabinfeature  = Cabinfeature::findOrFail($id);
        $cabinfeature  = $this->cabinfeatureRepository->update($request->all() , $id);
        return redirect(route('cabinfeatures.index'))->with('success',__('lang.created'));
    }


    public function destroy($id)
    {
        Cabinfeature::findOrFail($id)->delete();
        return redirect(route('cabinfeatures.index'))->with('warning',__('lang.created'));
    }
}
