<?php

namespace Database\Seeders;

use App\Models\Designation;
use Illuminate\Database\Seeder;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        '0' => 'Managing Director',
//        '1' => 'Deputy Managing Director',
//        '2' => 'Chief General Manager',
//        '3' => 'General Manager',
//        '4' => 'Deputy General Manager',
//        '5' => 'Manager',
//        '6' => 'Assistant Manager',
//        '7' => 'Junior Assistant Manager',
        $designation = [
            [
                'id'    => 1,
                'name' => 'Managing Director',
                'grade' => '1',
                'is_active' => 1,
            ],
            [
                'id'    => 2,
                'name' => 'Deputy Managing Director',
                'grade' => '2',
                'is_active' => 1,
            ],
            [
                'id'    => 3,
                'name' => 'Chief General Manager',
                'grade' => '3',
                'is_active' => 1,
            ],
            [
                'id'    => 4,
                'name' => 'General Manager',
                'grade' => '4',
                'is_active' => 1,
            ],
            [
                'id'    => 5,
                'name' => 'Deputy General Manager',
                'grade' => '5',
                'is_active' => 1,
            ],
            [
                'id'    => 6,
                'name' => 'Manager',
                'grade' => '6',
                'is_active' => 1,
            ],
            [
                'id'    => 7,
                'name' => 'Assistant Manager',
                'grade' => '7',
                'is_active' => 1,
            ],
            [
                'id'    => 8,
                'name' => 'Junior Assistant Manager',
                'grade' => '8',
                'is_active' => 1,
            ],
        ];
        Designation::insert($designation);
    }
}
