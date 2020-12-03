<?php

return [
    'userManagement'            => [
        'title'          => 'ইউজার ম্যানেজমেন্ট',
        'title_singular' => 'ইউজার ম্যানেজমেন্ট',
    ],
    'permission'                => [
        'title'          => 'অনুমতিসমূহ',
        'title_singular' => 'অনুমতি',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role'                      => [
        'title'          => 'ভূমিকা/রোলগুলি',
        'title_singular' => 'ভূমিকা/রোল',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user'                      => [
        'title'          => 'ব্যবহারকারীগণ',
        'title_singular' => 'ব্যবহারকারী',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'approved'                 => 'Approved',
            'approved_helper'          => ' ',
            'office'                   => 'Zonal Office',
            'office_helper'            => ' ',
            'username'                 => 'Username',
            'username_helper'          => ' ',
            'designation'              => 'Designation',
            'designation_helper'       => ' ',
            'payroll_emp'              => 'Payroll Employee Name',
            'payroll_emp_helper'       => ' ',
            'call_source_code'         => 'Call Source Code',
            'call_source_code_helper'  => ' ',
        ],
    ],
    'auditLog'                  => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Properties',
            'properties_helper'   => ' ',
            'host'                => 'Host',
            'host_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
        ],
    ],
    'userAlert'                 => [
        'title'          => 'User Alerts',
        'title_singular' => 'User Alert',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'alert_text'        => 'Alert Text',
            'alert_text_helper' => ' ',
            'alert_link'        => 'Alert Link',
            'alert_link_helper' => ' ',
            'user'              => 'Users',
            'user_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
        ],
    ],
    'userRegistrationRequest'   => [
        'title'          => 'User Registration Request',
        'title_singular' => 'User Registration Request',
    ],
    'setting'                   => [
        'title'          => 'Settings',
        'title_singular' => 'Setting',
    ],
    'region'                    => [
        'title'          => 'Regional Office',
        'title_singular' => 'Regional Office',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'is_active'         => 'Is Active',
            'is_active_helper'  => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'designation'               => [
        'title'          => 'Designation',
        'title_singular' => 'Designation',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Designation Name',
            'name_helper'       => ' ',
            'grade'             => 'Grade',
            'grade_helper'      => ' ',
            'is_active'         => 'Status',
            'is_active_helper'  => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'office'                    => [
        'title'          => 'Zonal Office',
        'title_singular' => 'Zonal Office',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'region'            => 'Region Name',
            'region_helper'     => ' ',
            'name'              => 'Division/Office Name',
            'name_helper'       => ' ',
            'is_active'         => 'Status',
            'is_active_helper'  => ' ',
            'address'           => 'Address',
            'address_helper'    => ' ',
            'area'              => 'Area',
            'area_helper'       => ' ',
            'contact'           => 'Contact',
            'contact_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'agwManagement'             => [
        'title'          => 'AGW Management',
        'title_singular' => 'AGW Management',
    ],
    'osoAgw'                    => [
        'title'          => '171KL AGW',
        'title_singular' => '171KL AGW',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'ip'                 => 'AGW IP',
            'ip_helper'          => ' ',
            'name'               => 'AGW Name',
            'name_helper'        => ' ',
            'office'             => 'Zonal Office',
            'office_helper'      => ' ',
            'is_active'          => 'Status',
            'is_active_helper'   => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'tndpImsAgw'                => [
        'title'          => 'TNDP IMS AGW',
        'title_singular' => 'TNDP IMS AGW',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'ip'                 => 'IP',
            'ip_helper'          => ' ',
            'name'               => 'Name',
            'name_helper'        => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'office'             => 'Office',
            'office_helper'      => ' ',
            'is_active'          => 'Status',
            'is_active_helper'   => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
        ],
    ],
    'numberManagement'          => [
        'title'          => 'Number Management',
        'title_singular' => 'Number Management',
    ],
    'osoNumber'                 => [
        'title'          => '171KL Numbers',
        'title_singular' => '171KL Number',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'number'            => 'Phone Number',
            'number_helper'     => ' ',
            'tid'               => 'TID',
            'tid_helper'        => ' ',
            'agw_ip'            => 'AGW IP',
            'agw_ip_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'osoNumberProfile'          => [
        'title'          => '171KL Number Profile',
        'title_singular' => '171KL Number Profile',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'number'                    => 'Phone Number',
            'number_helper'             => ' ',
            'is_active'                 => 'Active Number Status',
            'is_active_helper'          => ' ',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => ' ',
            'is_td'                     => 'TD Status',
            'is_td_helper'              => ' ',
            'is_isd'                    => 'ISD Status',
            'is_isd_helper'             => ' ',
            'is_eisd'                   => 'EISD Status',
            'is_eisd_helper'            => ' ',
            'is_pbx'                    => 'PBX Status',
            'is_pbx_helper'             => ' ',
            'pbx_poilot_number'         => 'PBX Poilot Number',
            'pbx_poilot_number_helper'  => ' ',
            'oso_agw_ip'                => '171KL AGW IP',
            'oso_agw_ip_helper'         => ' ',
            'oso_number'                => '171KL Number (Database)',
            'oso_number_helper'         => ' ',
            'request_controller'        => 'Request Controller',
            'request_controller_helper' => ' ',
            'is_queued'                 => 'Queued Status',
            'is_queued_helper'          => ' ',
        ],
    ],
    'tndpImsNumber'             => [
        'title'          => 'TNDP IMS Numbers',
        'title_singular' => 'TNDP IMS Number',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'number'            => 'Phone Number',
            'number_helper'     => ' ',
            'tid'               => 'TID',
            'tid_helper'        => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'agw_ip'            => 'AGW IP',
            'agw_ip_helper'     => ' ',
        ],
    ],
    'tndpImsNumberProfile'      => [
        'title'          => 'TNDP IMS Number Profile',
        'title_singular' => 'TNDP IMS Number Profile',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'number'                    => 'Phone Number',
            'number_helper'             => ' ',
            'is_active'                 => 'Active Number Status',
            'is_active_helper'          => ' ',
            'is_td'                     => 'TD Status',
            'is_td_helper'              => ' ',
            'is_isd'                    => 'ISD Status',
            'is_isd_helper'             => ' ',
            'is_eisd'                   => 'EISD Status',
            'is_eisd_helper'            => ' ',
            'is_pbx'                    => 'PBX Status',
            'is_pbx_helper'             => ' ',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => ' ',
            'pbx_poilot_number'         => 'PBX Poilot Number',
            'pbx_poilot_number_helper'  => ' ',
            'tndp_agw_ip'               => 'TNDP IMS AGW IP',
            'tndp_agw_ip_helper'        => ' ',
            'tndp_ims_number'           => 'IMS Number (Database)',
            'tndp_ims_number_helper'    => ' ',
            'request_controller'        => 'Request Controller',
            'request_controller_helper' => ' ',
            'is_queued'                 => 'Queued Status',
            'is_queued_helper'          => ' ',
        ],
    ],
    'employee'                  => [
        'title'          => 'Employee',
        'title_singular' => 'Employee',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Name',
            'name_helper'        => ' ',
            'designation'        => 'Designation',
            'designation_helper' => ' ',
            'mobile'             => 'Mobile',
            'mobile_helper'      => ' ',
            'email'              => 'Email',
            'email_helper'       => ' ',
            'sex'                => 'Gender',
            'sex_helper'         => ' ',
            'payroll_emp'        => 'Payroll Employee ID',
            'payroll_emp_helper' => ' ',
            'is_active'          => 'Status',
            'is_active_helper'   => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'jobRequestManagement'      => [
        'title'          => 'Job Request Management',
        'title_singular' => 'Job Request Management',
    ],
    'requestType'               => [
        'title'          => 'Job Request Type',
        'title_singular' => 'Job Request Type',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'is_active'         => 'Status',
            'is_active_helper'  => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'jobRequestStatus'          => [
        'title'          => 'Job Request Status',
        'title_singular' => 'Job Request Status',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'is_active'         => 'Status',
            'is_active_helper'  => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'networkType'               => [
        'title'          => 'Network Type',
        'title_singular' => 'Network Type',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'is_active'         => 'Status',
            'is_active_helper'  => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'jobType'                   => [
        'title'          => 'Job Type',
        'title_singular' => 'Job Type',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'is_active'         => 'Status',
            'is_active_helper'  => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'jobRequest'                => [
        'title'          => 'Job Request (Core Job)',
        'title_singular' => 'Job Request (Core Job)',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'network_type'             => 'Network Type',
            'network_type_helper'      => ' ',
            'job_type'                 => 'Job Type',
            'job_type_helper'          => ' ',
            'request_type'             => 'Job Request Type',
            'request_type_helper'      => ' ',
            'request_status'           => 'Request Status',
            'request_status_helper'    => ' ',
            'number'                   => 'Phone Number',
            'number_helper'            => ' ',
            'agw_ip'                   => 'AGW IP',
            'agw_ip_helper'            => ' ',
            'tid'                      => 'TID',
            'tid_helper'               => ' ',
            'note'                     => 'Note',
            'note_helper'              => ' ',
            'file'                     => 'Upload Document',
            'file_helper'              => ' ',
            'requested_by'             => 'Requested By(User Name)',
            'requested_by_helper'      => ' ',
            'request_time'             => 'Request Time',
            'request_time_helper'      => ' ',
            'verified_by'              => 'Verified By (User Name)',
            'verified_by_helper'       => ' ',
            'verification_time'        => 'Verification Time',
            'verification_time_helper' => ' ',
            'approved_by'              => 'Approved By (User Name)',
            'approved_by_helper'       => ' ',
            'approval_time'            => 'Approval Time',
            'approval_time_helper'     => ' ',
            'approval_note'            => 'Approval Note',
            'approval_note_helper'     => ' ',
            'rejected_by'              => 'Rejected By (User Name)',
            'rejected_by_helper'       => ' ',
            'rejection_time'           => 'Rejection Time',
            'rejection_time_helper'    => ' ',
            'rejection_note'           => 'Rejection Note',
            'rejection_note_helper'    => ' ',
            'script'                   => 'Script',
            'script_helper'            => ' ',
            'is_force_request'         => 'Force Request Type',
            'is_force_request_helper'  => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'osoNetwork'                => [
        'title'          => '171KL Network',
        'title_singular' => '171KL Network',
    ],
    'tndpImsNewtork'            => [
        'title'          => 'TNDP IMS Newtork',
        'title_singular' => 'TNDP IMS Newtork',
    ],
    'script'                    => [
        'title'          => 'Scripts',
        'title_singular' => 'Script',
    ],
    'history'                   => [
        'title'          => 'History',
        'title_singular' => 'History',
    ],
    'coreJobRequest'            => [
        'title'          => 'Core Job Request',
        'title_singular' => 'Core Job Request',
    ],
    'coreJob'                   => [
        'title'          => 'Core Job Request',
        'title_singular' => 'Core Job Request',
    ],
    'ontJob'                    => [
        'title'          => 'OLT Job Request',
        'title_singular' => 'OLT Job Request',
    ],
    'osoReport'                 => [
        'title'          => 'Reports',
        'title_singular' => 'Report',
    ],
    'imsReport'                 => [
        'title'          => 'Reports',
        'title_singular' => 'Report',
    ],
    'coreJobOso'                => [
        'title'          => 'Core Job (171Kl Network)',
        'title_singular' => 'Core Job (171Kl Network)',
    ],
    'oltOso'                    => [
        'title'          => 'OLT Job (171KL Network)',
        'title_singular' => 'OLT Job (171KL Network)',
    ],
    'coreJobIm'                 => [
        'title'          => 'Core Job (IMS Network)',
        'title_singular' => 'Core Job (IMS Network)',
    ],
    'ontJobIm'                  => [
        'title'          => 'ONT Job (IMS Network)',
        'title_singular' => 'ONT Job (IMS Network)',
    ],
    'jobRequestAuthenticatioin' => [
        'title'          => 'Job Request Authenticatioin',
        'title_singular' => 'Job Request Authenticatioin',
    ],
    'myJobRequest'              => [
        'title'          => 'My Job Requests',
        'title_singular' => 'My Job Request',
    ],
    'olt'                       => [
        'title'          => 'OLT List',
        'title_singular' => 'OLT List',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'ip'                => 'OLT IP',
            'ip_helper'         => ' ',
            'vlan'              => 'Data VLAN',
            'vlan_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'tndpImsOltProfile'         => [
        'title'          => 'OLT Number Profile',
        'title_singular' => 'OLT Number Profile',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'olt_name'             => 'OLT Name',
            'olt_name_helper'      => ' ',
            'date'                 => 'Date',
            'date_helper'          => ' ',
            'job_type'             => 'Job Type',
            'job_type_helper'      => ' ',
            'device_type'          => 'Device Type',
            'device_type_helper'   => ' ',
            'no_of_ports'          => 'No Of Ports',
            'no_of_ports_helper'   => ' ',
            'serial_number'        => 'Serial Number',
            'serial_number_helper' => ' ',
            'interface'            => 'Interface',
            'interface_helper'     => ' ',
            'ip'                   => 'Device IP',
            'ip_helper'            => ' ',
            'number'               => 'Number',
            'number_helper'        => ' ',
            'port_number'          => 'Port Number',
            'port_number_helper'   => ' ',
            'service'              => 'Service',
            'service_helper'       => ' ',
            'status'               => 'Status',
            'status_helper'        => ' ',
            'description'          => 'Description',
            'description_helper'   => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
        ],
    ],
    'osoOltJob'                 => [
        'title'          => 'OLT Job Request',
        'title_singular' => 'OLT Job Request',
    ],
    'oltJobRequest'             => [
        'title'          => 'Job Request (OLT Job)',
        'title_singular' => 'Job Request (OLT Job)',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'network_type'             => 'Network Type',
            'network_type_helper'      => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'job_type'                 => 'Job Type',
            'job_type_helper'          => ' ',
            'request_type'             => 'Request Type',
            'request_type_helper'      => ' ',
            'request_status'           => 'Request Status',
            'request_status_helper'    => ' ',
            'olt_ip'                   => 'OLT IP',
            'olt_ip_helper'            => ' ',
            'number'                   => 'Number',
            'number_helper'            => ' ',
            'interface'                => 'Interface',
            'interface_helper'         => ' ',
            'service_type'             => 'Service Type',
            'service_type_helper'      => ' ',
            'port_number'              => 'Port Number',
            'port_number_helper'       => ' ',
            'note'                     => 'Note',
            'note_helper'              => ' ',
            'file'                     => 'File',
            'file_helper'              => ' ',
            'requested_by'             => 'Requested By(User Name)',
            'requested_by_helper'      => ' ',
            'request_time'             => 'Request Time',
            'request_time_helper'      => ' ',
            'verified_by'              => 'Verified By (User Name)',
            'verified_by_helper'       => ' ',
            'verification_time'        => 'Verification Time',
            'verification_time_helper' => ' ',
            'approved_by'              => 'Approved By (User Name)',
            'approved_by_helper'       => ' ',
            'approval_time'            => 'Approval Time',
            'approval_time_helper'     => ' ',
            'approval_note'            => 'Approval Note',
            'approval_note_helper'     => ' ',
            'rejected_by'              => 'Rejected By (User Name)',
            'rejected_by_helper'       => ' ',
            'rejection_time'           => 'Rejection Time',
            'rejection_time_helper'    => ' ',
            'rejection_note'           => 'Rejection Note',
            'rejection_note_helper'    => ' ',
            'script'                   => 'Script',
            'script_helper'            => ' ',
            'device_ip'                => 'Device IP',
            'device_ip_helper'         => ' ',
        ],
    ],
    'callSourceCode'            => [
        'title'          => 'Call Source Code',
        'title_singular' => 'Call Source Code',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'zone'              => 'Division/Office Name',
            'zone_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'code'              => 'Source Code',
            'code_helper'       => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
        ],
    ],
];
