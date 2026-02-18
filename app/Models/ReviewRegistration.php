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
        'job_title',
        'department',
        'phone',
        'role',
        'status',
        'reference_code',
        'gender',
        'city',
        'qualification',
        'expertise',
        'previous_attendance',
        'specialization',
        'presentation_title',
        'project_status',
        'abstract_text',
        'abstract_file_path',
        'presentation_ppt_path',
        'thematic_area',
        'available_on_date',
        'travel_option',
        'needs_hotel',
        'discovery_source',
        'inviter_name',
        'support_letter_path',
        'questions',
        'extra_projects',
    ];

    protected $casts = [
        'extra_projects' => 'array',
    ];
}
