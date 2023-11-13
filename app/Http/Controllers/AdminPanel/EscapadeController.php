<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateEscapadeRequest;
use App\Http\Requests\AdminPanel\UpdateEscapadeRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\EscapadeRepository;
use Illuminate\Http\Request;
use App\Models\Escapade;
use App\Models\EscapadePhoto;
use Flash;

class EscapadeController extends AppBaseController
{
    /** @var EscapadeRepository $escapadeRepository*/
    private $escapadeRepository;

    public function __construct(EscapadeRepository $escapadeRepo)
    {
        $this->escapadeRepository = $escapadeRepo;
        $this->middleware('permission:View Escapades|Add Escapades|Edit Escapades|Delete Escapades', ['only' => ['index', 'store']]);
        $this->middleware('permission:Add Escapades', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Escapades', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete Escapades', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        // $escapades = $this->escapadeRepository->paginate(10);
        $escapades = Escapade::get();
        return view('AdminPanel.escapades.index' , get_defined_vars() );
    }

    public function create()
    {
        return view('AdminPanel.escapades.create');
    }

    public function store(CreateEscapadeRequest $request)
    {
        $input    = $request->all();
        $esc      = $this->escapadeRepository->create( $input );
        foreach( $request->photos as $photo ) {
            $esc->photos()->create( [
                'photo' => $photo
            ]);
        }
        return redirect(route('escapades.index'))->with('success',__('lang.created'));
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $escapade = Escapade::findOrFail($id);
        // dd($cat);
        return view('AdminPanel.escapades.edit' , get_defined_vars() );
    }

    public function update($id, UpdateEscapadeRequest $request)
    {
        $escapade = Escapade::findOrFail($id);
        // $escapade->update( $request->all() );
        $escapade = $this->escapadeRepository->update($request->all() , $id);
        if( $request->photos ) {
            foreach( $request->photos as $photo ) {
                $escapade->photos()->create( [
                    'photo' => $photo
                ]);
            }
        }
        return redirect(route('escapades.index'))->with('success',__('lang.created'));
    }

    public function deletePhoto($id) {
        EscapadePhoto::findOrFail($id)->delete();
        return response([], 200);
    }

    public function destroy($id)
    {
        Escapade::findOrFail($id)->delete();
        return redirect(route('escapades.index'))->with('warning',__('lang.created'));
    }
}
