<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateSideSeeingRequest;
use App\Http\Requests\AdminPanel\UpdateSideSeeingRequest;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\UpdateSideSeeingRequest as RequestsUpdateSideSeeingRequest;
use App\Models\SideSeeing;
use App\Models\SideSeeingPhoto;
use App\Repositories\SideSeeingRepository;
use Illuminate\Http\Request;
use Flash;

class SideSeeingController extends AppBaseController
{
    /** @var SideSeeingRepository $sideSeeingRepository*/
    private $sideSeeingRepository;

    public function __construct(SideSeeingRepository $sideSeeingRepo)
    {
        $this->sideSeeingRepository = $sideSeeingRepo;

        $this->middleware('permission:View SideSeeing|Add SideSeeing|Edit SideSeeing|Delete SideSeeing', ['only' => ['index', 'store']]);
        $this->middleware('permission:Add SideSeeing', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit SideSeeing', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete SideSeeing', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the SideSeeing.
     */
    public function index(Request $request)
    {
        $sideSeeings = $this->sideSeeingRepository->all();

        return view('AdminPanel.side_seeings.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new SideSeeing.
     */
    public function create()
    {
        return view('AdminPanel.side_seeings.create');
    }

    /**
     * Store a newly created SideSeeing in storage.
     */
    public function store(CreateSideSeeingRequest $request)
    {
        $input = $request->all();

        $sideSeeing = $this->sideSeeingRepository->create($input);

        foreach ($request->photos as $photo) {
            $sideSeeing->photos()->create([
                'photo' => $photo
            ]);
        }

        return redirect(route('side-seeings.index'))->with('success',__('lang.created'));
    }

    /**
     * Display the specified SideSeeing.
     */
    // public function show($id)
    // {
    //     $sideSeeing = $this->sideSeeingRepository->find($id);

    //     if (empty($sideSeeing)) {
    //         Flash::error('Side Seeing not found');

    //         return redirect(route('sideSeeings.index'));
    //     }

    //     return view('side_seeings.show')->with('sideSeeing', $sideSeeing);
    // }

    /**
     * Show the form for editing the specified SideSeeing.
     */
    public function edit($id)
    {
        $sideSeeing = SideSeeing::findOrFail($id)->load('photos');

        return view('AdminPanel.side_seeings.edit',get_defined_vars());
    }

    /**
     * Update the specified SideSeeing in storage.
     */
    public function update($id, UpdateSideSeeingRequest $request)
    {
        $sideSeeing = SideSeeing::findOrFail($id);

        $sideSeeing = $this->sideSeeingRepository->update($request->all(), $id);

        if($request->photos){
            foreach ($request->photos as $photo) {
                $sideSeeing->photos()->create([
                    'photo' => $photo
                ]);
            }
        }


        return redirect(route('side-seeings.index'))->with('success',__('lang.updated'));
    }

    /**
     * Remove the specified SideSeeing from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $sideSeeing = SideSeeing::findOrFail($id);

        $this->sideSeeingRepository->delete($id);


        return redirect(route('side-seeings.index'))->with('warning',__('lang.deleted'));
    }

    public function deletePhoto($id)
    {
        SideSeeingPhoto::findOrFail($id)->delete();
        return response([], 200);
    }
}