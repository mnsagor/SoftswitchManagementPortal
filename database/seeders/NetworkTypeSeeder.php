<?php

namespace Database\Seeders;

use App\Models\NetworkType;
use Illuminate\Database\Seeder;

class NetworkTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $networkType = [
            [
                'id'    => 1,
                'name' => '171KL Network',
                'is_active' => 1,
            ],
            [
                'id'    => 2,
                'name' => 'TNDP IMS Network',
                'is_active' => 1,
            ],
            [
                'id'    => 3,
                'name' => 'MOTN Network',
                'is_active' => 1,
            ],

        ];

        NetworkType::insert($networkType);
    }
}
