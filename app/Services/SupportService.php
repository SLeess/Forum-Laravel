<?php

namespace App\Services;

use stdClass;
use App\Repositories\PaginateInterface;
use App\DTO\Supports\{CreateSupportDTO,UpdateSupportDTO};
use App\Repositories\SupportRepositoryInterface;

class SupportService{
    public function __construct(
        protected SupportRepositoryInterface $repository
    ){

    }
        //Forma de definir o padrão de retorno em laravel
        //Retornar sempre array
    public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = null): PaginateInterface
    {
        return $this->repository->paginate(page: $page, totalPerPage: $totalPerPage, filter: $filter);
    }

    public function getAll(string $filter = null): array|null
    {
        return $this->repository->getAll($filter);
    }

    public function findOne(string|int $id): stdClass|null
    {
        return $this->repository->findOne($id);
    }
                    //store da api


    public function new(
        //string $subject, string $status, string $body //isso é má prática, precisamos usar o partner DTO, pois poderia haver muitos atributos para fazer o registro
        CreateSupportDTO $dto
    ): stdClass
    {
        return $this->repository->new(
            //$subject, $status, $body
            $dto
        );
    }

            //string|int $id, string $subject, string $status, string $body
    public function update(UpdateSupportDTO $dto): stdClass|null //caso passe um id inválido
    {
        return $this->repository->update($dto);
    }

    public function delete(string|int $id): void
    {
        $this->repository->delete($id);
    }
}
