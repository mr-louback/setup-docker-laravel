<?php

namespace App\DTOs\Replies;

class CreateReplyDTO
{
    public function __construct(public string $supportid, public string $content)
    {
    }
}
