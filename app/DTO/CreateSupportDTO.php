<?php

namespace App\DTO;

use App\Http\Requests\StoreUpdateSupportRequest;

class CreateSupportDTO
{
    public function __construct(
        public string $subject,
        public string $status,
        public string $body
    ){

    }
           //método estático                        //retorna um objeto da própria classe
    public static function makefromRequest(StoreUpdateSupportRequest $request): self
    {
        return new self($request->subject, 'a', $request->body);
    }
}
