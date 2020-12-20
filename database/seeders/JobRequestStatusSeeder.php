<?php

namespace Database\Seeders;

use App\Models\JobRequestStatus;
use App\Models\RequestType;
use Illuminate\Database\Seeder;

class JobRequestStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobReqeustStatus = [
            [
                'id'    => 1,
                'name' => 'Pending',
                'is_active' => 1,
            ],
            [
                'id'    => 2,
                'name' => 'Authenticated',
                'is_active' => 1,
            ],
            [
                'id'    => 3,
                'name' => 'Approved',
                'is_active' => 1,
            ],
            [
                'id'    => 4,
                'name' => 'Rejected',
                'is_active' => 1,
            ],

        ];

        JobRequestStatus::insert($jobReqeustStatus);
    }
}
