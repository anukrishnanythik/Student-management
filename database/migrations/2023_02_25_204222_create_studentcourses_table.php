<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentcoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentcourses', function (Blueprint $table) {
            $table->text('course_id');
            $table->foreign('course_id')->references('course_id')->on('Course');
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('student_id')->on('Student');

            $table->bigIncrements('stcourse_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('studentcourses');
    }
}
