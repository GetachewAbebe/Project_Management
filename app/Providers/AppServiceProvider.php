<?php

namespace App\Providers;

use App\Models\Directorate;
use App\Models\Employee;
use App\Models\Evaluation;
use App\Models\Project;
use App\Modules\Dashboard\Composers\GlobalStatsComposer;
use App\Modules\Directorate\Policies\DirectoratePolicy;
use App\Modules\Employee\Policies\EmployeePolicy;
use App\Modules\Evaluation\Policies\EvaluationPolicy;
use App\Modules\Project\Policies\ProjectPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        View::composer(['dashboard', 'evaluations.index', 'evaluations.summary'], GlobalStatsComposer::class);

        Gate::policy(Project::class, ProjectPolicy::class);
        Gate::policy(Evaluation::class, EvaluationPolicy::class);
        Gate::policy(Directorate::class, DirectoratePolicy::class);
        Gate::policy(Employee::class, EmployeePolicy::class);
    }
}
