<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;

class RegionOfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $region = [
            [
                'id'    => 1,
                'name' => 'Dhaka Telecommunication Region (West)',
                'is_active' => 1,
            ],
            [
                'id'    => 2,
                'name' => 'Dhaka Telecommunication Region (North)',
                'is_active' => 1,
            ],
            [
                'id'    => 3,
                'name' => 'Dhaka Telecommunication Region (East)',
                'is_active' => 1,
            ],
            [
                'id'    => 4,
                'name' => 'Dhaka Telecommunication Region (South)',
                'is_active' => 1,
            ],
            [
                'id'    => 5,
                'name' => 'Southern Telecommunication Region',
                'is_active' => 1,
            ],
            [
                'id'    => 6,
                'name' => 'Chittagong Telecommunication Region',
                'is_active' => 1,
            ],
            [
                'id'    => 7,
                'name' => 'Northern Telecommunication Region',
                'is_active' => 1,
            ],
        ];

        Region::insert($region);
    }
}
