<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->index('pi_id');
            $table->index('directorate_id');
            $table->index('status');
            $table->index('project_code');
        });

        Schema::table('evaluations', function (Blueprint $table) {
            $table->index('project_id');
            $table->index('evaluator_id');
            $table->index('decision');
        });

        Schema::table('employees', function (Blueprint $table) {
            $table->index('directorate_id');
            $table->index('system_role');
        });

        Schema::table('evaluation_assignments', function (Blueprint $table) {
            $table->index('project_id');
            $table->index('evaluator_id');
            $table->index('status');
            $table->index('expires_at');
        });

        Schema::table('invitations', function (Blueprint $table) {
            $table->index('employee_id');
            $table->index('directorate_id');
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropIndex(['pi_id']);
            $table->dropIndex(['directorate_id']);
            $table->dropIndex(['status']);
            $table->dropIndex(['project_code']);
        });

        Schema::table('evaluations', function (Blueprint $table) {
            $table->dropIndex(['project_id']);
            $table->dropIndex(['evaluator_id']);
            $table->dropIndex(['decision']);
        });

        Schema::table('employees', function (Blueprint $table) {
            $table->dropIndex(['directorate_id']);
            $table->dropIndex(['system_role']);
        });

        Schema::table('evaluation_assignments', function (Blueprint $table) {
            $table->dropIndex(['project_id']);
            $table->dropIndex(['evaluator_id']);
            $table->dropIndex(['status']);
            $table->dropIndex(['expires_at']);
        });

        Schema::table('invitations', function (Blueprint $table) {
            $table->dropIndex(['employee_id']);
            $table->dropIndex(['directorate_id']);
        });
    }
};
