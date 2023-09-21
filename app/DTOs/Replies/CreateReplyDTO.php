<?php

namespace App\DTOs\Replies;

use App\Http\Requests\StoreReplySupportRequest;

class CreateReplyDTO
{
    public function __construct(public string $supportId, public string $content)
    {
    }
    public static function makeFromRequest(StoreReplySupportRequest $request): self
    {
        // $request = (object)$request->all();
        // dd($request);
        return new self(
            $request->support_id,
            $request->content
        );
    }
}
