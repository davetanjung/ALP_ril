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
        Schema::create('groups__projects', function (Blueprint $table) {
            $table->id('group_project_id');
            $table->unsignedBigInteger('student_project_id');
            $table->foreign('student_project_id')->references('student_project_id')->on('students_projects')->onUpdate('cascade')->onDelete('cascade');            
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('student_id')->on('students')->onUpdate('cascade')->onDelete('cascade');                                    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups__projects');
    }
};
