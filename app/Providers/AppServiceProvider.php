<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Gate;
use App\Models\Project;
use App\Policies\ProjectPolicy;
use App\Models\Evaluation;
use App\Policies\EvaluationPolicy;
use App\Models\Directorate;
use App\Policies\DirectoratePolicy;
use App\Models\Employee;
use App\Policies\EmployeePolicy;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }


    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', \App\View\Composers\GlobalStatsComposer::class);
        
        Gate::policy(Project::class, ProjectPolicy::class);
        Gate::policy(Evaluation::class, EvaluationPolicy::class);
        Gate::policy(Directorate::class, DirectoratePolicy::class);
        Gate::policy(Employee::class, EmployeePolicy::class);
    }
}

