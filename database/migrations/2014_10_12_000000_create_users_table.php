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
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string('name');

            $table->string('unique_user_id')->unique();  //should be unique

            $table->unsignedBigInteger('ref_id')->nullable();
            $table->foreign('ref_id')->references('id')->on('users');

            $table->string('email')->unique();

            $table->timestamp('email_verified_at')->nullable();

            $table->string('password');

            $table->string('referral_commission_hash')->nullable();

            $table->string('last_login_at')->nullable();

            $table->string('status');

            $table->string('balance')->nullable();

            $table->string('currency')->default('USD');

            $table->string('active_mining_power');

            $table->string('active_mining_power_unit');

            $table->text('bitcoin_address')->nullable();

            $table->string('active_currency')->default('USD');

            $table->rememberToken();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
