<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('client')->default(0);
            $table->integer('resource')->default(0);
            $table->string('contact_person',200)->nullable();
            $table->string('contact',200)->nullable();
            $table->string('datetime',200)->nullable();
            $table->string('mode',200)->nullable();
            $table->string('location',200)->nullable();
            $table->text('address')->nullable();
            $table->integer('deleted')->default(0);
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
        Schema::dropIfExists('interviews');
    }
}
