<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TotalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CardSeeder::class,
            PriceSeeder::class,
            Card2PriceSeeder::class,
            IncSeeder::class,
            Card2IncludesSeeder::class,
        ]);
    }
}
