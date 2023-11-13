<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\CreatePartnerRequest;
use App\Http\Requests\UpdatePartnerRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\PartnerRepository;
use Illuminate\Http\Request;
use App\Models\Partner;
use Flash;

class PartnerController extends AppBaseController
{
    /** @var PartnerRepository $partnerRepository*/
    private $partnerRepository;

    public function __construct(PartnerRepository $partnerRepo)
    {
        $this->middleware('permission:View View Partner|Add Partner|Edit Partner|Delete Partner', ['only' => ['index', 'store']]);
        $this->middleware('permission:Add Partner', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Partner', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete Partner', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $partners = Partner::all();
        return view('AdminPanel.partners.index' , get_defined_vars() );
    }

    public function create()
    {
        return view('AdminPanel.partners.create');
    }

    public function store(CreatePartnerRequest $request)
    {
        Partner::create($request->all());
        return redirect(route('partners.index'))->with('success',__('lang.created'));
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $partner = Partner::findOrFail($id);
        // return $id;
        return view('AdminPanel.partners.edit' , get_defined_vars() );
    }

    public function update($id, UpdatePartnerRequest $request)
    {
        $partner = Partner::findOrFail($id);
        $partner->update($request->all());
        return redirect(route('partners.index'))->with('success',__('lang.updated'));
    }

    public function destroy($id)
    {
        Partner::findOrFail($id)->delete();
        return redirect(route('partners.index'))->with('warning',__('lang.deleted'));
    }
}
