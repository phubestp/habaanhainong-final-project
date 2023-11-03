<?php

namespace App\Models\Enums;

enum AnimalSex: string
{
    case MALE = "เพศผู้";
    case FEMALE = "เพศเมีย";
    case NOT_SPECIFIED = "ไร้เพศ";
    case UNKNOWN = "ไม่ระบุ";
}
