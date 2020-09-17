<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_fees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('school_id');
            $table->unsignedBigInteger('school_cycle_id');
            $table->string('name');
            $table->integer('type');
            $table->double('amount',8,2);
            $table->boolean('status')->default(true);
            $table->unsignedInteger('user_created');
            $table->unsignedInteger('user_updated');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('school_id')->references('id')->on('schools');
            $table->foreign('school_cycle_id')->references('id')->on('school_cycles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('school_fees');
    }
}
