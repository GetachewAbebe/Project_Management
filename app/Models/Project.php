<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'research_title',
        'pi_id',
        'directorate_id',
        'description',
        'objective',
        'start_year',
        'end_year',
        'status',
        'project_code'
    ];

    public function pi()
    {
        return $this->belongsTo(Employee::class, 'pi_id');
    }

    public function directorate()
    {
        return $this->belongsTo(Directorate::class);
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }
}
