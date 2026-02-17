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
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->foreignId('evaluator_id')->constrained('employees')->onDelete('cascade');

            $table->integer('thematic_area_mark');
            $table->integer('relevance_mark');
            $table->integer('methodology_mark');
            $table->integer('feasibility_mark');
            $table->integer('overall_proposal_mark');

            $table->decimal('total_score', 5, 2);
            $table->string('decision');
            $table->text('comments')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};
