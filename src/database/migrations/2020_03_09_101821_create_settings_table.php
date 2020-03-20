<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('address')->nullable();
            $table->text('logo')->nullable();
            $table->string('contact',200)->nullable();
            $table->string('accountant_email',200)->nullable();
            $table->string('cc_email',200)->nullable();
            $table->string('salesperson',200)->nullable();
            $table->string('from_email',200)->nullable();
            $table->string('tech_head_email',200)->nullable();
            $table->string('geofence_email',200)->nullable();
            $table->text('reminder_email')->nullable();
            $table->string('reminder_days',200)->nullable();
            $table->text('reminder_email2')->nullable();
            $table->integer('reminder_months')->default(0);
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
        Schema::dropIfExists('settings');
    }
}
