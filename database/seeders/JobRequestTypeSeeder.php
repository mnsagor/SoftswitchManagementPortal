<?php

namespace Database\Seeders;

use App\Models\RequestType;
use Illuminate\Database\Seeder;

class JobRequestTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobRequestType = [
            [
                'id'    => 1,
                'name' => 'New Connection',
                'is_active' => 1,
            ],
            [
                'id'    => 2,
                'name' => 'Re-Connection',
                'is_active' => 1,
            ],
            [
                'id'    => 3,
                'name' => 'Casual Connection',
                'is_active' => 1,
            ],
            [
                'id'    => 4,
                'name' => 'Casual Disconnection',
                'is_active' => 1,
            ],
            [
                'id'    => 5,
                'name' => 'Restoration',
                'is_active' => 1,
            ],
            [
                'id'    => 6,
                'name' => 'Temporary Disconnection',
                'is_active' => 1,
            ],
            [
                'id'    => 7,
                'name' => 'Permament Close',
                'is_active' => 1,
            ],
            [
                'id'    => 8,
                'name' => 'ISD Facilities',
                'is_active' => 1,
            ],

            [
                'id'    => 9,
                'name' => 'NWD Facilities',
                'is_active' => 1,
            ],
            [
                'id'    => 10,
                'name' => 'Non NWD Facilities',
                'is_active' => 1,
            ],
        ];

        RequestType::insert($jobRequestType);
    }
}
