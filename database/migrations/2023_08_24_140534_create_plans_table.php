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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('miner_id');
            $table->foreign('miner_id')->references('id')->on('miners');
            $table->string('price');
            $table->string('return_amount_type');
            $table->string('return_amount_per_day'); //currency
            $table->string('speed'); // spped value like 1200 
            $table->string('speed_unit'); // th/s or hash/s
            $table->string('period'); //1 2 4 month
            $table->string('period_time'); //day or  month or year
            $table->string('maintenance_cost');
            $table->string('features');
            $table->string('description');
            $table->enum('status', [0, 1]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
