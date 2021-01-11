<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 21,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 22,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 23,
                'title' => 'user_registration_request_access',
            ],
            [
                'id'    => 24,
                'title' => 'setting_access',
            ],
            [
                'id'    => 25,
                'title' => 'region_create',
            ],
            [
                'id'    => 26,
                'title' => 'region_edit',
            ],
            [
                'id'    => 27,
                'title' => 'region_show',
            ],
            [
                'id'    => 28,
                'title' => 'region_delete',
            ],
            [
                'id'    => 29,
                'title' => 'region_access',
            ],
            [
                'id'    => 30,
                'title' => 'designation_create',
            ],
            [
                'id'    => 31,
                'title' => 'designation_edit',
            ],
            [
                'id'    => 32,
                'title' => 'designation_show',
            ],
            [
                'id'    => 33,
                'title' => 'designation_delete',
            ],
            [
                'id'    => 34,
                'title' => 'designation_access',
            ],
            [
                'id'    => 35,
                'title' => 'office_create',
            ],
            [
                'id'    => 36,
                'title' => 'office_edit',
            ],
            [
                'id'    => 37,
                'title' => 'office_show',
            ],
            [
                'id'    => 38,
                'title' => 'office_delete',
            ],
            [
                'id'    => 39,
                'title' => 'office_access',
            ],
            [
                'id'    => 40,
                'title' => 'agw_management_access',
            ],
            [
                'id'    => 41,
                'title' => 'oso_agw_create',
            ],
            [
                'id'    => 42,
                'title' => 'oso_agw_edit',
            ],
            [
                'id'    => 43,
                'title' => 'oso_agw_show',
            ],
            [
                'id'    => 44,
                'title' => 'oso_agw_delete',
            ],
            [
                'id'    => 45,
                'title' => 'oso_agw_access',
            ],
            [
                'id'    => 46,
                'title' => 'tndp_ims_agw_create',
            ],
            [
                'id'    => 47,
                'title' => 'tndp_ims_agw_edit',
            ],
            [
                'id'    => 48,
                'title' => 'tndp_ims_agw_show',
            ],
            [
                'id'    => 49,
                'title' => 'tndp_ims_agw_delete',
            ],
            [
                'id'    => 50,
                'title' => 'tndp_ims_agw_access',
            ],
            [
                'id'    => 51,
                'title' => 'number_management_access',
            ],
            [
                'id'    => 52,
                'title' => 'oso_number_create',
            ],
            [
                'id'    => 53,
                'title' => 'oso_number_edit',
            ],
            [
                'id'    => 54,
                'title' => 'oso_number_show',
            ],
            [
                'id'    => 55,
                'title' => 'oso_number_delete',
            ],
            [
                'id'    => 56,
                'title' => 'oso_number_access',
            ],
            [
                'id'    => 57,
                'title' => 'oso_number_profile_create',
            ],
            [
                'id'    => 58,
                'title' => 'oso_number_profile_edit',
            ],
            [
                'id'    => 59,
                'title' => 'oso_number_profile_show',
            ],
            [
                'id'    => 60,
                'title' => 'oso_number_profile_delete',
            ],
            [
                'id'    => 61,
                'title' => 'oso_number_profile_access',
            ],
            [
                'id'    => 62,
                'title' => 'tndp_ims_number_create',
            ],
            [
                'id'    => 63,
                'title' => 'tndp_ims_number_edit',
            ],
            [
                'id'    => 64,
                'title' => 'tndp_ims_number_show',
            ],
            [
                'id'    => 65,
                'title' => 'tndp_ims_number_delete',
            ],
            [
                'id'    => 66,
                'title' => 'tndp_ims_number_access',
            ],
            [
                'id'    => 67,
                'title' => 'tndp_ims_number_profile_create',
            ],
            [
                'id'    => 68,
                'title' => 'tndp_ims_number_profile_edit',
            ],
            [
                'id'    => 69,
                'title' => 'tndp_ims_number_profile_show',
            ],
            [
                'id'    => 70,
                'title' => 'tndp_ims_number_profile_delete',
            ],
            [
                'id'    => 71,
                'title' => 'tndp_ims_number_profile_access',
            ],
            [
                'id'    => 72,
                'title' => 'employee_create',
            ],
            [
                'id'    => 73,
                'title' => 'employee_edit',
            ],
            [
                'id'    => 74,
                'title' => 'employee_show',
            ],
            [
                'id'    => 75,
                'title' => 'employee_delete',
            ],
            [
                'id'    => 76,
                'title' => 'employee_access',
            ],
            [
                'id'    => 77,
                'title' => 'job_request_management_access',
            ],
            [
                'id'    => 78,
                'title' => 'request_type_create',
            ],
            [
                'id'    => 79,
                'title' => 'request_type_edit',
            ],
            [
                'id'    => 80,
                'title' => 'request_type_show',
            ],
            [
                'id'    => 81,
                'title' => 'request_type_delete',
            ],
            [
                'id'    => 82,
                'title' => 'request_type_access',
            ],
            [
                'id'    => 83,
                'title' => 'job_request_status_create',
            ],
            [
                'id'    => 84,
                'title' => 'job_request_status_edit',
            ],
            [
                'id'    => 85,
                'title' => 'job_request_status_show',
            ],
            [
                'id'    => 86,
                'title' => 'job_request_status_delete',
            ],
            [
                'id'    => 87,
                'title' => 'job_request_status_access',
            ],
            [
                'id'    => 88,
                'title' => 'network_type_create',
            ],
            [
                'id'    => 89,
                'title' => 'network_type_edit',
            ],
            [
                'id'    => 90,
                'title' => 'network_type_show',
            ],
            [
                'id'    => 91,
                'title' => 'network_type_delete',
            ],
            [
                'id'    => 92,
                'title' => 'network_type_access',
            ],
            [
                'id'    => 93,
                'title' => 'job_type_create',
            ],
            [
                'id'    => 94,
                'title' => 'job_type_edit',
            ],
            [
                'id'    => 95,
                'title' => 'job_type_show',
            ],
            [
                'id'    => 96,
                'title' => 'job_type_delete',
            ],
            [
                'id'    => 97,
                'title' => 'job_type_access',
            ],
            [
                'id'    => 98,
                'title' => 'job_request_create',
            ],
            [
                'id'    => 99,
                'title' => 'job_request_edit',
            ],
            [
                'id'    => 100,
                'title' => 'job_request_show',
            ],
            [
                'id'    => 101,
                'title' => 'job_request_delete',
            ],
            [
                'id'    => 102,
                'title' => 'job_request_access',
            ],
            [
                'id'    => 103,
                'title' => 'oso_network_access',
            ],
            [
                'id'    => 104,
                'title' => 'tndp_ims_newtork_access',
            ],
            [
                'id'    => 105,
                'title' => 'script_access',
            ],
            [
                'id'    => 106,
                'title' => 'history_access',
            ],
            [
                'id'    => 107,
                'title' => 'core_job_request_access',
            ],
            [
                'id'    => 108,
                'title' => 'core_job_access',
            ],
            [
                'id'    => 109,
                'title' => 'ont_job_access',
            ],
            [
                'id'    => 110,
                'title' => 'oso_report_access',
            ],
            [
                'id'    => 111,
                'title' => 'ims_report_access',
            ],
            [
                'id'    => 112,
                'title' => 'core_job_oso_access',
            ],
            [
                'id'    => 113,
                'title' => 'olt_oso_access',
            ],
            [
                'id'    => 114,
                'title' => 'core_job_im_access',
            ],
            [
                'id'    => 115,
                'title' => 'ont_job_im_access',
            ],
            [
                'id'    => 116,
                'title' => 'job_request_authentication_access',
            ],
            [
                'id'    => 117,
                'title' => 'my_job_request_access',
            ],
            [
                'id'    => 118,
                'title' => 'olt_create',
            ],
            [
                'id'    => 119,
                'title' => 'olt_edit',
            ],
            [
                'id'    => 120,
                'title' => 'olt_show',
            ],
            [
                'id'    => 121,
                'title' => 'olt_delete',
            ],
            [
                'id'    => 122,
                'title' => 'olt_access',
            ],
            [
                'id'    => 123,
                'title' => 'tndp_ims_olt_profile_create',
            ],
            [
                'id'    => 124,
                'title' => 'tndp_ims_olt_profile_edit',
            ],
            [
                'id'    => 125,
                'title' => 'tndp_ims_olt_profile_show',
            ],
            [
                'id'    => 126,
                'title' => 'tndp_ims_olt_profile_delete',
            ],
            [
                'id'    => 127,
                'title' => 'tndp_ims_olt_profile_access',
            ],
            [
                'id'    => 128,
                'title' => 'oso_olt_job_access',
            ],
            [
                'id'    => 129,
                'title' => 'olt_job_request_create',
            ],
            [
                'id'    => 130,
                'title' => 'olt_job_request_edit',
            ],
            [
                'id'    => 131,
                'title' => 'olt_job_request_show',
            ],
            [
                'id'    => 132,
                'title' => 'olt_job_request_delete',
            ],
            [
                'id'    => 133,
                'title' => 'olt_job_request_access',
            ],
            [
                'id'    => 134,
                'title' => 'call_source_code_create',
            ],
            [
                'id'    => 135,
                'title' => 'call_source_code_edit',
            ],
            [
                'id'    => 136,
                'title' => 'call_source_code_show',
            ],
            [
                'id'    => 137,
                'title' => 'call_source_code_delete',
            ],
            [
                'id'    => 138,
                'title' => 'call_source_code_access',
            ],
            [
                'id'    => 139,
                'title' => 'profile_password_edit',
            ],
            [
                'id'    => 140,
                'title' => 'job_request_authentication_reject',
            ],
            [
                'id'    => 141,
                'title' => 'job_request_authentication_authenticate',
            ],
            [
                'id'    => 142,
                'title' => 'job_request_authentication_approve',
            ],
        ];

        Permission::insert($permissions);
    }
}
