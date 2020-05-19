<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_levels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('school_type_id');
            $table->string('name',40);
            $table->boolean('status')->default(true);
            $table->softDeletes();
            $table->timestamps();

            //Relationship SCHOOL_TYPES with SCHOOL_LEVELS - 1:M
            $table->foreign('school_type_id')
                ->references('id')
                ->on('school_types');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('school_levels');
    }
}
