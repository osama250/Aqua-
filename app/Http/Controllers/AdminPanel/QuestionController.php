<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateQuestionRequest;
use App\Http\Requests\AdminPanel\UpdateQuestionRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\QuestionRepository;
use Illuminate\Http\Request;
use App\Models\Question;
use Flash;

class QuestionController extends AppBaseController
{
    /** @var QuestionRepository $questionRepository*/
    private $questionRepository;

    public function __construct(QuestionRepository $questionRepo)
    {
        $this->questionRepository = $questionRepo;
        $this->middleware('permission:View Question|Add Question|Edit Question|Delete Question', ['only' => ['index', 'store']]);
        $this->middleware('permission:Add Question', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Question', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete Question', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        // $questions = $this->questionRepository->paginate(10);
        $questions = Question::all();
        return view('AdminPanel.questions.index' , get_defined_vars() );
    }

    public function create()
    {
        return view('AdminPanel.questions.create');
    }


    public function store(CreateQuestionRequest $request)
    {
        $input       = $request->all();
        $question    = $this->questionRepository->create( $input );
        return redirect(route('questions.index'))->with('success',__('lang.created'));
    }

    public function show($id)
    {
        $question = $this->questionRepository->find($id);


        return view('questions.show')->with('question', $question);
    }

    public function edit($id)
    {
        $question = $this->questionRepository->find($id);
        return view('AdminPanel.questions.edit' , get_defined_vars() );
    }


    public function update($id, UpdateQuestionRequest $request)
    {
        $question = $this->questionRepository->find($id);
        $question = $this->questionRepository->update($request->all(), $id);
        return redirect(route('questions.index'))->with('success',__('lang.created'));
    }


    public function destroy($id)
    {
        $question = $this->questionRepository->find($id);
        $this->questionRepository->delete($id);
        // return redirect(route('questions.index'));
        return redirect(route('questions.index'))->with('warning',__('lang.created'));
    }
}
