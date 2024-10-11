<?php

namespace App\Models\Enum;

use App\Support\EnumToArray;

enum StateEnum: string
{
    use EnumToArray;

    case PENDING = 'PENDING';
    case ACTIVE = 'ACTIVE';
    case FAILED = 'FAILED';
    case FINISHED = 'FINISHED';
}
