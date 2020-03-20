<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNonjoiningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nonjoinings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('resource')->default(0);
            $table->integer('clients')->default(0);
            $table->string('end_date')->nullable();
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
        Schema::dropIfExists('nonjoinings');
    }
}
