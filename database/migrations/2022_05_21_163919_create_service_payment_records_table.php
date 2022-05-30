<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicePaymentRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_payment_records', function (Blueprint $table) {
            $table->id();
            $table->string('domain');
            $table->date('registration_date');
            $table->date('renewal_date')->nullable();
            $table->string('amount');
            $table->string('notes')->nullable();
            $table->foreignId('service_id')->constrained()->onDelete('cascade');
            $table->foreignId('client_payment_profile_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('service_payment_records');
    }
}
