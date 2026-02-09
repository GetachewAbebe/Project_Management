<?php

namespace App\Enums;

enum UserRole: string
{
    case ADMIN = 'admin';
    case DIRECTOR = 'director';
    case EVALUATOR = 'evaluator';
    case STAFF = 'staff';
}
