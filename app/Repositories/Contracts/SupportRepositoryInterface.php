<?php

namespace App\Repositories\Contracts;

use App\DTOs\Supports\{CreateSupportDTO, UpdateSupportDTO};
use App\ENUM\SupportStatus;
use stdClass;

interface SupportRepositoryInterface 
{
    public function paginate(int $page= 1 , int $totalPerPage = 15 , string $filter = null):PaginationInterface;
    public function getAll(string $filter = null): array;
    public function findOne(string $id): stdClass|null;
    public function delete(string $id): void;
    public function new(CreateSupportDTO $dto): stdClass;
    public function update(UpdateSupportDTO $dto): stdClass|null;
    public function updateStatus(string $id, SupportStatus $status): void;

}
