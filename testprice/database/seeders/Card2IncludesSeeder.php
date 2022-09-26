<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Card2IncludesSeeder extends Seeder
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
                ['name' => 'CMS Integration', 'show' => true],
                ['name' => 'Email & SMS Reminder', 'show' => true],
                ['name' => 'Custom Support 24/7', 'show' => true],
            ],
            'Pro' => [
                ['name' => 'CMS Integration', 'show' => false],
                ['name' => 'Email & SMS Reminder', 'show' => false],
                ['name' => 'Custom Support 24/7', 'show' => false],
                ['name' => 'Advanced analytics', 'show' => true],
                ['name' => '100+ integration', 'show' => true],
                ['name' => 'Chat widget', 'show' => true],
                ['name' => 'Templates library', 'show' => true],
            ],
            'Ultimate' => [
                ['name' => 'CMS Integration', 'show' => false],
                ['name' => 'Email & SMS Reminder', 'show' => false],
                ['name' => 'Custom Support 24/7', 'show' => false],
                ['name' => 'Advanced analytics', 'show' => false],
                ['name' => '100+ integration', 'show' => false],
                ['name' => 'Chat widget', 'show' => false],
                ['name' => 'Templates library', 'show' => false],
                ['name' => 'Daily performance report', 'show' => true],
                ['name' => 'Dedicated assistant', 'show' => true],
                ['name' => 'Artificial Intelligence', 'show' => true],
                ['name' => 'Marketing tools and automations', 'show' => true],
            ],
        ];

        $cards = DB::table('cards')->get(['id', 'type']);
        $cardsArray = [];
        foreach ($cards as $row) {
            $cardsArray[$row->type] = $row->id;
        }

        $incs = DB::table('incs')->get(['id', 'name']);
        $incsArray = [];
        foreach ($incs as $row) {
            $incsArray[$row->name] = $row->id;
        }

        foreach ($data as $cardName => $values) {
            foreach ($values as $tableIncludesRow) {
                DB::table('card2includes')->insert([
                    'card_id' => $cardsArray[$cardName],
                    'includes_id' => $incsArray[$tableIncludesRow['name']],
                    'show' => $tableIncludesRow['show'],
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            }
        }
    }
}
