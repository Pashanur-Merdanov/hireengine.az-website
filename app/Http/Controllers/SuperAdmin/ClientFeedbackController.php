<?php

namespace App\Http\Controllers\SuperAdmin;

use Illuminate\Http\Request;
use App\ClientFeedback;
use App\Http\Requests\SuperAdmin\StoreClientFeedback;
use App\Helper\Reply;

class ClientFeedbackController extends SuperAdminBaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->pageIcon = 'icon-screen-desktop';
        $this->pageTitle = 'menu.clientFeedbacks';
    }

    public function index() {
        $this->feedbacks = ClientFeedback::all();
        return view('super-admin.feedback.index', $this->data);
    }

    public function store(StoreClientFeedback $request) {
        $feedback = new ClientFeedback();
        $feedback->client_title = $request->client_title;
        $feedback->feedback = $request->feedback;
        $feedback->save();

         return Reply::redirect(route('superadmin.client-feedbacks.index'), __('menu.clientFeedbacks') . ' ' . __('messages.updatedSuccessfully'));
    }

    public function edit($id) {
        $this->feedback = ClientFeedback::findOrFail($id);
        return view('super-admin.feedback.edit', $this->data);
    }


    public function update(StoreClientFeedback $request, $id) {
        $feedback = ClientFeedback::findOrFail($id);
        $feedback->client_title = $request->client_title;
        $feedback->feedback = $request->feedback;
        $feedback->save();

         return Reply::redirect(route('superadmin.client-feedbacks.index'), __('menu.clientFeedbacks') . ' ' . __('messages.updatedSuccessfully'));
    }

    public function destroy($id) {
        ClientFeedback::destroy($id);
        return Reply::success(__('messages.recordDeleted'));
    }
}
