<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class Status extends Enum
{
    const ACTIVE = 1;
    const NONE_ACTIVE = 2;
    const BLOCKED = 3;
}
