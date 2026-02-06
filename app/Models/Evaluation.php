<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = [
        'project_id',
        'evaluator_id',
        'thematic_area_mark',
        'relevance_mark',
        'methodology_mark',
        'feasibility_mark',
        'overall_proposal_mark',
        'total_score',
        'decision',
        'comments'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function evaluator()
    {
        return $this->belongsTo(Employee::class, 'evaluator_id');
    }
}
