<?php

namespace App\Http\Controllers\Api;

use App\DTOs\Replies\CreateReplyDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReplySupportRequest;
use App\Http\Resources\ReplySupportResource;
use App\Services\ReplySupportService;
use App\Services\SupportService;
use Illuminate\Http\Response;

class ReplySupportApiController extends Controller
{
    public function __construct(protected SupportService $supportService, protected ReplySupportService $replySupportService){}
    public function getRepliesFromSupport(string $supportId)
    {
        if (!$this->supportService->findOne($supportId)) {
            return response()->json(['message' => 'not_found'], Response::HTTP_NOT_FOUND);
        }
        $replies = $this->replySupportService->getAllBySupportId($supportId);
        return ReplySupportResource::collection($replies);
    }
    public function createNewRepliesFromSupport(StoreReplySupportRequest $request)
    {
        $reply = $this->replySupportService->createNew(CreateReplyDTO::makeFromRequest($request));
        return (new ReplySupportResource($reply))->response()->setStatusCode(Response::HTTP_CREATED);
    }
    public function deleteRepliesFromSupport(string $id)
    {
        if(!$this->replySupportService->delete($id)){
            return response()->json(['message' => 'not_found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json([],Response::HTTP_NO_CONTENT);
    }
}
