<?php

namespace App\Services;

use App\DTOs\Replies\CreateReplyDTO;
use stdClass;

class ReplySupportService
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
