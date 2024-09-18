<?php

namespace App\DTO\Supports;

use App\Enums\SupportStatus;
use App\Http\Requests\StoreUpdateSupportRequest;

class UpdateSupportDTO
{
    public function __construct(
        public string $id,
        public string $subject,
        public SupportStatus $status,
        public string $body
    ){

    }
           //método estático                        //retorna um objeto da própria classe

    public static function makefromRequest(StoreUpdateSupportRequest $request, $id = null): self
    {
        return new self(
            //if exists $id, consider that one, if not, use $request->id
            $id ?? $request->id,
            $request->subject,
            SupportStatus::A ,
            $request->body
        );
    }
}
