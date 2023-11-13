<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\CreateNewsletterRequest;
use App\Http\Requests\UpdateNewsletterRequest;
use App\Http\Controllers\AppBaseController;
use App\Jobs\SendEmail;
use App\Models\Subscriber;
use App\Repositories\NewsletterRepository;
use Illuminate\Http\Request;
use Flash;

class NewsletterController extends AppBaseController
{
    /** @var NewsletterRepository $newsletterRepository*/
    private $newsletterRepository;

    public function __construct(NewsletterRepository $newsletterRepo)
    {
        $this->newsletterRepository = $newsletterRepo;
        $this->middleware('permission:View Newsletter', ['only' => ['index', 'store']]);
        $this->middleware('permission:Add Newsletter', ['only' => ['create','store']]);
    }

    /**
     * Display a listing of the Newsletter.
     */
    public function index(Request $request)
    {
        $newsletters = $this->newsletterRepository->all();

        return view('AdminPanel.newsletters.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new Newsletter.
     */
    public function create()
    {
        return view('AdminPanel.newsletters.create');
    }


    public function store(CreateNewsletterRequest $request)
    {
        $input = $request->all();

        $newsletter = $this->newsletterRepository->create($input);

        $subscribers = Subscriber::all();
        dispatch(new SendEmail($subscribers,$request->title,$request->description));

        return redirect(route('newsletters.index'))->with('success',__('lang.created'));
    }


    // public function show($id)
    // {
    //     $newsletter = $this->newsletterRepository->find($id);

    //     if (empty($newsletter)) {
    //         Flash::error('Newsletter not found');

    //         return redirect(route('newsletters.index'));
    //     }

    //     return view('newsletters.show')->with('newsletter', $newsletter);
    // }


    // public function edit($id)
    // {
    //     $newsletter = $this->newsletterRepository->find($id);

    //     if (empty($newsletter)) {
    //         Flash::error('Newsletter not found');

    //         return redirect(route('newsletters.index'));
    //     }

    //     return view('newsletters.edit')->with('newsletter', $newsletter);
    // }


    // public function update($id, UpdateNewsletterRequest $request)
    // {
    //     $newsletter = $this->newsletterRepository->find($id);

    //     if (empty($newsletter)) {
    //         Flash::error('Newsletter not found');

    //         return redirect(route('newsletters.index'));
    //     }

    //     $newsletter = $this->newsletterRepository->update($request->all(), $id);

    //     Flash::success('Newsletter updated successfully.');

    //     return redirect(route('newsletters.index'));
    // }


    // public function destroy($id)
    // {
    //     $newsletter = $this->newsletterRepository->find($id);

    //     if (empty($newsletter)) {
    //         Flash::error('Newsletter not found');

    //         return redirect(route('newsletters.index'));
    //     }

    //     $this->newsletterRepository->delete($id);

    //     Flash::success('Newsletter deleted successfully.');

    //     return redirect(route('newsletters.index'));
    // }
}
