<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewFeedback extends Model
{
    protected $table = 'review_feedback';

    protected $fillable = [
        'full_name',
        'email',
        'organization',
        'role',
        'event_rating',
        'logistics_rating',
        'technical_rating',
        'comments',
        'future_attendance',
    ];
}
