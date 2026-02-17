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
        Schema::table('evaluations', function (Blueprint $table) {
            $table->renameColumn('evaluator_id', 'evaluator_1_id');
        });

        Schema::table('evaluations', function (Blueprint $table) {
            $table->foreignId('evaluator_2_id')->after('evaluator_1_id')->nullable()->constrained('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('evaluations', function (Blueprint $table) {
            $table->dropForeign(['evaluator_2_id']);
            $table->dropColumn('evaluator_2_id');
        });

        Schema::table('evaluations', function (Blueprint $table) {
            $table->renameColumn('evaluator_1_id', 'evaluator_id');
        });
    }
};
