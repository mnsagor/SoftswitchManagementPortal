<?php


namespace App\Http\Utills;


use App\Models\JobRequest;
use App\Models\OsoNumber;
use App\Models\OsoNumberProfile;
use App\Models\TndpImsNumber;
use App\Models\TndpImsNumberProfile;
use App\NumberList;

class NumberUtil
{
    public static function isActiveNumber($phoneNumber){

        $phoneNumber = NumberList::all()
            ->where('phone_number',$phoneNumber)->first();
//        dd($phoneNumber);

        if($phoneNumber == null){
            return false;
        } else {
            $phoneNumber->load('numberProfiles','agw');
//            dd($phoneNumber);

            if($phoneNumber->numberProfiles->active_number_status == 0) // Inactive number
            {
                return false;

            } else if ($phoneNumber->numberProfiles->active_number_status == 1)
            {
                return true;
            }

        }

    }

    public static function isActive171klNumber ($number)
    {

        $number = OsoNumber::all()
            ->where('number',$number)->first();
//        dd($phoneNumber);

        if($number == null){
            return false;
        } else {
            $number->load('numberOsoNumberProfiles','agw_ip');
//            dd($number->numberOsoNumberProfiles[0]->id);

            if($number->numberOsoNumberProfiles[0]->is_active == 2) // Inactive number
            {
                return false;

            } else if ($number->numberOsoNumberProfiles[0]->is_active == 1)
            {
                return true;
            }

        }
    }

    public static function isActiveNumber171kl(OsoNumber $number){

        if($number->numberOsoNumberProfiles[0]->is_active == 2) // Inactive number
        {
            return false;

        } else if ($number->numberOsoNumberProfiles[0]->is_active == 1)
        {
            return true;
        }

    }

    public static function isTdNumber($phoneNumber, $network_type_id)
    {
//        dd($phoneNumber);
        $numberProfile = self::getNumberProfile($phoneNumber, $network_type_id);


        if ($numberProfile->numberOsoNumberProfiles[0]->is_td == 2) // No td
        {
            return false;

        } else if ($numberProfile->numberOsoNumberProfiles[0]->is_td == 1) {
            return true;
        }


    }

    public static function isNumberExist ($phoneNumber) {
        if($phoneNumber/10000000 == 5){
            $phoneNumber = OsoNumber::all()->where('number',$phoneNumber)->first();
        }
        else if($phoneNumber/10000000 == 4){
            $phoneNumber = TndpImsNumber::all()->where('number', $phoneNumber)->first();
        }
//        $phoneNumber = NumberList::all()
//            ->where('phone_number',$phoneNumber)->first();

        if($phoneNumber == null){
            return false;
        } else {
            return true;
        }

    }


    public static function getNumberProfile ($phoneNumber,$network_type_id){
//        dd($network_type_id);

        if($network_type_id == config('global.171KL_NETWORK_ID')){
//            dd($network_type_id);
            $numberProfile = OsoNumber::all()->where('number',$phoneNumber)->first();
            $numberProfile->load('numberOsoNumberProfiles', 'agw_ip');
//            dd($numberProfile->numberOsoNumberProfiles[0]->oso_number);
//            dd($numberProfile);
            return $numberProfile;
        }
        elseif($network_type_id == config('global.TNDP_IMS_NETWORK_ID')){
            $numberProfile = TndpImsNumber::all()->where('number' , $phoneNumber)->first();
            $numberProfile->load('numberTndpImsNumberProfiles', 'agw_ip');
            return $numberProfile;
        }else
            return null;
    }

    public static function getAllNumberProfile(){
        $numberProfile = NumberList::all();
        $numberProfile->load('numberProfiles','agw');
        return $numberProfile;
    }

    public static function updateNumberProfile(JobRequest $jobRequest,$status){
//        dd($jobRequest);
        switch ($jobRequest->request_type) {
            case config('global.NEW_CONNECTION_REQUEST'):
                $numberProfile = self::getNumberProfile($jobRequest->phone_number);
                $numberProfile->numberProfiles->active_number_status = $status;
                $numberProfile->push();
                break;
            case config('global.RE_CONNECTION_REQUEST'):

                break;
            case config('global.CASUAL_CONNECTION_REQUEST'):
                $numberProfile = self::getNumberProfile($jobRequest->phone_number);
                $numberProfile->numberProfiles->active_number_status = $status;
                $numberProfile->push();

                break;

            case config('global.CASUAL_DISCONNECTION_REQUEST'):

                break;
            case config('global.RESTORATION_REQUEST')  :

                break;

            case config('global.TEMPORARY_DISCONNECTION_REQUEST')  :

                break;

            case config('global.PERMANENT_CLOSE_REQUEST')  :

                break;

            case config('global.ISD_FACILITIES_REQUEST')  :

                break;

            case config('global.NWD_FACILITIES_REQUEST')  :

                break;

            case config('global.NON_NWD_FACILITIES_REQUEST')  :

                break;

            case config('global.CENTREX_REQUEST')  :

                break;

            case config('global.PBX_REQUEST')  :

                break;
            case config('global.HOTLINE_REQUEST')  :

                break;
            case config('global.OUTGOING_CALL_BARING_REQUEST')  :

                break;

            case config('global.INCOMING_CALL_BARING_REQUEST')  :

                break;

            case config('global.NUMBER_CHANGE_REQUEST'):

                break;

            case config('global.CLOSING_FOR_SHIFTING_REQUEST')  :

                break;

            case config('global.GREEN_NUMBER_REQUEST')  :

                break;

            case config('global.CALL_FORWARDING_REQUEST')  :

                break;

            case config('global.CALL_WAITING_REQUEST')  :

                break;

            case config('global.DO_NOT_DISTURB_REQUEST')  :

                break;

            case config('global.CALL_CONFERENCE_REQUEST')  :

                break;

            case config('global.BW_LIST_REQUEST')  :

                break;

            case config('global.ABSENTEE_SUBSCRIBER_REQUEST')  :

                break;

            case config('global.MALICIOUS_CALL_TRACE_REQUEST')  :

                break;

            case config('global.CONVERSION_REQUEST'):

                break;

            case config('global.EISD_REQUEST')  :

                break;

            case config('global.UNLOCK_REQUEST')  :

                break;

            default:
                break;
        }
    }

}
