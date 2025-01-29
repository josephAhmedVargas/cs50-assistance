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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->enum('schedule', ['8-10', '10-12', '1-3', '3-5']);
            $table->foreignId('cycle_id')->constrained('cycles')->onDelete('cascade');
            $table->enum('type', ['class', 'office_hour']);
            $table->integer('class_number')->nullable();
            $table->integer('office_hour_week')->nullable();
            $table->decimal('hours_attended', 4, 2)->nullable(); // For office hours
            $table->foreignId('registered_by')->constrained('users')->onDelete('cascade'); // The user who registered
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
