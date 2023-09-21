<?php

namespace App\Http\Controllers\Admin;

use App\DTOs\Replies\CreateReplyDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReplySupportRequest;
use App\Services\ReplySupportService;
use App\Services\SupportService;
use Illuminate\Http\Request;

class ReplySupportController extends Controller
{
    public function __construct(protected SupportService $serviceSupport, protected ReplySupportService $serviceReply)
    {
    }

    public function index(string $id)
    {
        if (!$support = $this->serviceSupport->findOne($id)) {
            return back();
        }
        $replies = $this->serviceReply->getAllBySupportId($id);
        return view('admin.supports.replies.replies', compact('support', 'replies'));
    } 
    public function store(StoreReplySupportRequest $request)
    {
        if (!$request = $this->serviceReply->createNew(CreateReplyDTO::makeFromRequest($request))) {
            return back();
        }
        return redirect()->route('replies.index', $request->support_id)->with('message', 'Cadastrado com sucesso!');

    }
    public function destroy(string $supportId, string $id)
    {
        $this->serviceReply->delete($id);
        return redirect()->route('replies.index', $supportId)->with('message', 'Deletado com sucesso!');

    }
}
