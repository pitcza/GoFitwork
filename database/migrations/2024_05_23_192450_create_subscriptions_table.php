<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();

            // $table->unsignedBigInteger('enquiry_id');
            // $table->foreign('enquiry_id')->references('id')->on('enquiries');

            // shift data from enquires database table
            $table->string('firstname', 155);
            $table->string('lastname', 155);
            $table->string('email', 155);
            $table->string('barangay', 255);
            $table->string('gender', 55);
            $table->string('occupation', 255);
            $table->string('reason', 512);

            // // subscription data
            // $table->decimal('subscription_fee', 10, 2);
            // //$table->date('payment_date');
            // //$table->string('payment_status');
            // $table->date('start_date');
            // $table->date('end_date');
            $table->timestamps(); // date for payment date and member-since-date?
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
