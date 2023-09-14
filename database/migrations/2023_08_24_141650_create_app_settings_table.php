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
        Schema::create('app_settings', function (Blueprint $table) {
            $table->id();
            $table->string('min_purchase_price');
            $table->string('min_purchase_price_currency');

            $table->string('max_purchase_price');
            $table->string('max_purchase_price_currency');

            $table->string('new_user_mining_power');
            $table->string('new_user_mining_power_unit');

            $table->string('application_name');
            $table->string('website_name');
            $table->string('website_title');
            $table->string('website_icon')->nullable();
            $table->string('website_logo')->nullable();
            $table->text('website_short_description')->nullable();
            $table->text('website_address')->nullable();
            $table->string('website_phone')->nullable();
            $table->string('website_phone2')->nullable();
            $table->string('website_email')->nullable();
            $table->string('website_facebook_link')->nullable();
            $table->string('website_twitter_link')->nullable();
            $table->string('website_youtube_link')->nullable();
            $table->string('website_linkedin_link')->nullable();













            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_settings');
    }
};
