<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateDiningRequest;
use App\Http\Requests\AdminPanel\UpdateDiningRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\DiningRepository;
use Illuminate\Http\Request;
use Flash;
use App\Models\Dining;
use App\Models\DiningPhoto;

class DiningController extends AppBaseController
{
    /** @var DiningRepository $diningRepository*/
    private $diningRepository;

    public function __construct(DiningRepository $diningRepo)
    {
        $this->diningRepository = $diningRepo;
        $this->middleware('permission:View Dining|Add Dining|Edit Dining|Delete Dining', ['only' => ['index', 'store']]);
        $this->middleware('permission:Add Dining', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Dining', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete Dining', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        // return 'Done';
        $dinings = Dining::all();
        return view('AdminPanel.dinings.index' , get_defined_vars() );
    }


    public function create()
    {
        return view('AdminPanel.dinings.create');
    }

    public function store(CreateDiningRequest $request)
    {
        // Dining::create( $request->all() );
        $input  = $request->all();
        $dining = $this->diningRepository->create( $input );
        foreach( $request->photos as $photo ) {
            $dining->photos()->create( [
                'photo' => $photo
            ]);
        }
        return redirect(route('dinings.index'))->with('success',__('lang.created'));
    }


    public function show($id)
    {

    }

    public function edit($id)
    {
     // return $id;
     $dining = Dining::findOrFail($id);
     return view('AdminPanel.dinings.edit' , get_defined_vars() );
    }

    public function update($id, UpdateDiningRequest $request)
    {
        $dining = Dining::findOrFail($id);
        // $dining->update( $request->all() );
        $dining = $this->diningRepository->update($request->all() , $id);
        if( $request->photos ) {
            foreach( $request->photos as $photo ) {
                $dining->photos()->create( [
                    'photo' => $photo
                ]);
            }
        }
        return redirect(route('dinings.index'))->with('success',__('lang.created'));
    }

    public function deletePhoto($id) {
        DiningPhoto::findOrFail($id)->delete();
        return response([], 200);
    }

    public function destroy($id)
    {
        Dining::findOrFail($id)->delete();
        return redirect(route('dinings.index'))->with('warning',__('lang.created'));
    }
}
