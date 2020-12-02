<?php

namespace Database\Seeders;

use App\Models\Office;
use Illuminate\Database\Seeder;

class ZoneOfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $zone = [
            [
                'id'    => 1,
                'name' => 'SBN',
                'is_active' => 1,
                'address' => 'Sher-e-bangla Nogor',
                'region_id' => 1,

            ],
            [
                'id'    => 2,
                'name' => 'Mirpur',
                'is_active' => 1,
                'address' => 'Sher-e-bangla Nogor',
                'region_id' => 1,

            ],
            [
                'id'    => 3,
                'name' => 'Saver',
                'is_active' => 1,
                'address' => 'Sher-e-bangla Nogor',
                'region_id' => 1,

            ],
            [
                'id'    => 4,
                'name' => 'Gulshan',
                'is_active' => 1,
                'address' => 'Sher-e-bangla Nogor',
                'region_id' => 2,

            ],
            [
                'id'    => 5,
                'name' => 'Uttara',
                'is_active' => 1,
                'address' => 'Sher-e-bangla Nogor',
                'region_id' => 2,

            ],
            [
                'id'    => 6,
                'name' => 'Gazipur',
                'is_active' => 1,
                'address' => 'Sher-e-bangla Nogor',
                'region_id' => 2,

            ],
            [
                'id'    => 7,
                'name' => 'Mogbazar',
                'is_active' => 1,
                'address' => 'Sher-e-bangla Nogor',
                'region_id' => 3,

            ],
            [
                'id'    => 8,
                'name' => 'Khilgaon',
                'is_active' => 1,
                'address' => 'Sher-e-bangla Nogor',
                'region_id' => 3,

            ],
            [
                'id'    => 9,
                'name' => 'Goran',
                'is_active' => 1,
                'address' => 'Sher-e-bangla Nogor',
                'region_id' => 3,

            ],
            [
                'id'    => 10,
                'name' => 'Munshiganj',
                'is_active' => 1,
                'address' => 'Sher-e-bangla Nogor',
                'region_id' => 3,

            ],
            [
                'id'    => 11,
                'name' => 'Narayanganj',
                'is_active' => 1,
                'address' => 'Sher-e-bangla Nogor',
                'region_id' => 3,

            ],
            [
                'id'    => 12,
                'name' => 'Ramna',
                'is_active' => 1,
                'address' => 'Sher-e-bangla Nogor',
                'region_id' => 4,

            ],
            [
                'id'    => 13,
                'name' => 'Nilkhet',
                'is_active' => 1,
                'address' => 'Sher-e-bangla Nogor',
                'region_id' => 4,

            ],[
                'id'    => 14,
                'name' => 'Chakbazar',
                'is_active' => 1,
                'address' => 'Sher-e-bangla Nogor',
                'region_id' => 4,

            ],
            [
                'id'    => 15,
                'name' => 'Gandaria',
                'is_active' => 1,
                'address' => 'Sher-e-bangla Nogor',
                'region_id' => 4,

            ],
            [
                'id'    => 16,
                'name' => 'Khulna',
                'is_active' => 1,
                'address' => 'Sher-e-bangla Nogor',
                'region_id' => 5,

            ],
            [
                'id'    => 17,
                'name' => 'Barishal',
                'is_active' => 1,
                'address' => 'Sher-e-bangla Nogor',
                'region_id' => 5,

            ],
            [
                'id'    => 18,
                'name' => 'Faridpur',
                'is_active' => 1,
                'address' => 'Sher-e-bangla Nogor',
                'region_id' => 5,

            ],
            [
                'id'    => 19,
                'name' => 'Jessor',
                'is_active' => 1,
                'address' => 'Sher-e-bangla Nogor',
                'region_id' => 5,

            ],
            [
                'id'    => 20,
                'name' => 'Cox\'s Bazar',
                'is_active' => 1,
                'address' => 'Sher-e-bangla Nogor',
                'region_id' => 6,

            ],
            [
                'id'    => 21,
                'name' => 'Chittagong',
                'is_active' => 1,
                'address' => 'Sher-e-bangla Nogor',
                'region_id' => 6,

            ],
            [
                'id'    => 22,
                'name' => 'Sylhet',
                'is_active' => 1,
                'address' => 'Sher-e-bangla Nogor',
                'region_id' => 6,

            ],
            [
                'id'    => 23,
                'name' => 'Moulovibazar',
                'is_active' => 1,
                'address' => 'Sher-e-bangla Nogor',
                'region_id' => 6,

            ],
            [
                'id'    => 24,
                'name' => 'Laxmipur',
                'is_active' => 1,
                'address' => 'Sher-e-bangla Nogor',
                'region_id' => 6,

            ],
            [
                'id'    => 25,
                'name' => 'Rajshahi',
                'is_active' => 1,
                'address' => 'Sher-e-bangla Nogor',
                'region_id' => 7,

            ],
            [
                'id'    => 26,
                'name' => 'Pabna',
                'is_active' => 1,
                'address' => 'Sher-e-bangla Nogor',
                'region_id' => 7,

            ],
            [
                'id'    => 27,
                'name' => 'Sirajgang',
                'is_active' => 1,
                'address' => 'Sher-e-bangla Nogor',
                'region_id' => 7,

            ],
        ];

        Office::insert($zone);
    }
}
