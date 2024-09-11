<?php

use App\Enums\SupportStatus;

if (!function_exists("getStatusSupport")){
    function getStatusSupport($status):string{
        return SupportStatus::fromValue($status);
    }
}
