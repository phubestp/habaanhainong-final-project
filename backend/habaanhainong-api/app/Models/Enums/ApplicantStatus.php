<?php

namespace App\Models\Enums;

enum ApplicantStatus : String
{
    case REJECTED = "ถูกปฏิเสธ";
    case WAITING = "รอการติดต่อ";
    case CONTACTING = "อยู่ระหว่างการติดต่อ";
    case ADOPTED = "รับเลี้ยงแล้ว";
    case TRUSTWORTHY = "น่าเชื่อถือ";
}
