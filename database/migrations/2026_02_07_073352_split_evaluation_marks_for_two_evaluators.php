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
            // Rename existing marks to _1
            $table->renameColumn('thematic_area_mark', 'thematic_area_mark_1');
            $table->renameColumn('relevance_mark', 'relevance_mark_1');
            $table->renameColumn('methodology_mark', 'methodology_mark_1');
            $table->renameColumn('feasibility_mark', 'feasibility_mark_1');
            $table->renameColumn('overall_proposal_mark', 'overall_proposal_mark_1');
        });

        Schema::table('evaluations', function (Blueprint $table) {
            // Add new marks for _2
            $table->integer('thematic_area_mark_2')->after('thematic_area_mark_1')->nullable();
            $table->integer('relevance_mark_2')->after('relevance_mark_1')->nullable();
            $table->integer('methodology_mark_2')->after('methodology_mark_1')->nullable();
            $table->integer('feasibility_mark_2')->after('feasibility_mark_1')->nullable();
            $table->integer('overall_proposal_mark_2')->after('overall_proposal_mark_1')->nullable();
            
            // Allow total_score to be decimal (already is 5,2)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('evaluations', function (Blueprint $table) {
            $table->dropColumn([
                'thematic_area_mark_2',
                'relevance_mark_2',
                'methodology_mark_2',
                'feasibility_mark_2',
                'overall_proposal_mark_2'
            ]);
        });
        
        Schema::table('evaluations', function (Blueprint $table) {
            $table->renameColumn('thematic_area_mark_1', 'thematic_area_mark');
            $table->renameColumn('relevance_mark_1', 'relevance_mark');
            $table->renameColumn('methodology_mark_1', 'methodology_mark');
            $table->renameColumn('feasibility_mark_1', 'feasibility_mark');
            $table->renameColumn('overall_proposal_mark_1', 'overall_proposal_mark');
        });
    }
};
