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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('slug')->unique();

            $table->foreignId('category_id');
            $table->foreignId('people_id')->nullable();

            $table->string('title');
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();

            $table->float('cost')->comment('Цена клиентов');
            $table->float('cost_dealer')->comment('Цена дилеров');
            $table->float('cost_vip_dealer')->comment('Цена премиальных дилеров');

            $table->text('seo_title')->nullable();
            $table->text('seo_description')->nullable();

            $table->boolean('active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
