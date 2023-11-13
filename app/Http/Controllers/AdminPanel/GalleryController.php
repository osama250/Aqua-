<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateGalleryRequest;
use App\Http\Requests\AdminPanel\UpdateGalleryRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Gallery;
use App\Repositories\GalleryRepository;
use Illuminate\Http\Request;
use Flash;

class GalleryController extends AppBaseController
{
    /** @var GalleryRepository $galleryRepository*/
    private $galleryRepository;

    public function __construct(GalleryRepository $galleryRepo)
    {
        $this->galleryRepository = $galleryRepo;

        $this->middleware('permission:View Gallery|Add Gallery|Edit Gallery|Delete Gallery', ['only' => ['index', 'store']]);
        $this->middleware('permission:Add Gallery', ['only' => ['create', 'store']]);
        //$this->middleware('permission:Edit Admin', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete Gallery', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $galleries = $this->galleryRepository->all();

        return view('AdminPanel.galleries.index',get_defined_vars());
    }

    public function create()
    {
        return view('AdminPanel.galleries.create');
    }

    public function store(CreateGalleryRequest $request)
    {
        // return $request;
        // dd ( $request->photos ) ;
        // return response()->json( $request );

        foreach( $request->photos as $photo ) {
            $gallery = $this->galleryRepository->create( [
                'photo'=> $photo
            ]);
        }
        return response()->json($gallery->id,200);
    }

    /**
     * Display the specified Gallery.
     */
    // public function show($id)
    // {
    //     $gallery = $this->galleryRepository->find($id);

    //     if (empty($gallery)) {
    //         Flash::error('Gallery not found');

    //         return redirect(route('galleries.index'));
    //     }

    //     return view('galleries.show')->with('gallery', $gallery);
    // }

    /**
     * Show the form for editing the specified Gallery.
     */
    // public function edit($id)
    // {
    //     $gallery = $this->galleryRepository->find($id);

    //     if (empty($gallery)) {
    //         Flash::error('Gallery not found');

    //         return redirect(route('galleries.index'));
    //     }

    //     return view('galleries.edit')->with('gallery', $gallery);
    // }

    // /**
    //  * Update the specified Gallery in storage.
    //  */
    // public function update($id, UpdateGalleryRequest $request)
    // {
    //     $gallery = $this->galleryRepository->find($id);

    //     if (empty($gallery)) {
    //         Flash::error('Gallery not found');

    //         return redirect(route('galleries.index'));
    //     }

    //     $gallery = $this->galleryRepository->update($request->all(), $id);

    //     Flash::success('Gallery updated successfully.');

    //     return redirect(route('galleries.index'));
    // }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        $this->galleryRepository->delete($id);
        if( request()->ajax() )
        {
            return response()->json('success', 200);
        }

        return  redirect()->route('galleries.index')->with('warning',__('lang.deleted'));

    }
}
