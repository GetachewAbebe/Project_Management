<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'research_title',
        'pi_id',
        'directorate_id',
        'description',
        'objective',
        'start_year',
        'end_year',
        'status',
        'project_code',
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

    public function getStatusDetailsAttribute(): array
    {
        $statusColors = [
            'REGISTERED' => ['bg' => '#f1f5f9', 'text' => '#64748b', 'label' => 'NEW'],
            'ONGOING' => ['bg' => '#dcfce7', 'text' => '#166534', 'label' => 'ONGOING'],
            'COMPLETED' => ['bg' => '#dbeafe', 'text' => '#1e40af', 'label' => 'COMPLETED'],
            'EVALUATED' => ['bg' => '#f5f3ff', 'text' => '#5b21b6', 'label' => 'EVALUATED'],
            'TERMINATED' => ['bg' => '#fee2e2', 'text' => '#dc2626', 'label' => 'TERMINATED'],
        ];

        return $statusColors[strtoupper($this->status)] ?? ['bg' => '#f1f5f9', 'text' => '#64748b', 'label' => $this->status];
    }
}
