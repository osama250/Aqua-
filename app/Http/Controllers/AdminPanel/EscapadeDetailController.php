<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateEscapadeDetailRequest;
use App\Http\Requests\AdminPanel\UpdateEscapadeDetailRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\EscapadeDetailRepository;
use Illuminate\Http\Request;
use App\Models\EscapadeDetail;
use App\Models\EscapadeDetailPhoto;
use Flash;

class EscapadeDetailController extends AppBaseController
{
    /** @var EscapadeDetailRepository $escapadeDetailRepository*/
    private $escapadeDetailRepository;

    public function __construct(EscapadeDetailRepository $escapadeDetailRepo)
    {
        $this->escapadeDetailRepository = $escapadeDetailRepo;
    }

    public function index(Request $request)
    {
        // $escapadeDetails = $this->escapadeDetailRepository->paginate(10);
        $escapadeDetails = EscapadeDetail::get();

        return view('AdminPanel.escapade_details.index' , get_defined_vars() );
    }


    public function create()
    {
        return view('AdminPanel.escapade_details..create');
    }

    public function store(CreateEscapadeDetailRequest $request)
    {
        // EscapadeDetail::create( $request->all() );
        $input          = $request->all();
        $escdetail      = $this->escapadeDetailRepository->create( $input );
        foreach( $request->photos as $photo ) {
            $escdetail->photos()->create( [
                'photo' => $photo
            ]);
        }
        return redirect(route('escapade-details.index'))->with('success',__('lang.created'));
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $escapadedetail = EscapadeDetail::findOrFail($id);
        // dd($cat);
        return view('AdminPanel.escapade_details.edit' , get_defined_vars() );
    }

    public function update($id, UpdateEscapadeDetailRequest $request)
    {
        $escapadedetail = EscapadeDetail::findOrFail($id);
        // $escapadedetail->update( $request->all() );
        $escapadedetail = $this->escapadeDetailRepository->update($request->all() , $id);
        if( $request->photos ) {
            foreach( $request->photos as $photo ) {
                $escapadedetail->photos()->create( [
                    'photo' => $photo
                ]);
            }
        }
        return redirect(route('escapade-details.index'))->with('success',__('lang.created'));
    }

    public function deletePhoto($id) {
        EscapadeDetailPhoto::findOrFail($id)->delete();
        return response([], 200);
    }

    public function destroy($id)
    {
        EscapadeDetail::findOrFail($id)->delete();
        return redirect(route('escapade-details.index'))->with('warning',__('lang.created'));
    }
}
