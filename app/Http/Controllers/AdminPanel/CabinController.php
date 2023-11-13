<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateCabinRequest;
use App\Http\Requests\AdminPanel\UpdateCabinRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\CabinRepository;
use Illuminate\Http\Request;
use Flash;
use App\Models\Cabin;
use App\Models\CabinPhoto;
use App\Models\Category;
use App\Models\Facilite;
use Illuminate\Support\Facades\Facade;

class CabinController extends AppBaseController
{
    /** @var CabinRepository $cabinRepository*/
    private $cabinRepository;

    public function __construct(CabinRepository $cabinRepo)
    {
        $this->cabinRepository = $cabinRepo;
        $this->middleware('permission:View Cabin|Add Cabin|Edit Cabin|Delete Cabin', ['only' => ['index', 'store']]);
        $this->middleware('permission:Add Cabin', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Cabin', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete Cabin', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $cabins  = Cabin::all();
        return view('AdminPanel.cabins.index' , get_defined_vars() );
    }

    public function create()
    {
        $cats      = Category::get();
        $facilties = Facilite::get();
        return view('AdminPanel.cabins.create' , get_defined_vars() );
    }

    public function store(CreateCabinRequest $request)
    {
        // Cabin::create( $request->all() );
        $input  = $request->all();
        $cabins = $this->cabinRepository->create( $input );

        $cabins->categories()->sync($request->category_id);
        $cabins->facilites()->sync($request->facility_id);

        // foreach( $request->photos as $photo ) {
        //     $cabins->photos()->create( [
        //         'photo' => $photo
        //     ]);
        // }

        return redirect(route('cabins.index'))->with('success',__('lang.created'));
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        // return $id;
        $cats       = Category::get();
        $facilties  = Facilite::get();
        $cabin      = Cabin::findOrFail($id);
        return view('AdminPanel.cabins.edit' , get_defined_vars() );
    }


    public function update($id, UpdateCabinRequest $request)
    {
        $cabin = Cabin::findOrFail($id);
        // $cabin->update( $request->all() );
        $cabin = $this->cabinRepository->update($request->all() , $id);
        if( $request->photos ) {
            foreach( $request->photos as $photo ) {
                $cabin->photos()->create( [
                    'photo' => $photo
                ]);
            }
        }
        return redirect(route('cabins.index'))->with('success',__('lang.created'));
    }

    public function deletePhoto($id) {
        CabinPhoto::findOrFail($id)->delete();
        return response([], 200);
    }

    public function destroy($id)
    {
        Cabin::findOrFail($id)->delete();
        return redirect(route('cabins.index'))->with('warning',__('lang.deleted'));
    }

    public function getFacilities(Request $request ) {
        $category_id = $request->input('category_id');
        $facilities  = Facilite::where('category_id', $category_id)->get();
        return response()->json($facilities);
    }

}
