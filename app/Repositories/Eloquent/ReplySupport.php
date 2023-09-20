<?php

namespace App\Repositories\Eloquent;

use App\DTOs\Replies\CreateReplyDTO;
use App\Repositories\Contracts\ReplyRepositoryInterface;
use stdClass;

class ReplySupport implements ReplyRepositoryInterface
{
    public function getAllBySupportId(string $supportid): array
    {
        return [];

    }


    public function createNew(CreateReplyDTO $dto): stdClass
    {
        throw new \Exception('not implemented');
    }
}
