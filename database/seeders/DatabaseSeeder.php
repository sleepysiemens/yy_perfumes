<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\DeliveryMethod;
use App\Models\OrderStatus;
use App\Models\Person;
use App\Models\Product;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Category::factory()
            ->count(10)
            ->create();

        $this->call([
            UserSeeder::class,
            CurrencySeeder::class,
        ]);

        DeliveryMethod::create([
            'title' => 'Shipping'
        ]);

        OrderStatus::create([
            'title' => 'Created',
            'primary' => true,
        ]);

        Person::create([
            'name' => 'Ravenna'
        ]);

        Product::factory()
            ->count(4)
            ->create();
    }
}
