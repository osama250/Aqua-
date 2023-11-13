<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\CreateUniqueRequest;
use App\Http\Requests\UpdateUniqueRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\UniqueRepository;
use Illuminate\Http\Request;
use App\Models\Unique;
use Flash;

class UniqueController extends AppBaseController
{
    /** @var UniqueRepository $uniqueRepository*/
    private $uniqueRepository;

    public function __construct(UniqueRepository $uniqueRepo)
    {
        $this->middleware('permission:View  View Unique|Add Unique|Edit Unique|Delete Unique', ['only' => ['index', 'store']]);
        $this->middleware('permission:Add Unique', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Unique', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete Unique', ['only' => ['destroy']]);
    }


    public function index(Request $request)
    {
        $unquies = Unique::all();
        return view('AdminPanel.uniques.index' , get_defined_vars() );
    }

    public function create()
    {
        return view('AdminPanel.uniques.create');
    }

    public function store(CreateUniqueRequest $request)
    {
        Unique::create($request->all());
        return redirect(route('uniques.index'))->with('success',__('lang.created'));
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        // return $id;
        $unquie  = Unique::findOrFail($id);
        return view('AdminPanel.uniques.edit' , get_defined_vars() );

    }

    public function update($id, UpdateUniqueRequest $request)
    {
        $unquie  = Unique::findOrFail($id);
        $unquie->update($request->all());
        return redirect(route('uniques.index'))->with('success',__('lang.created'));
    }

    public function destroy($id)
    {
        $unquie  = Unique::findOrFail($id)->delete();
        return redirect(route('uniques.index'))->with('warning',__('lang.created'));
    }
}
