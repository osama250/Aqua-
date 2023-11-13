<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateInspirationDetailRequest;
use App\Http\Requests\AdminPanel\UpdateInspirationDetailRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\InspirationDetailRepository;
use Illuminate\Http\Request;
use App\Models\InspirationDetail;
use App\Models\InspirationDetailPhoto;
use Flash;

class InspirationDetailController extends AppBaseController
{
    /** @var InspirationDetailRepository $inspirationDetailRepository*/
    private $inspirationDetailRepository;

    public function __construct(InspirationDetailRepository $inspirationDetailRepo)
    {
        $this->inspirationDetailRepository = $inspirationDetailRepo;
        $this->middleware('permission:View InspirationDetail|Add InspirationDetail|Edit InspirationDetail|Delete InspirationDetail', ['only' => ['index', 'store']]);
        $this->middleware('permission:Add InspirationDetail', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit InspirationDetail', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete InspirationDetail', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        // $inspirationDetails = $this->inspirationDetailRepository->paginate(10);
        $inspirationdetails = InspirationDetail::all();
        // return $inspirationdetails;
        return view('AdminPanel.inspiration_details.index' , get_defined_vars() );
    }

    public function create()
    {
        return view('AdminPanel.inspiration_details.create');
    }


    public function store(CreateInspirationDetailRequest $request)
    {
        $input          = $request->all();
        $insdetail      = $this->inspirationDetailRepository->create( $input );
        foreach( $request->photos as $photo ) {
            $insdetail->photos()->create( [
                'photo' => $photo
            ]);
        }
        return redirect(route('inspiration-details.index'))->with('success',__('lang.created'));

    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $insdetail = InspirationDetail::findOrFail($id);
        // return $insdetail;
        return view('AdminPanel.inspiration_details.edit' , get_defined_vars() );
    }

    public function update($id, UpdateInspirationDetailRequest $request)
    {
        $insdetail = InspirationDetail::findOrFail($id);
        $insdetail = $this->inspirationDetailRepository->update($request->all() , $id);
        if( $request->photos ) {
            foreach( $request->photos as $photo ) {
                $insdetail->photos()->create( [
                    'photo' => $photo
                ]);
            }
        }
        return redirect(route('inspiration-details.index'))->with('success',__('lang.created'));
    }

    public function deletePhoto($id) {
        InspirationDetailPhoto::findOrFail($id)->delete();
        return response([], 200);
    }

    public function destroy($id)
    {
        InspirationDetail::findOrFail($id)->delete();
        return redirect(route('inspiration-details.index'))->with('warning',__('lang.deleted'));
    }
}
