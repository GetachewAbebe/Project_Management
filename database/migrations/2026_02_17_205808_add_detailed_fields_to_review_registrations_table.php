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
            $table->string('gender')->nullable();
            $table->string('city')->nullable();
            $table->string('qualification')->nullable();
            $table->string('specialization')->nullable();
            $table->string('presentation_title')->nullable();
            $table->text('abstract_text')->nullable();
            $table->string('abstract_file_path')->nullable();
            $table->string('available_on_date')->nullable();
            $table->string('discovery_source')->nullable();
            $table->string('support_letter_path')->nullable();
            $table->text('questions')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('review_registrations', function (Blueprint $table) {
            //
        });
    }
};
