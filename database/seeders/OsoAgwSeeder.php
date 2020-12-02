<?php

namespace Database\Seeders;

use App\Models\OsoAgw;
use Illuminate\Database\Seeder;

class OsoAgwSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $agw = [

            [
                'id'    => 1,
                'ip'    => '10.1.6.2',
                'name' => 'SBNCOAGW_01',
                'is_active' => 1,
                'office_id' => 1,

            ],
            [
                'id'    => 2,
                'ip'    => '10.1.6.12',
                'name' => 'IBA_SINA_AGW01',
                'is_active' => 1,
                'office_id' => 1,

            ],
            [
                'id'    => 3,
                'ip'    => '10.1.6.22',
                'name' => 'EDU_BOARD_AGW01',
                'is_active' => 1,
                'office_id' => 1,

            ],
            [
                'id'    => 4,
                'ip'    => '10.1.6.37',
                'name' => 'UGC_AGW01',
                'is_active' => 1,
                'office_id' => 1,

            ],
        ];

        OsoAgw::insert($agw);
    }
}
