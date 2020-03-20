<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJoininglogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('joininglogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('resource_id')->default(0);
            $table->integer('client_id')->default(0);
            $table->integer('tech_id')->default(0);
            $table->integer('joining_id')->default(0);
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
        Schema::dropIfExists('joininglogs');
    }
}
