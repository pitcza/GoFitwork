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
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('firstname', 155);
            $table->string('lastname', 155);
            //$table->integer('phone_number')->nullable();
            $table->string('email')->unique();
            $table->string('barangay', 255);
            $table->string('gender', 55)->nullable();
            $table->string('occupation', 255);
            $table->date('start_by');
            //$table->date('due_date');
            $table->string('reason', 512)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enquiries');
    }
};
