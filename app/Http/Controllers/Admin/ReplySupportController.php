<?php

namespace App\Http\Controllers\Admin;

use App\DTOs\Replies\CreateReplyDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReplySupportRequest;
use App\Services\ReplySupportService;
use App\Services\SupportService;

class ReplySupportController extends Controller
{
    public function __construct(protected SupportService $serviceSupport, protected ReplySupportService $serviceReply)
    {
    }

    public function index(string $supportId)
    {
        if (!$support = $this->serviceSupport->findOne($supportId)) {
            return back();
        }
        $replies = $this->serviceReply->getAllBySupportId($supportId);
        return view('admin.supports.replies.replies', compact('support', 'replies'));
    }
    public function store(StoreReplySupportRequest $request, string $supportId)
    {
        $request = $this->serviceReply->createNew(CreateReplyDTO::makeFromRequest($request));
        if (!$request) {
            return back();
        }
        return redirect()->route('replies.index', $supportId)->with('message', 'Cadastrado com sucesso!');
    }
    public function destroy(string $supportId, string $id)
    {
        $this->serviceReply->delete($id);
        return redirect()->route('replies.index', $supportId)->with('message', 'Deletado com sucesso!');
    }
}
