<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'organization',
        'phone',
        'role',
        'status',
        'reference_code',
        'gender',
        'city',
        'qualification',
        'specialization',
        'presentation_title',
        'abstract_text',
        'abstract_file_path',
        'available_on_date',
        'discovery_source',
        'support_letter_path',
        'questions'
    ];
}
