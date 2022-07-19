<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserGradeEntryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_grade_entry', function (Blueprint $table) {
            $table->id();
            $table->string("mathematics")->nullable();
            $table->string("english")->nullable();
            $table->string("swahili")->nullable();
            $table->string("science")->nullable();
            $table->string("humanity")->nullable();
            $table->string("totalpoints")->nullable();
            $table->string("average")->nullable();
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
        Schema::dropIfExists('user_grade_entry');
    }
}
