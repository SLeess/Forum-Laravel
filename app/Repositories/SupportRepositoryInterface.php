<?php

namespace App\Repositories;

use stdClass;

use App\DTO\Supports\{CreateSupportDTO,UpdateSupportDTO};
use App\Repositories\PaginateInterface;

interface SupportRepositoryInterface{
    public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = null): PaginateInterface;
    public function getAll(string $filter = null): array;
    public function findOne(string|int $id): stdClass|null;
    public function delete(string|int $id): void;
    public function new(CreateSupportDTO $dto): stdClass;
    public function update(UpdateSupportDTO $dto): stdClass|null;
}
