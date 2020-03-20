<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJoiningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('joinings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('client_id')->default(0);
            $table->integer('resource_id')->default(0);
            $table->string('start_date',200)->nullable();
            $table->string('end_date',200)->nullable();
            $table->string('creadit_period',200)->nullable();
            $table->string('date_of_invoice',200)->nullable();
            $table->string('contract_type',200)->nullable();
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
        Schema::dropIfExists('joinings');
    }
}
