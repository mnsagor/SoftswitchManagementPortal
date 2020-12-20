<?php


namespace App\Http\Utills;


class Constants
{
    const REQUEST_TYPE_SELECT = [
        '0' => 'New Connection',
        '1' => 'Re-Connection',
        '2' => 'Casual Connection',
        '3' => 'Casual Disconnection',
        '4' => 'Restoration',
        '5' => 'Temporary Disconnection',
        '6' => 'Permanent Close',
        '7' => 'ISD Facilities',
        '8' => 'NWD Facilities',
        '9' => 'Non-NWD Facilities',
        '10' => 'Centrex',
        '11' => 'PBX',
        '12' => 'Hotline',
        '13' => 'Outgoing Call Baring',
        '14' => 'Incoming Call Baring',
        '15' => 'Number Change',
        '16' => 'Closing For Shifting',
        '17' => 'Green NumberList',
        '18' => 'Call Forwarding',
        '19' => 'Call Waiting',
        '20' => 'Call Waiting',
        '21' => 'Call Conference',
        '22' => 'B/W List',
        '23' => 'Absentee Subscriber',
        '24' => 'Malicious Call Trace',
        '25' => 'Conversion',
        '26' => 'EISD',
        '27' => 'Unlock',
    ];

    const JOB_REQUEST_STATUS = [
        '1' =>'Pending',
        '2' =>'Authenticated',
        '3' =>'Ready to execute',
        '4' =>'Approved',
        '5' =>'Reject',
    ];
    const JOB_REQUEST_STATUS_VALUE = [
        'Pending'     => '0',
        'Authenticated'=> '1',
        'Ready to execute' => '2',
        'Approved' => '3',
        'Reject' => '4',
    ];


}
