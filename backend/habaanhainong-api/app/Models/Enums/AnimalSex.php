<?php

namespace App\Models\Enums;

enum AnimalSex: string
{
    case MALE = "เพศผู้";
    case FEMALE = "เพศเมีย";
    case UNKNOWN = "ไม่ระบุ";
}
