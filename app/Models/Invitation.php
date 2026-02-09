<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invitation extends Model
{
    use HasFactory;
    protected $fillable = ['email', 'directorate_id', 'employee_id', 'token', 'expires_at'];

    protected $casts = [
        'expires_at' => 'datetime',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function directorate()
    {
        return $this->belongsTo(Directorate::class);
    }

    public function isExpired()
    {
        return $this->expires_at->isPast();
    }
}
