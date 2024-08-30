<?php

namespace App\Repositories;

use stdClass;
use App\DTO\{CreateSupportDTO,UpdateSupportDTO};
use App\Models\Admin\Support;
use App\Repositories\SupportRepositoryInterface;

class SupportEloquentORM implements SupportRepositoryInterface{
    //podemos extender o model, ou melhor ainda, injetá-lo no construtor
    public function __construct(
        protected Support $model
    ){}

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
        if(is_int(gettype($id)))
            $id = strval($id);

        $support = $this->model->find($id);

        if(!$support) return null;

        return (object) $suppport->toArray();
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
