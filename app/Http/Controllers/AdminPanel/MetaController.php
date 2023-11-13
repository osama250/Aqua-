<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\CreatemetaRequest;
use App\Http\Requests\UpdatemetaRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\metaRepository;
use Illuminate\Http\Request;
use App\Models\Meta;
use Flash;

class MetaController extends AppBaseController
{
    /** @var metaRepository $metaRepository*/
    private $metaRepository;

    public function __construct()
    {
        $this->middleware('permission:View Metas|Add Metas|Edit Metas|Delete Metas', ['only' => ['index', 'store']]);
        $this->middleware('permission:Add Metas', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Metas', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete Metas', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $metas = Meta::all();
        return view('AdminPanel.metas.index',get_defined_vars() );
    }

    public function create()
    {
        return view('AdminPanel.metas.create');
    }

    public function store(CreatemetaRequest $request)
    {
        Meta::create($request->all());
        return redirect(route('metas.index'))->with('success',__('lang.created'));
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $meta = Meta::findOrFail($id);
        // return $meta->name;
        return view('AdminPanel.metas.edit',get_defined_vars());
    }

    public function update($id, UpdatemetaRequest $request)
    {
        $meta = Meta::findOrFail($id);
        $meta->update($request->all());
        return redirect(route('metas.index'))->with('success',__('lang.updated'));
    }

    public function destroy($id)
    {
        Meta::findOrFail($id)->delete();
        return redirect(route('metas.index'))->with('warning',__('lang.deleted'));
    }
}
