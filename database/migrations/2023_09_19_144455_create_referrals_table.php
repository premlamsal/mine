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
        Schema::create('referrals', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('referred_user_id');
            $table->foreign('referred_user_id')->references('id')->on('users');

            $table->unsignedBigInteger('referring_user_id');
            $table->foreign('referring_user_id')->references('id')->on('users');

            $table->string('referral_purchased_power')->nullable();
            $table->string('referral_purchased_power_unit')->nullable();

            $table->string('referral_commision_power')->nullable();
            $table->string('referral_commision_power_unit')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('referrals');
    }
};
