<?php

namespace App\Services;

use App\DTOs\Replies\CreateReplyDTO;
use App\Repositories\Contracts\ReplyRepositoryInterface;
use stdClass;

class ReplySupportService
{
    public function __construct(protected ReplyRepositoryInterface $repository)
    {
    }
    public function getAllBySupportId(string $support_id): array
    {
        return $this->repository->getAllBySupportId($support_id);
    }

    public function createNew(CreateReplyDTO $dto): stdClass
    {
        return $this->repository->createNew($dto);
    }
    public function delete(string $id): bool
    {
        return $this->repository->delete($id);
    }
}
