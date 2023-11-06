<?php

namespace App\Models\Enums;

enum UserRole : String
{
    case USER = "user";

    case ADMIN = "admin";
}
