<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateInspirationRequest;
use App\Http\Requests\AdminPanel\UpdateInspirationRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\InspirationRepository;
use Illuminate\Http\Request;
use App\Models\Inspiration;
use App\Models\InspirationPhoto;
use Flash;

class InspirationController extends AppBaseController
{
    /** @var InspirationRepository $inspirationRepository*/
    private $inspirationRepository;

    public function __construct(InspirationRepository $inspirationRepo)
    {
        $this->inspirationRepository = $inspirationRepo;
        $this->middleware('permission:View Inspiration|Add Inspiration|Edit Inspiration|Delete Inspiration', ['only' => ['index', 'store']]);
        $this->middleware('permission:Add Inspiration', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Inspiration', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete Inspiration', ['only' => ['destroy']]);
    }


    public function index(Request $request)
    {
        // return 'Done';
        $inspirations = Inspiration::all();
        // return $inspirations;
        return view('AdminPanel.inspirations.index' , get_defined_vars() );
    }


    public function create()
    {
        return view('AdminPanel.inspirations.create');
    }


    public function store(CreateInspirationRequest $request)
    {
        // Inspiration::create( $request->all() );
        $input    = $request->all();
        $ins      = $this->inspirationRepository->create( $input );
        foreach( $request->photos as $photo ) {
            $ins->photos()->create( [
                'photo' => $photo
            ]);
        }
        return redirect(route('inspirations.index'))->with('success',__('lang.created'));
    }

    public function show($id)
    {

    }


    public function edit($id)
    {
        $ins = Inspiration::findOrFail($id);
        return view('AdminPanel.inspirations.edit' , get_defined_vars() );
    }

    public function update($id, UpdateInspirationRequest $request)
    {
        $ins = Inspiration::findOrFail($id);
        // $ins->update( $request->all() );
        $ins = $this->inspirationRepository->update($request->all() , $id);
        if( $request->photos ) {
            foreach( $request->photos as $photo ) {
                $ins->photos()->create( [
                    'photo' => $photo
                ]);
            }
        }
        return redirect(route('inspirations.index'))->with('success',__('lang.updated'));
    }

    public function deletePhoto($id) {
        InspirationPhoto::findOrFail($id)->delete();
        return response([], 200);
    }

    public function destroy($id)
    {
        Inspiration::findOrFail($id)->delete();
        return redirect(route('inspirations.index'))->with('warning',__('lang.deleted'));
    }
}
