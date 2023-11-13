<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateAttachmentRequest;
use App\Http\Requests\AdminPanel\UpdateAttachmentRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\AttachmentRepository;
use Illuminate\Http\Request;
use App\Models\Attachment;
use Flash;

class AttachmentController extends AppBaseController
{
    /** @var AttachmentRepository $attachmentRepository*/
    private $attachmentRepository;

    public function __construct(AttachmentRepository $attachmentRepo)
    {
        $this->attachmentRepository = $attachmentRepo;
        $this->middleware('permission:View Attachment|Add Attachment|Edit Attachment|Delete Attachment', ['only' => ['index', 'store']]);
        $this->middleware('permission:Add Attachment', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Attachment', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete Attachment', ['only' => ['destroy']]);
    }


    public function index(Request $request)
    {
        // $attachments = $this->attachmentRepository->paginate(10);
        $attachments = Attachment::all();
        return view('AdminPanel.attachments.index' , get_defined_vars() );
    }

    public function create()
    {
        return view('AdminPanel.attachments.create');
    }

    public function store(CreateAttachmentRequest $request)
    {
        $input = $request->all();
        $attachment = $this->attachmentRepository->create($input)->with('success',__('lang.created'));
        return redirect(route('attachments.index'));
    }

    public function show($id)
    {
        $attachment = $this->attachmentRepository->find($id);
        return view('attachments.show')->with('attachment', $attachment);
    }


    public function edit($id)
    {
        $attachment = $this->attachmentRepository->find($id);
        return view('AdminPanel.attachments.edit')->with('attachment', $attachment);
    }


    public function update($id, UpdateAttachmentRequest $request)
    {
        $attachment = $this->attachmentRepository->find($id);
        $attachment = $this->attachmentRepository->update($request->all(), $id);
        return redirect(route('attachments.index'))->with('success',__('lang.created'));
    }

    public function destroy($id)
    {
        $attachment = $this->attachmentRepository->find($id);
        $this->attachmentRepository->delete($id);
        return redirect(route('attachments.index'))->with('warning',__('lang.created'));
    }
}
