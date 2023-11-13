<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateExperienceRequest;
use App\Http\Requests\AdminPanel\UpdateExperienceRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ExperienceRepository;
use Illuminate\Http\Request;
use Flash;
use App\Models\Experience;
use App\Models\ExperiencePhoto;

class ExperienceController extends AppBaseController
{
    /** @var ExperienceRepository $experienceRepository*/
    private $experienceRepository;

    public function __construct(ExperienceRepository $experienceRepo)
    {
        $this->experienceRepository = $experienceRepo;
        $this->middleware('permission:View Experience|Add Experience|Edit Experience|Delete Experience', ['only' => ['index', 'store']]);
        $this->middleware('permission:Add Experience', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Experience', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete Experience', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $experiences = Experience::all();
        return view('AdminPanel.experiences.index' , get_defined_vars() );
    }


    public function create()
    {
        return view('AdminPanel.experiences.create');
    }


    public function store(CreateExperienceRequest $request)
    {
        // Experience::create( $request->all() );
        $input       = $request->all();
        $$experience = $this->experienceRepository->create( $input );
        foreach( $request->photos as $photo ) {
            $experience->photos()->create( [
                'photo' => $photo
            ]);
        }
        return redirect(route('experiences.index'))->with('success',__('lang.created'));
    }


    public function show($id)
    {

    }

    public function edit($id)
    {
        // return $id;
        $experience = Experience::findOrFail($id);
        return view('AdminPanel.experiences.edit' , get_defined_vars() );
    }

    public function update($id, UpdateExperienceRequest $request)
    {
        $experience = Experience::findOrFail($id);
        // $experience->update( $request->all() );
        $experience = $this->experienceRepository->update($request->all() , $id);
        if( $request->photos ) {
            foreach( $request->photos as $photo ) {
                $experience->photos()->create( [
                    'photo' => $photo
                ]);
            }
        }
        return redirect(route('experiences.index'))->with('success',__('lang.created'));
    }

    public function deletePhoto($id) {
        ExperiencePhoto::findOrFail($id)->delete();
        return response([], 200);
    }

    public function destroy($id)
    {
        Experience::findOrFail($id)->delete();
        return redirect(route('experiences.index'))->with('success',__('lang.created'));

    }
}
