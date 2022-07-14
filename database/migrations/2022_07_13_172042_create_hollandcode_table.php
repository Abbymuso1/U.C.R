<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHollandcodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hollandcode', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained('course')->onUpdate('cascade')->onDelete('cascade');
            $table->string('holland_name');
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
        Schema::dropIfExists('hollandcode');
    }
}
