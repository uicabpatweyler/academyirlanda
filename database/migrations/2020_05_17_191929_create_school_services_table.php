<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('school_type_id');
            $table->unsignedBigInteger('school_level_id');
            $table->string('name',40);
            $table->boolean('status')->default(true);
            $table->softDeletes();
            $table->timestamps();

            //Relationship SCHOOL_TYPES with SCHOOL_SERVICES - 1:M
            $table->foreign('school_type_id')
                ->references('id')
                ->on('school_types');

            //Relationship SCHOOL_LEVELS with SCHOOL_SERVICES - 1:M
            $table->foreign('school_level_id')
                ->references('id')
                ->on('school_levels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('school_services');
    }
}
