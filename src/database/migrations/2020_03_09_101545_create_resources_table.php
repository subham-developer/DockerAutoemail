<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fname',200)->nullable();
            $table->string('lname',200)->nullable();
            $table->string('phone',200)->nullable();
            $table->date('exp_date')->nullable();
            $table->text('resident_address')->nullable();
            $table->string('email',200)->nullable();
            $table->string('refer_no',200)->nullable();
            $table->string('language',200)->nullable();
            $table->string('otherlanguage',200)->nullable();
            $table->string('resume',200)->nullable();
            $table->string('resume_type',200)->nullable();
            $table->integer('deleted')->default(0);
            $table->integer('on_bench')->default(1);
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
        Schema::dropIfExists('resources');
    }
}
