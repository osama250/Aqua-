<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\CreateContactUsRequest;
use App\Http\Requests\UpdateContactUsRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ContactUsRepository;
use Illuminate\Http\Request;
use Flash;

class ContactUsController extends AppBaseController
{
    /** @var ContactUsRepository $contactUsRepository*/
    private $contactUsRepository;

    public function __construct(ContactUsRepository $contactUsRepo)
    {
        $this->contactUsRepository = $contactUsRepo;
        $this->middleware('permission:View Messages', ['only' => ['index']]);
    }

    /**
     * Display a listing of the ContactUs.
     */
    public function index()
    {
        $contactuses = $this->contactUsRepository->all();

        return view('AdminPanel.contactus.index',get_defined_vars());
    }

    // /**
    //  * Show the form for creating a new ContactUs.
    //  */
    // public function create()
    // {
    //     return view('contactuses.create');
    // }

    // /**
    //  * Store a newly created ContactUs in storage.
    //  */
    // public function store(CreateContactUsRequest $request)
    // {
    //     $input = $request->all();

    //     $contactUs = $this->contactUsRepository->create($input);

    //     Flash::success('Contact Us saved successfully.');

    //     return redirect(route('contactuses.index'));
    // }

    // /**
    //  * Display the specified ContactUs.
    //  */
    // public function show($id)
    // {
    //     $contactUs = $this->contactUsRepository->find($id);

    //     if (empty($contactUs)) {
    //         Flash::error('Contact Us not found');

    //         return redirect(route('contactuses.index'));
    //     }

    //     return view('contactuses.show')->with('contactUs', $contactUs);
    // }

    // /**
    //  * Show the form for editing the specified ContactUs.
    //  */
    // public function edit($id)
    // {
    //     $contactUs = $this->contactUsRepository->find($id);

    //     if (empty($contactUs)) {
    //         Flash::error('Contact Us not found');

    //         return redirect(route('contactuses.index'));
    //     }

    //     return view('contactuses.edit')->with('contactUs', $contactUs);
    // }

    // /**
    //  * Update the specified ContactUs in storage.
    //  */
    // public function update($id, UpdateContactUsRequest $request)
    // {
    //     $contactUs = $this->contactUsRepository->find($id);

    //     if (empty($contactUs)) {
    //         Flash::error('Contact Us not found');

    //         return redirect(route('contactuses.index'));
    //     }

    //     $contactUs = $this->contactUsRepository->update($request->all(), $id);

    //     Flash::success('Contact Us updated successfully.');

    //     return redirect(route('contactuses.index'));
    // }

    // /**
    //  * Remove the specified ContactUs from storage.
    //  *
    //  * @throws \Exception
    //  */
    // public function destroy($id)
    // {
    //     $contactUs = $this->contactUsRepository->find($id);

    //     if (empty($contactUs)) {
    //         Flash::error('Contact Us not found');

    //         return redirect(route('contactuses.index'));
    //     }

    //     $this->contactUsRepository->delete($id);

    //     Flash::success('Contact Us deleted successfully.');

    //     return redirect(route('contactuses.index'));
    // }
}
