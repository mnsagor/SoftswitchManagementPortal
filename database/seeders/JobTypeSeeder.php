<?php

namespace Database\Seeders;

use App\Models\JobType;
use Illuminate\Database\Seeder;

class JobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobType = [
            [
                'id'    => 1,
                'name' => 'Core Job',
                'is_active' => 1,
            ],
            [
                'id'    => 2,
                'name' => 'OLT Job',
                'is_active' => 1,
            ],
        ];

        JobType::insert($jobType);
    }
}
