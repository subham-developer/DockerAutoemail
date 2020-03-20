<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonthlyRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_records', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('month')->default(0);
            $table->integer('year')->default(0);
            $table->integer('client_id')->default(0);
            $table->integer('payment')->default(0);
            $table->integer('invoice')->default(0);
            $table->integer('hard_copy')->default(0);
            $table->integer('pf')->default(0);
            $table->integer('timesheet')->default(0);
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('monthly_records');
    }
}
