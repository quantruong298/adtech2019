<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class Roles extends Enum
{
    const ADMIN = 1;
    const USER = 2;
    const MP = 3;
    const ADVERTISEMENT = 4;
    const DMP = 5;
    const SSP = 6;
    const DSP = 7;
    const PUBLISHER = 8;

}
