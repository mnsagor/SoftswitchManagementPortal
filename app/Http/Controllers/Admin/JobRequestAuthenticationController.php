<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Utills\NumberUtil;
use App\Http\Utills\Scripts;
use App\Models\JobRequest;
use App\Models\NetworkType;
use App\Models\User;
use Carbon\Carbon;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class JobRequestAuthenticationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('job_request_authenticatioin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
//
        $zoneIds = array();
        $userIds = array();

//        retrive the user with his corresponding zones information
        $users =User::find(Auth::id());

//        collect all the zone ids of the looged in user
        foreach ($users->offices as $zone){
            array_push($zoneIds,$zone->id);
        }
//        dd($zoneIds);

//        collect the user ids under the zone ids
        $userIdList = DB::table('office_user')
            ->select('user_id')->distinct()
            ->whereIn('office_id', $zoneIds)
            ->get();

//        collect all the user ids
        foreach ($userIdList as $userId){
            array_push($userIds,$userId->user_id);
        }

        $jobRequests = JobRequest::all()
            ->where('request_status_id',1)
//            ->where('request_type',0)
            ->whereIn('requested_by_id', $userIds);

        $jobRequests->load('network_type', 'job_type', 'request_type','request_status','requested_by','approved_by','verified_by');
//        dd($jobRequests);

        return view('admin.jobRequestAuthentications.index',compact('jobRequests'));

//        $networkTypes = NetworkType::all();
//
//        return view('admin.jobRequestAuthentications.index', compact('networkTypes'));
    }

    public function show($jobRequestId)
    {
        //        load the logged in user
        $user = Auth::user();

        $jobRequest = JobRequest::find($jobRequestId);
        $jobRequest->load('network_type', 'job_type', 'request_type','request_status','requested_by','approved_by','verified_by');
//        dd($jobRequestInfo);

        return view('admin.jobRequestAuthentications.show',compact('jobRequest'));

    }

    public function authenticate($jobRequestId)
    {
//        load the logged in user
        $user = Auth::user();

//        load the job request data information
        $jobRequestInfo = \App\JobRequest::find($jobRequestId);
//        dd($jobRequestInfo->all());
        $jobRequestInfo->load('requestedBy','approvedBy','verifiedBy');
//        $jobRequestInfo->load('requestedBy','approvedBy','verifiedBy');

//        Set the request status as authenticated
//        'REQUEST_STATUS_AUTHENTICATE'    => 1,
//        set the verification time and verified by user information
        $jobRequestInfo->request_status = config('global.REQUEST_STATUS_AUTHENTICATE');
        $jobRequestInfo->verified_by = $user->id;
        $jobRequestInfo->verification_time = Carbon::now()->toDateTimeString();

////        Mocker Start
//        $jobRequestInfo->phone_number = "58154573";
//        $jobRequestInfo->agw_ip = "10.1.6.4";
//        $jobRequestInfo->tid = "1373";
////        Mocker End

//        Switch statement for generating script
        switch ($jobRequestInfo->request_type) {
            case config('global.NEW_CONNECTION_REQUEST'):
                $jobRequestInfo->script = Scripts::getNewConnectionScript($jobRequestInfo->phone_number,
                    $jobRequestInfo->agw_ip, $jobRequestInfo->tid, '1', '22', 1);
//                dd($jobRequestInfo);
                break;

            case config('global.RE_CONNECTION_REQUEST'):
                $jobRequestInfo->script = Scripts::getReConnectionScript($jobRequestInfo->phone_number,
                    $jobRequestInfo->agw_ip, $jobRequestInfo->tid, '1', '22', 1);
                break;
            case config('global.CASUAL_CONNECTION_REQUEST'):
                $jobRequestInfo->script = Scripts::getCasualConnectionScript($jobRequestInfo->phone_number,
                    $jobRequestInfo->agw_ip, $jobRequestInfo->tid, '1', '22', 1);
                break;

            case config('global.CASUAL_DISCONNECTION_REQUEST'):
                $jobRequestInfo->script = Scripts::getCasualDisconnectionScript($jobRequestInfo->phone_number);
                break;
            case config('global.RESTORATION_REQUEST')  :
                $jobRequestInfo->script = Scripts::getRestorationScript($jobRequestInfo->phone_number);
                break;

            case config('global.TEMPORARY_DISCONNECTION_REQUEST')  :
                $jobRequestInfo->script = Scripts::getTemporaryDisconnectionScript($jobRequestInfo->phone_number);
                break;

            case config('global.PERMANENT_CLOSE_REQUEST')  :
                $jobRequestInfo->script = Scripts::getPermanentCloseScript($jobRequestInfo->phone_number);
                break;

            case config('global.ISD_FACILITIES_REQUEST')  :
                $jobRequestInfo->script = Scripts::getIsdFacilitiesScript($jobRequestInfo->phone_number);
                break;

            case config('global.NWD_FACILITIES_REQUEST')  :
                $jobRequestInfo->script = Scripts::getNwdFacilitiesScript();
                break;

            case config('global.NON_NWD_FACILITIES_REQUEST')  :
                $jobRequestInfo->script = Scripts::getNonNwdFacilitiesScript();
                break;

            case config('global.CENTREX_REQUEST')  :
                $jobRequestInfo->script = Scripts::getCentrexScript();
                break;

            case config('global.PBX_REQUEST')  :
                $jobRequestInfo->script = Scripts::getPbxScript();
                break;
            case config('global.HOTLINE_REQUEST')  :
                $jobRequestInfo->script = Scripts::getHotlineScript();
                break;
            case config('global.OUTGOING_CALL_BARING_REQUEST')  :
                $jobRequestInfo->script = Scripts::getOutgoingCallBaringScript();
                break;

            case config('global.INCOMING_CALL_BARING_REQUEST')  :
                $jobRequestInfo->script = Scripts::getIncomingCallBaringScript();
                break;

            case config('global.NUMBER_CHANGE_REQUEST'):
                $jobRequestInfo->script = Scripts::getNumberChangeScript($jobRequestInfo->phone_number,
                    $jobRequestInfo->agw_ip, $jobRequestInfo->tid, '1', '22', 1);
                break;

            case config('global.CLOSING_FOR_SHIFTING_REQUEST')  :
                $jobRequestInfo->script = Scripts::getClosingForShiftingScript($jobRequestInfo->phone_number);
                break;

            case config('global.GREEN_NUMBER_REQUEST')  :
                $jobRequestInfo->script = Scripts::getGreenNumberScript();
                break;

            case config('global.CALL_FORWARDING_REQUEST')  :
                $jobRequestInfo->script = Scripts::getCallForwardingScript();
                break;

            case config('global.CALL_WAITING_REQUEST')  :
                $jobRequestInfo->script = Scripts::getCallWaitingScript();
                break;

            case config('global.DO_NOT_DISTURB_REQUEST')  :
                $jobRequestInfo->script = Scripts::getDoNotDisturbScript();
                break;

            case config('global.CALL_CONFERENCE_REQUEST')  :
                $jobRequestInfo->script = Scripts::getCallConferenceScript();
                break;

            case config('global.BW_LIST_REQUEST')  :
                $jobRequestInfo->script = Scripts::getBwListScript();
                break;

            case config('global.ABSENTEE_SUBSCRIBER_REQUEST')  :
                $jobRequestInfo->script = Scripts::getAbsenteeSubscriberScript();
                break;

            case config('global.MALICIOUS_CALL_TRACE_REQUEST')  :
                $jobRequestInfo->script = Scripts::getMaliciourCallTraceScript();
                break;

            case config('global.CONVERSION_REQUEST'):
                $jobRequestInfo->script = Scripts::getConversionScript($jobRequestInfo->phone_number,
                    $jobRequestInfo->agw_ip, $jobRequestInfo->tid, '1', '22', 1);
                break;

            case config('global.EISD_REQUEST')  :
                $jobRequestInfo->script = Scripts::getEisdScript();
                break;

            case config('global.UNLOCK_REQUEST')  :
                $jobRequestInfo->script = Scripts::getUnlockScript();
                break;

            default:
                break;
        }

//        Save the job request information
        $jobRequestInfo->save();

        return redirect()->route('admin.job-request-authentication.index')->with('success', 'Successfully Authenticate the job request.');



    }


    public function approve($jobRequestId)
    {
//        load the logged in user
        $user = Auth::user();

//        load the job request data information
        $jobRequestInfo = \App\JobRequest::find($jobRequestId);
//        dd($jobRequestInfo->all());
        $jobRequestInfo->load('requestedBy','approvedBy','verifiedBy');
//        dd($jobRequestInfo);
        //              set the verification time and verified by user information
        $jobRequestInfo->request_status = config('global.REQUEST_STATUS_APPROVED');
        $jobRequestInfo->approved_by = $user->id;
        $jobRequestInfo->approval_time = Carbon::now()->toDateTimeString();

        $numberProfile = NumberUtil::getNumberProfile($jobRequestInfo->phone_number);


        switch ($jobRequestInfo->request_type) {
            case config('global.NEW_CONNECTION_REQUEST'):
                $numberProfile->numberProfiles->active_number_status = config('global.ACTIVE');
                $numberProfile->numberProfiles->is_queued = false;
                $numberProfile->push();

                break;

            case config('global.RE_CONNECTION_REQUEST'):

                break;
            case config('global.CASUAL_CONNECTION_REQUEST'):

                break;

            case config('global.CASUAL_DISCONNECTION_REQUEST'):
                break;
            case config('global.RESTORATION_REQUEST')  :
                $numberProfile->numberProfiles->td_status = false;
                $numberProfile->numberProfiles->is_queued = false;
                $numberProfile->push();
                break;

            case config('global.TEMPORARY_DISCONNECTION_REQUEST')  :
                $numberProfile->numberProfiles->td_status = true;
                $numberProfile->numberProfiles->is_queued = false;
                $numberProfile->push();
                break;

            case config('global.PERMANENT_CLOSE_REQUEST')  :
                $numberProfile->numberProfiles->is_queued = false;
                $numberProfile->numberProfiles->active_number_status = config('global.INACTIVE');
                $numberProfile->numberProfiles->td_status = false;
                $numberProfile->numberProfiles->isd_status = false;
                $numberProfile->numberProfiles->eisd_status = false;
                $numberProfile->numberProfiles->pbx_status = false;

                $numberProfile->push();


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

//        Save the job request information
        $jobRequestInfo->save();

        return redirect()->route('admin.scripts.171kl.authenticated-list')->with('success', 'Successfully Approved the job request.');



    }

    public function reject($jobRequestId)
    {
//        dd($jobRequestId);
//        load the logged in user
        $user = Auth::user();

//        load the job request data information
        $jobRequestInfo = JobRequest::find($jobRequestId);
//        dd($jobRequestInfo->all());
        $jobRequestInfo->load('requestedBy','approvedBy','verifiedBy');

        //        Set the request status as authenticated
//        'REQUEST_STATUS_REJECT'    => 3,
//        set the verification time and verified by user information
        $jobRequestInfo->request_status = config('global.REQUEST_STATUS_REJECT');
        $jobRequestInfo->verified_by = $user->id;
        $jobRequestInfo->verification_time = Carbon::now()->toDateTimeString();

//        Save the job request information
        $jobRequestInfo->save();

        $numberProfile = NumberUtil::getNumberProfile($jobRequestInfo->phone_number);

        if($jobRequestInfo->request_type == config('global.PERMANENT_CLOSE_REQUEST')){
            $numberProfile->numberProfiles->request_controller = true;
        }

        $numberProfile->numberProfiles->is_queued = false;
        $numberProfile->push();

//        return redirect()->route('admin.scripts.171kl.authenticated-list')->with('success', 'Successfully Reject the job request.');
        return redirect()->route('admin.job-request-authentication.index')->with('success', 'Successfully Reject the job request.');
    }


}
