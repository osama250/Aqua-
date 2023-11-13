<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateCategoryRequest;
use App\Http\Requests\AdminPanel\UpdateCategoryRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Flash;
use App\Models\Category;

class CategoryController extends AppBaseController
{

    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepo)
    {
        $this->categoryRepository = $categoryRepo;
        $this->middleware('permission:View Category|Add Category|Edit Category|Delete Category', ['only' => ['index', 'store']]);
        $this->middleware('permission:Add Category', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Category', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete Category', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        // $categories = $this->categoryRepository->paginate(10);
        $cats = Category::all();
        return view('AdminPanel.categories.index' , get_defined_vars() );
    }

    public function create()
    {
        return view('AdminPanel.categories.create');
    }

    public function store(CreateCategoryRequest $request)
    {
        Category::create( $request->all() );
        return redirect(route('categories.index'))->with('success',__('lang.created'));
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $cat = Category::findOrFail($id);
        // dd($cat);
        return view('AdminPanel.categories.edit' , get_defined_vars() );
    }

    public function update($id, UpdateCategoryRequest $request)
    {
        $cat = Category::findOrFail($id);
        $cat->update( $request->all() );
        return redirect(route('categories.index'))->with('success',__('lang.created'));
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return redirect(route('categories.index'))->with('warning',__('lang.created'));
    }
}
