<?php

namespace App\Enums;

enum VacationStatus: string
{
    case PENDING = "pending";
    case ACCEPTED = "accepted";
    case REJECTED = "rejected";
}
