<?php

namespace App\DTO;

use App\Http\Requests\StoreUpdateSupportRequest;

class UpdateSupportDTO
{
    public function __construct(
        public string $id,
        string $subject,
        string $status,
        string $body
    ){

    }
           //método estático                        //retorna um objeto da própria classe

    public static function makefromRequest(StoreUpdateSupportRequest $request): self
    {
        return new self($request->id, $request->subject, 'a', $request->body);
    }
}
