<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class Card2PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'Lite' => [
                'month' => 11,
                'year' => 132,
            ],
            'Pro' => [
                'month' => 19,
                'year' => 228,
            ],
            'Ultimate' => [
                'month' => 35,
                'year' => 420,
            ],
        ];

        $cards = DB::table('cards')->get(['id', 'type']);
        $cardsArray = [];
        foreach ($cards as $row) {
            $cardsArray[$row->type] = $row->id;
        }

        $prices = DB::table('prices')->get(['id', 'name']);
        $pricesArray = [];
        foreach ($prices as $row) {
            $pricesArray[$row->name] = $row->id;
        }

        foreach ($data as $cardName => $value) {
            foreach ($value as $priceName => $price) {
                if (isset($cardsArray[$cardName]) && isset($pricesArray[$priceName])) {
                    DB::table('card2price')->insert([
                        'card_id' => $cardsArray[$cardName],
                        'price_id' => $pricesArray[$priceName],
                        'price' => $price
                    ]);
                }
            }
        }
    }

//    protected function update
}
