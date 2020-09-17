<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('school_id');
            $table->unsignedBigInteger('school_cycle_id');
            $table->unsignedBigInteger('school_grade_id');
            $table->string('name',120);
            $table->integer('allowed_students');
            $table->boolean('status')->default(true);
            $table->unsignedInteger('user_created');
            $table->unsignedInteger('user_updated');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('school_id')->references('id')->on('schools');
            $table->foreign('school_cycle_id')->references('id')->on('school_cycles');
            $table->foreign('school_grade_id')->references('id')->on('school_grades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('school_groups');
    }
}
