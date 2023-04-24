<?php

namespace Database\Seeders;

use App\Models\Shop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Shop::query()->insert([
            [
                'user_id' => 1,
                'country' => 'fr',
                'name' => 'SENS UNIQUE',
                'address' => '13 Rue du Roi de Sicile, 75004 Paris',
                'phone' => '01 71 50 30 09',
                'email' => '',
            ],
            [
                'user_id' => 1,
                'country' => 'hu',
                'name' => 'NICHE GALLERY',
                'address' => 'Szentmihályi út 171. Fsz. G32. 1152 Budapest',
                'phone' => '+36-30-333-0171',
                'email' => '',
            ],
            [
                'user_id' => 1,
                'country' => 'jm',
                'name' => 'Nagymező u. 47. 1065 Budapest',
                'address' => '',
                'phone' => '+36 30 533 6789',
                'email' => '',
            ],
            [
                'user_id' => 1,
                'country' => 'es',
                'name' => 'Ecuación Natural',
                'address' => '',
                'phone' => '(+34) 692 01 96 94,(+34) 692 35 14 89',
                'email' => 'info@ecuacionnatural.com',
            ],
            [
                'user_id' => 1,
                'country' => 'ru',
                'name' => 'AROMATEKA',
                'address' => 'Moscow / New square, 8, building 2',
                'phone' => '(+34) 692 01 96 94,(+34) 692 35 14 89',
                'email' => 'info@ecuacionnatural.com',
            ],
            [
                'user_id' => 1,
                'country' => 'ru',
                'name' => 'ART TEMA',
                'address' => 'Ecuación Natural',
                'phone' => '(+34) 692 01 96 94,(+34) 692 35 14 89',
                'email' => 'info@ecuacionnatural.com',
            ],
        ]);
    }
}
