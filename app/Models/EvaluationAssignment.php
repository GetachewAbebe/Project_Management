<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class EvaluationAssignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'evaluator_id',
        'token',
        'status',
        'expires_at',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
    ];

    public static function generateToken()
    {
        return Str::random(64);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function evaluator()
    {
        return $this->belongsTo(Employee::class, 'evaluator_id');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'PENDING');
    }
}
