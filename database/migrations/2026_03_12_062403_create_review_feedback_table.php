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
        Schema::create('review_feedback', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email');
            $table->string('organization')->nullable();
            $table->string('role')->nullable();
            $table->integer('event_rating')->comment('1-5 rating for overall event');
            $table->integer('logistics_rating')->comment('1-5 rating for logistics');
            $table->integer('technical_rating')->comment('1-5 rating for technical sessions');
            $table->text('comments')->nullable();
            $table->string('future_attendance')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review_feedback');
    }
};
