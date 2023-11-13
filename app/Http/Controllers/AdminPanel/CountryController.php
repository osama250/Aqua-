<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\CreateCountryRequest;
use App\Http\Requests\UpdateCountryRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\CountryRepository;
use Illuminate\Http\Request;
use App\Models\Country;
use Flash;

class CountryController extends AppBaseController
{
    /** @var CountryRepository $countryRepository*/
    private $countryRepository;

    public function __construct()
    {
        $this->middleware('permission:View Countries|Add Countries|Edit Countries|Delete Countriess', ['only' => ['index', 'store']]);
        $this->middleware('permission:Add Countries', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Countries', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete Countries', ['only' => ['destroy']]);
    }


    public function index(Request $request)
    {
        $countries = Country::all();
        return view('AdminPanel.countries.index', get_defined_vars() );
    }

    public function create()
    {
        return view('AdminPanel.countries.create');
    }

    public function store(CreateCountryRequest $request)
    {
        // dd( $request->all() );
        Country::create($request->all());
        return redirect()->route('countries.index')->with('success', __('lang.created'));
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $country = Country::findOrFail($id);
        // dd($country->name);
        return view('AdminPanel.countries.edit',get_defined_vars());
    }

    public function update($id, UpdateCountryRequest $request)
    {
        $country = Country::findOrFail($id);
        // dd($country->name);
        $country->update($request->all());
        return redirect()->route('countries.index')->with('success', __('lang.updated'));
    }

    public function destroy($id)
    {
        Country::findOrFail($id)->delete();
        // dd($country->name);
        return redirect()->route('countries.index')->with('warning', __('lang.deleted'));
    }
}
