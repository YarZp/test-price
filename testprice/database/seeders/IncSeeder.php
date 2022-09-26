<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class IncSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'CMS Integration', 'beta' => false],
            ['name' => 'Email & SMS Reminder', 'beta' => false],
            ['name' => 'Custom Support 24/7', 'beta' => false],
            ['name' => 'Advanced analytics', 'beta' => false],
            ['name' => '100+ integration', 'beta' => false],
            ['name' => 'Chat widget', 'beta' => false],
            ['name' => 'Templates library', 'beta' => false],
            ['name' => 'Daily performance report', 'beta' => false],
            ['name' => 'Dedicated assistant', 'beta' => false],
            ['name' => 'Artificial Intelligence', 'beta' => true],
            ['name' => 'Marketing tools and automations', 'beta' => false],
        ];

        foreach ($data as $incRow) {
            DB::table('incs')->insert([
                'name' => $incRow['name'],
                'beta' => $incRow['beta'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
