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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('email');
            $table->string('from_currency')->nullable();
            $table->string('entered_amount')->nullable();
            $table->string('to_currency')->nullable();
            $table->string('amount');
            $table->string('gateway_id')->nullable();
            $table->text('gateway_url')->nullable();

            $table->enum('transaction_type', ['purchase', 'withdraw']);

            // $table->string('user');
            $table->string('status'); // Initiated, approved , requested, rejected, 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
