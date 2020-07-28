<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolCyclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_cycles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('period',9)->unique();
            $table->boolean('status')->default(true);
            $table->unsignedInteger('user_created');
            $table->unsignedInteger('user_updated');
            $table->softDeletes();
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
        Schema::dropIfExists('school_cycles');
    }
}
