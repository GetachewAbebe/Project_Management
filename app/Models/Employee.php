<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['full_name', 'directorate_id', 'institutional_id', 'email', 'position', 'system_role'];

    public function directorate()
    {
        return $this->belongsTo(Directorate::class);
    }

    public function projectsAsPI()
    {
        return $this->hasMany(Project::class, 'pi_id');
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class, 'evaluator_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'email', 'email');
    }

    public function invitation()
    {
        return $this->hasOne(Invitation::class, 'email', 'email');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($employee) {
            // Purge related identity records
            $employee->user()->delete();
            $employee->invitation()->delete();
        });
    }
}
