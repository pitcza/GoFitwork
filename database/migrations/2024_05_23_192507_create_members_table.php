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
        Schema::create('members', function (Blueprint $table) {
            $table->id();

            // members info
            $table->string('firstname', 155);
            $table->string('lastname', 155);
            $table->string('email', 155);
            $table->string('barangay', 255);
            $table->string('gender', 55);
            $table->string('occupation', 255);
            $table->string('reason', 512);

            // subscription info
            $table->decimal('subscription_fee', 10, 2)->nullable();
            // $table->enum('payment_status', ['Pending', 'Paid'])->default('Pending');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();

            $table->foreignId('subscription_id')->constrained()->onDelete('cascade');
            $table->enum('status', ['Ongoing', 'Ending', 'Ended'])->default('Ongoing');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('subscriptions', function (Blueprint $table) {
            //$table->foreignId('member_id')->constrained('members')->onDelete('cascade');
            $table->foreignId('member_id')->nullable()->constrained()->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
