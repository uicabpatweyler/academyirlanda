<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('key',10)->unique();
            $table->string('incorporation',20)->nullable();
            $table->string('name',120);
            $table->unsignedBigInteger('school_type_id');
            $table->unsignedBigInteger('school_level_id');
            $table->unsignedBigInteger('school_service_id');
            $table->string('work_shift', 60);
            $table->string('economic_support', 60);
            $table->string('email',60)->nullable();
            $table->string('office_phone',20)->nullable();
            $table->boolean('status')->default(true);
            $table->unsignedInteger('user_created');
            $table->unsignedInteger('user_updated');
            $table->softDeletes();
            $table->timestamps();

            //Relationship SCHOOL_TYPES with SCHOOLS - 1:M
            $table->foreign('school_type_id')
                ->references('id')
                ->on('school_types');
            //Relationship SCHOOL_LEVELS with SCHOOLS - 1:M
            $table->foreign('school_level_id')
                ->references('id')
                ->on('school_levels');
            //Relationship SCHOOL_SERVICES  with SCHOOLS -  1:M
            $table->foreign('school_service_id')
                ->references('id')
                ->on('school_services');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schools');
    }
}
