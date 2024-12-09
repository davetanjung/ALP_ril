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
        Schema::create('projects', function (Blueprint $table) {
            $table->id('project_id');
            $table->timestamps();
            $table->string('title');
            $table->string('description');
            $table->string('assignment_type');
            $table->unsignedBigInteger('lecturer_subject_id');
            $table->foreign('lecturer_subject_id')->references('lecturer_subject_id')->on('lecturers_subjects')->onUpdate('cascade')->onDelete('cascade');            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
