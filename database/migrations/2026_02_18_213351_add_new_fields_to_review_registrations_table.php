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
        Schema::table('review_registrations', function (Blueprint $table) {
            $table->string('job_title')->nullable()->after('organization');
            $table->string('department')->nullable()->after('job_title');
            $table->string('expertise')->nullable()->after('qualification');
            $table->string('previous_attendance')->nullable()->after('expertise');
            $table->string('thematic_area')->nullable()->after('abstract_text');
            $table->string('inviter_name')->nullable()->after('discovery_source');
            $table->string('project_status')->nullable()->after('presentation_title');
            $table->string('presentation_ppt_path')->nullable()->after('abstract_file_path');
            $table->string('travel_option')->nullable()->after('presentation_ppt_path');
            $table->string('needs_hotel')->nullable()->after('travel_option');
            $table->json('extra_projects')->nullable()->after('needs_hotel');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('review_registrations', function (Blueprint $table) {
            $table->dropColumn([
                'job_title', 'department', 'expertise', 'previous_attendance',
                'thematic_area', 'inviter_name', 'project_status',
                'presentation_ppt_path', 'travel_option', 'needs_hotel', 'extra_projects'
            ]);
        });
    }
};
