<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->text('objective')->nullable()->after('research_title');
            $table->integer('start_year')->nullable()->after('objective');
            $table->integer('end_year')->nullable()->after('start_year');
            $table->string('project_code')->nullable()->unique()->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['objective', 'start_year', 'end_year', 'project_code']);
        });
    }
};
