<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateConditionRequest;
use App\Http\Requests\AdminPanel\UpdateConditionRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Condition;
use App\Repositories\ConditionRepository;
use Illuminate\Http\Request;
use Flash;

class ConditionController extends AppBaseController
{
    /** @var ConditionRepository $conditionRepository*/
    private $conditionRepository;

    public function __construct(ConditionRepository $conditionRepo)
    {
        $this->conditionRepository = $conditionRepo;
        $this->middleware('permission:View Condition|Add Condition|Edit Condition|Delete Condition', ['only' => ['index', 'store']]);
        $this->middleware('permission:Add Condition', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Condition', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete Condition', ['only' => ['destroy']]);
    }


    public function index(Request $request)
    {
        // $conditions = $this->conditionRepository->paginate(10);
        $condtions  = Condition::get();
        return view('AdminPanel.conditions.index' , get_defined_vars() );
    }

    public function create()
    {
        return view('AdminPanel.conditions.create');
    }

    public function store(CreateConditionRequest $request)
    {
        Condition::create( $request->all() );
        return redirect(route('conditions.index'))->with('success',__('lang.created'));
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $con = Condition::findOrFail($id);
        // dd($cat);
        return view('AdminPanel.conditions.edit' , get_defined_vars() );
    }

    public function update($id, UpdateConditionRequest $request)
    {
        $con = Condition::findOrFail($id);
        $con->update( $request->all() );
        return redirect(route('conditions.index'))->with('success',__('lang.created'));
    }

    public function destroy($id)
    {
        Condition::findOrFail($id)->delete();
        return redirect(route('conditions.index'))->with('warning',__('lang.created'));
    }
}
