<?php

namespace App\Repositories\Contracts;

use App\DTOs\Replies\CreateReplyDTO;
use stdClass;

interface ReplyRepositoryInterface
{
    public function getAllBySupportId(string $supportid): array;
    

    public function createNew(CreateReplyDTO $dto): stdClass;
    public function delete(string $id): bool;
    
}
