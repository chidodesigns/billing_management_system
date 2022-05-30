<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientPaymentProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_payment_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->string('recurrence_type');
            $table->date('recurrence_date');
            $table->string('invoiced');
            $table->string('direct_debit');
            $table->string('payment_terms');
            $table->foreignId('client_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('client_payment_profiles');
    }
}
