<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateContactInfoRequest;
use App\Http\Requests\AdminPanel\UpdateContactInfoRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ContactInfoRepository;
use Illuminate\Http\Request;
use App\Models\ContactInfo;
use Flash;

class ContactInfoController extends AppBaseController
{
    /** @var ContactInfoRepository $contactInfoRepository*/
    private $contactInfoRepository;

    public function __construct(ContactInfoRepository $contactInfoRepo)
    {
        $this->contactInfoRepository = $contactInfoRepo;
        $this->middleware('permission:View ContactInfo|Add ContactInfo|Edit ContactInfo|Delete ContactInfo', ['only' => ['index', 'store']]);
        $this->middleware('permission:Add ContactInfo', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit ContactInfo', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete ContactInfo', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        // $contactInfos = $this->contactInfoRepository->paginate(10);
        $contactInfos  = ContactInfo::all();
        return view('AdminPanel.contact_infos.index')->with('contactInfos', $contactInfos);
    }

    public function create()
    {
        return view('AdminPanel.contact_infos.create');
    }

    public function store(CreateContactInfoRequest $request)
    {
        $input = $request->all();
        // return $input;
        $contactInfo = $this->contactInfoRepository->create($input);
        return redirect(route('contact-infos.index'))->with('success',__('lang.created'));
    }

    public function show($id)
    {
        $contactInfo = $this->contactInfoRepository->find($id);
        return view('contact_infos.show')->with('contactInfo', $contactInfo);
    }

    public function edit($id)
    {
        $contactInfo = $this->contactInfoRepository->find($id);
        return view('AdminPanel.contact_infos.edit')->with('contactInfo', $contactInfo);
    }

    public function update($id, UpdateContactInfoRequest $request)
    {
        $contactInfo = $this->contactInfoRepository->find($id);
        $contactInfo = $this->contactInfoRepository->update($request->all(), $id);
        return redirect(route('contact-infos.index'))->with('success',__('lang.created'));
    }

    public function destroy($id)
    {
        $contactInfo = $this->contactInfoRepository->find($id);
        $this->contactInfoRepository->delete($id);
        return redirect(route('contactInfos.index'))->with('warning',__('lang.created'));
    }
}
