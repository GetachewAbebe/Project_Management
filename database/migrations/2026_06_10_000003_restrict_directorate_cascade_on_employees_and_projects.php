<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // employees.directorate_id: cascade → restrict
        Schema::table('employees', function (Blueprint $table) {
            $table->dropForeign(['directorate_id']);
            $table->foreign('directorate_id')
                ->references('id')
                ->on('directorates')
                ->onDelete('restrict');
        });

        // projects.directorate_id: cascade → restrict
        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeign(['directorate_id']);
            $table->foreign('directorate_id')
                ->references('id')
                ->on('directorates')
                ->onDelete('restrict');
        });
    }

    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropForeign(['directorate_id']);
            $table->foreign('directorate_id')
                ->references('id')
                ->on('directorates')
                ->onDelete('cascade');
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeign(['directorate_id']);
            $table->foreign('directorate_id')
                ->references('id')
                ->on('directorates')
                ->onDelete('cascade');
        });
    }
};
