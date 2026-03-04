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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('ilustrator_id');
            $table->unsignedBigInteger('service_id');
            $table->decimal('total_price', 10, 2);
            $table->string('status');
            $table->string('image');
            $table->dateTime('payment_date');
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('ilustrator_id')->references('id')->on('ilustrators');
            $table->foreign('service_id')->references('id')->on('services');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_orders');
    }
};
