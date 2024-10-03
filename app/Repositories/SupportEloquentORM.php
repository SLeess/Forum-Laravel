<?php

namespace App\Repositories;

use stdClass;
use App\DTO\Supports\{CreateSupportDTO,UpdateSupportDTO};
use App\Models\Admin\Support;
use App\Repositories\SupportRepositoryInterface;
use App\Presenter\PaginationPresenter;

class SupportEloquentORM implements SupportRepositoryInterface{
    //podemos extender o model, ou melhor ainda, injetá-lo no construtor
    public function __construct(
        protected Support $model
    ){}

    public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = null): PaginateInterface
    {
        $result = $this->model
                    ->when($filter, function ($query) use ($filter) {
                        $query->where('subject', 'like', "%{$filter}%")
                            ->orWhere('body', 'like', "%{$filter}%");
                    })
                    //total de itens por página,      quais itens é pra trazer no select,     nome do parâmetro,       qual é a página atual
                    ->paginate($totalPerPage, ['*'], "page", $page);

        return new PaginationPresenter($result);
    }

    public function getAll(string $filter = null): array{
        return $this->model
                    ->where(function ($query) use ($filter){
                        if($filter){
                            $query->where('subject', '==', $filter);
                            $query->orWhere('body', 'like', '%{$filter}%');
                        }
                    })
                    ->get() //->all(), ele só pode ser usado quando não é feito nenhuma query, se não, é get()
                    ->toArray();
    }
    public function findOne(string|int $id): stdClass|null{
        $support = $this->model->find($id);

        if(!$support) return null;

        return (object) $support->toArray();
    }
    public function delete(string|int $id): void{
        if(is_int(gettype($id)))
            $id = strval($id);

        $this->model->findOrFail($id)->delete();
    }
    public function new(CreateSupportDTO $dto): stdClass{
        $support = $this->model->create(
            (array) $dto
        );
        return (object) $support->toArray();
    }
    public function update(UpdateSupportDTO $dto): stdClass|null{
        if(!$support = $this->model->find($dto->id)){
            return null;
        }

        $support->update(
            (array) $dto
        );

        return (object) $support->toArray();
    }
}
