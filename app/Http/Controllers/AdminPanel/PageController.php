<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreatePageRequest;
use App\Http\Requests\AdminPanel\UpdatePageRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Page;
use App\Models\PagePhoto;
use App\Repositories\PageRepository;
use Illuminate\Http\Request;
use Flash;

class PageController extends AppBaseController
{
    /** @var PageRepository $pageRepository*/
    private $pageRepository;

    public function __construct( PageRepository $pageRepo )
    {
        $this->pageRepository = $pageRepo;
        $this->middleware('permission:View Pages|Add Page|Edit Pages|Delete Pages', ['only' => ['index', 'store']]);
        $this->middleware('permission:Add Pages', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Pages', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete Pages', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $pages = Page::all();
        return view('AdminPanel.pages.index',get_defined_vars() );
    }

    public function create()
    {
        return view('AdminPanel.pages.create');
    }

    public function store(CreatePageRequest $request)
    {
        // Page::create( $request->all() );
        $input    = $request->all();
        // dd($request);
        $pages    = $this->pageRepository->create( $input );
        // dd($request->photos );
        if ( $request->photos ) {
            foreach( $request->photos as $photo ) {
                $pages->photos()->create( [
                    'photo' => $photo
                ]);
            }
        }

        return redirect(route('pages.index'))->with('success',__('lang.created'));
    }

    /**
     * Display the specified Page.
     */
    // public function show($id)
    // {
    //     $page = $this->pageRepository->find($id);

    //     if (empty($page)) {
    //         Flash::error('Page not found');

    //         return redirect(route('pages.index'));
    //     }

    //     return view('pages.show')->with('page', $page);
    // }

    /**
     * Show the form for editing the specified Page.
     */
    public function edit($id)
    {
        $page = Page::findOrFail($id);
        return view('AdminPanel.pages.edit',get_defined_vars());
    }

    public function update($id, UpdatePageRequest $request)
    {
        $page = Page::findOrFail($id);
        $page = $this->pageRepository->update($request->all() , $id);

        // dd( $page->id );
        $page->update($request->all());
        if( $request->photos ) {
            foreach( $request->photos as $photo ) {
                $page->photos()->create( [
                    'photo' => $photo
                ]);
            }
        }
        return redirect(route('pages.index'))->with('success',__('lang.updated'));
    }

    public function deletePhoto($id) {
        PagePhoto::findOrFail($id)->delete();
        return response([], 200);
    }

    public function destroy($id)
    {
        Page::findOrFail($id)->delete();
        return redirect(route('pages.index'))->with('warning',__('lang.deleted'));
    }
}
