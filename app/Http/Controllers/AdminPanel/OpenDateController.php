<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\CreateOpenDateRequest;
use App\Http\Requests\UpdateOpenDateRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\OpenDateRepository;
use Illuminate\Http\Request;
use App\Models\OpenDate;
use Flash;

class OpenDateController extends AppBaseController
{
    /** @var OpenDateRepository $openDateRepository*/
    private $openDateRepository;

    public function __construct(OpenDateRepository $openDateRepo)
    {
        $this->middleware('permission:View OpenDate|Add Page|Edit OpenDate|Delete OpenDate', ['only' => ['index', 'store']]);
        $this->middleware('permission:Add OpenDate', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit OpenDate', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete OpenDate', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $dates  = OpenDate::all();
        return view('AdminPanel.open_dates.index' , get_defined_vars() );
    }

    public function create()
    {
        return view('AdminPanel.open_dates.create');
    }

    public function store(CreateOpenDateRequest $request)
    {
        OpenDate::create($request->all());
        return redirect(route('open-dates.index'))->with('success',__('lang.deleted'));
    }

    public function show($id)
    {

    }


    public function edit($id)
    {
        $date =  OpenDate::findOrFail($id);
        return view('AdminPanel.open_dates.edit',get_defined_vars());
    }

    public function update($id, UpdateOpenDateRequest $request)
    {
        $date =  OpenDate::findOrFail($id);
        $date->update($request->all());
        return redirect(route('open-dates.index'))->with('success',__('lang.updated'));
    }


    public function destroy($id)
    {
        OpenDate::findOrFail($id)->delete();
        return redirect(route('open-dates.index'))->with('warning',__('lang.deleted'));
    }
}
