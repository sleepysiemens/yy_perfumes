<?php

namespace Database\Seeders;

use App\Models\Person;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Person::query()->insert([
            [
                'name' => 'Ravenna'
            ],
            [
                'name' => 'William'
            ],
            [
                'name' => 'Aron'
            ],
            [
                'name' => 'Gideon'
            ],
        ]);
    }
}
