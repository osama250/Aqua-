<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\CreateInfoRequest;
use App\Http\Requests\UpdateInfoRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\InfoRepository;
use Illuminate\Http\Request;
use App\Models\Info;
use Flash;

class InfoController extends AppBaseController
{
    /** @var InfoRepository $infoRepository*/
    private $infoRepository;

    public function __construct()
    {
        $this->middleware('permission:View Infos|Add Metas|Edit Infos|Delete Infos', ['only' => ['index', 'store']]);
        $this->middleware('permission:Add Infos', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Infos', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete Infos', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $infos = Info::all();
        return view('AdminPanel.infos.index',get_defined_vars() );
    }

    public function create()
    {
        return view('AdminPanel.infos.create');
    }

    public function store(CreateInfoRequest $request)
    {
        // return $request;
        Info::create($request->all());
        return redirect(route('infos.index'))->with('success',__('lang.created'));
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $info = Info::findOrFail($id);
        return view('AdminPanel.infos.edit',get_defined_vars());
    }

    public function update($id, UpdateInfoRequest $request)
    {
        $page = Info::findOrFail($id);
        $page->update($request->all());
        return redirect(route('infos.index'))->with('success',__('lang.updated'));
    }

    public function destroy($id)
    {
        Info::findOrFail($id)->delete();
        return redirect(route('infos.index'))->with('warning',__('lang.deleted'));
    }
}
