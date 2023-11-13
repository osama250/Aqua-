<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateSliderRequest;
use App\Http\Requests\AdminPanel\UpdateSliderRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Slider;
use App\Repositories\SliderRepository;
use Illuminate\Http\Request;
use Flash;

class SliderController extends AppBaseController
{
    /** @var SliderRepository $sliderRepository*/
    private $sliderRepository;

    public function __construct(SliderRepository $sliderRepo)
    {
        $this->sliderRepository = $sliderRepo;

        $this->middleware('permission:View Slider|Add Slider|Edit Slider|Delete Slider', ['only' => ['index', 'store']]);
        $this->middleware('permission:Add Slider', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Slider', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete Slider', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the Slider.
     */
    public function index()
    {
        $sliders = $this->sliderRepository->all();
        return view('AdminPanel.sliders.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new Slider.
     */
    public function create()
    {
        return view('AdminPanel.sliders.create');
    }

    /**
     * Store a newly created Slider in storage.
     */
    public function store(CreateSliderRequest $request)
    {
        $input = $request->all();
        $input['type'] = explode('/', $request->media->getMimeType())[0];
        $slider = $this->sliderRepository->create($input);


        return redirect(route('sliders.index'))->with(__('lang.created'));
    }

    /**
     * Display the specified Slider.
     */
    // public function show($id)
    // {
    //     $slider = $this->sliderRepository->find($id);

    //     if (empty($slider)) {
    //         Flash::error('Slider not found');

    //         return redirect(route('sliders.index'));
    //     }

    //     return view('sliders.show')->with('slider', $slider);
    // }

    /**
     * Show the form for editing the specified Slider.
     */
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);

        return view('AdminPanel.sliders.edit',get_defined_vars());
    }

    /**
     * Update the specified Slider in storage.
     */
    public function update($id, UpdateSliderRequest $request)
    {
        $slider = Slider::findOrFail($id);
        if($request->media){
            $request['type'] = explode('/', $request->media->getMimeType())[0];
        }

        $slider = $this->sliderRepository->update($request->all(), $id);

        return redirect(route('sliders.index'))->with('success',__('lang.updated'));
    }

    /**
     * Remove the specified Slider from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);

        $this->sliderRepository->delete($id);

        return redirect(route('sliders.index'))->with('warning',__('lang.deleted'));
    }
}
