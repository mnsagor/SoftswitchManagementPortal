<?php

namespace Database\Seeders;

use App\Models\RequestType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,

            NetworkTypeSeeder::class,
            JobTypeSeeder::class,
            JobRequestTypeSeeder::class,
            JobRequestStatusSeeder::class,
            DesignationSeeder::class,
            RegionOfficeSeeder::class,
            ZoneOfficeSeeder::class,
            OsoAgwSeeder::class,
        ]);
    }
}
