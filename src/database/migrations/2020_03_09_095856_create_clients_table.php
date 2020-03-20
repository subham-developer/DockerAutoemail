<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('client_name',200)->nullable();
            $table->string('reporting_name',200)->nullable();
            $table->string('reporting_contact',200)->nullable();
            $table->string('reporting_email',200)->nullable();
            $table->string('account_name',200)->nullable();
            $table->string('account_email',200)->nullable();
            $table->string('hr_name',200)->nullable();
            $table->string('hr_contact',200)->nullable();
            $table->string('hr_email',200)->nullable();
            $table->string('Interviewer_name',200)->nullable();
            $table->string('Interviewer_contact',200)->nullable();
            $table->string('Interviewer_email',200)->nullable();
            $table->string('url',200)->nullable();
            $table->text('address')->nullable();
            $table->text('address_map_link')->nullable();
            $table->string('need_timesheet',200)->nullable();
            $table->string('need_machine',200)->nullable();
            $table->string('aggrement_sign',200)->nullable();
            $table->string('weekend_working',200)->nullable();
            $table->string('first_invoice',200)->nullable();
            $table->string('is_invoice_need',200)->nullable();
            $table->string('invoice_date',200)->nullable();
            $table->string('credit_period',200)->nullable();
            $table->string('gst',200)->nullable();
            $table->string('pan',200)->nullable();
            $table->text('billing_address')->nullable();
            $table->text('operational_address')->nullable();
            $table->text('holidays')->nullable();
            $table->string('pf_proof',200)->nullable();
            $table->string('tan',200)->nullable();
            $table->integer('deleted')->default(0);
            $table->integer('invoice_client')->default(1);
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
        Schema::dropIfExists('clients');
    }
}
