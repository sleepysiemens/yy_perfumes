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

            $table->foreignId('order_status_id')->constrained('order_statuses');
            $table->foreignId('delivery_method_id')->constrained('delivery_methods');

            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->text('basket');
            $table->float('total');

            $table->string('country');
            $table->text('address');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
