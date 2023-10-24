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
        Schema::table('dealer_orders', function (Blueprint $table) {
            $table->foreignId('order_status_id')->default(1)->nullable();
            $table->boolean('payed')->default(false);
            $table->string('payment_link')->nullable();
            $table->string('ykassa_id')->nullable();
            $table->string('ykassa_log')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dealer_orders', function (Blueprint $table) {
            //
        });
    }
};
