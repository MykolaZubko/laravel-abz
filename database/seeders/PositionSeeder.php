<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->addItems();

    }
    protected function addItems()
    {
        $items = [
            [
                'positions' => 'Security',
            ],
            [
                'positions' => 'Designer',
            ],
            [
                'positions' => 'Content manager',
            ],
            [
                'positions' => 'Lawyer',
            ],
        ];

        foreach ($items as $item) {
            DB::table('positions')->insert($item);
        }
    }
}
