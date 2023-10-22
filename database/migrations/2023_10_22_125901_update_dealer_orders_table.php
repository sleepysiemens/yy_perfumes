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
            $table->foreignId('user_id');
            $table->foreignId('shop_id');
            $table->longText('cart');
            $table->float('total')->default(0);
            $table->float('profit')->default(0);
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dealer_orders', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('shop_id');
            $table->dropColumn('cart');
            $table->dropColumn('phone');
            $table->dropColumn('email');
        });
    }
};
