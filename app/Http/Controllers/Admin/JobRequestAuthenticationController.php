<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Utills\NumberUtil;
use App\Http\Utills\Scripts;
use App\Models\CallSourceCode;
use App\Models\JobRequest;
use App\Models\NetworkType;
use App\Models\OsoNumber;
use App\Models\TndpImsNumber;
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
        abort_if(Gate::denies('job_request_authentication_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
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
//        dd($jobRequestId);
        $user = Auth::user();

//        load the job request data information
        $jobRequestInfo = JobRequest::find($jobRequestId);
        $jobRequestInfo->load('network_type', 'job_type', 'request_type','request_status','requested_by','approved_by','verified_by');


        $jobRequestInfo->request_status_id = config('global.REQUEST_STATUS_AUTHENTICATE');
        $jobRequestInfo->verified_by_id = $user->id;
        $jobRequestInfo->verification_time = Carbon::now()->format('d-m-Y H:i:s');

        $callSourceCode = CallSourceCode::find($jobRequestInfo->call_source_code_id);
        $callSourceCode->load('callSourceCodeUsers','zone');

        $moduleId = $callSourceCode->code + 21;


//        Switch statement for generating script
        switch ($jobRequestInfo->request_type_id) {
            case config('global.NEW_CONNECTION_REQUEST'):

                $jobRequestInfo->script = Scripts::getNewConnectionScript($jobRequestInfo->number,
                    $jobRequestInfo->agw_ip, $jobRequestInfo->tid, $moduleId, $callSourceCode->code);
//                dd($jobRequestInfo);
                break;

            case config('global.RE_CONNECTION_REQUEST'):
                $jobRequestInfo->script = Scripts::getReConnectionScript($jobRequestInfo->number,
                    $jobRequestInfo->agw_ip, $jobRequestInfo->tid, '1', '22', 1);
                break;
            case config('global.CASUAL_CONNECTION_REQUEST'):
                $jobRequestInfo->script = Scripts::getCasualConnectionScript($jobRequestInfo->number,
                    $jobRequestInfo->agw_ip, $jobRequestInfo->tid, '1', '22', 1);
                break;

            case config('global.CASUAL_DISCONNECTION_REQUEST'):
                $jobRequestInfo->script = Scripts::getCasualDisconnectionScript($jobRequestInfo->number);
                break;
            case config('global.RESTORATION_REQUEST')  :
                $jobRequestInfo->script = Scripts::getRestorationScript($jobRequestInfo->number);
                break;

            case config('global.TEMPORARY_DISCONNECTION_REQUEST')  :
                $jobRequestInfo->script = Scripts::getTemporaryDisconnectionScript($jobRequestInfo->number);
                break;

            case config('global.PERMANENT_CLOSE_REQUEST')  :
                $jobRequestInfo->script = Scripts::getPermanentCloseScript($jobRequestInfo->number);
                break;

            case config('global.ISD_FACILITIES_REQUEST')  :
                $jobRequestInfo->script = Scripts::getIsdFacilitiesScript($jobRequestInfo->number);
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
//        dd($jobRequestInfo);

//        Save the job request information
        $jobRequestInfo->save();

        return redirect()->route('admin.job-request-authentications.index')->with('success', 'Successfully Authenticate the job request.');



    }


    public function approve($jobRequestId)
    {
        abort_if(Gate::denies('job_request_authentication_approve'), Response::HTTP_FORBIDDEN, '403 Forbidden');
//        load the logged in user
        $user = Auth::user();

//        load the job request data information
        $jobRequestInfo = JobRequest::find($jobRequestId);
        $jobRequestInfo->load('network_type', 'job_type', 'request_type','request_status','requested_by','approved_by','verified_by');
//        dd($jobRequestInfo);

        //              set the verification time and verified by user information
        $jobRequestInfo->request_status_id = config('global.REQUEST_STATUS_APPROVED');
        $jobRequestInfo->approved_by_id = $user->id;
        $jobRequestInfo->approval_time = Carbon::now()->format('d-m-Y H:i:s');
//        dd($jobRequestInfo);

        $numberProfile = NumberUtil::getNumberProfile($jobRequestInfo->number,$jobRequestInfo->network_type_id);
//        dd($numberProfile);


        switch ($jobRequestInfo->request_type_id) {
            case config('global.NEW_CONNECTION_REQUEST'):
                $numberProfile->numberOsoNumberProfiles[0]->is_active = config('global.ACTIVE_ID');
                $numberProfile->numberOsoNumberProfiles[0]->is_queued = false;
//                dd($numberProfile);
                break;

            case config('global.RE_CONNECTION_REQUEST'):

                break;
            case config('global.CASUAL_CONNECTION_REQUEST'):

                break;

            case config('global.CASUAL_DISCONNECTION_REQUEST'):
                break;
            case config('global.RESTORATION_REQUEST')  :
                $numberProfile->numberOsoNumberProfiles[0]->is_td = config('global.INACTIVE_ID');
                $numberProfile->numberOsoNumberProfiles[0]->is_queued = false;
                break;

            case config('global.TEMPORARY_DISCONNECTION_REQUEST')  :
                $numberProfile->numberOsoNumberProfiles[0]->is_td = true;
                $numberProfile->numberOsoNumberProfiles[0]->is_queued = false;
                break;

            case config('global.PERMANENT_CLOSE_REQUEST')  :
                $numberProfile->numberOsoNumberProfiles[0]->is_queued = false;
                $numberProfile->numberOsoNumberProfiles[0]->is_active = config('global.INACTIVE_ID');
                $numberProfile->numberOsoNumberProfiles[0]->is_td = config('global.INACTIVE_ID');
                $numberProfile->numberOsoNumberProfiles[0]->is_isd = config('global.INACTIVE_ID');
                $numberProfile->numberOsoNumberProfiles[0]->is_eisd = config('global.INACTIVE_ID');
                $numberProfile->numberOsoNumberProfiles[0]->is_pbx = config('global.NO_PBX_ID');
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
//        dd($jobRequestInfo);
        $jobRequestInfo->save();
        $numberProfile->push();

//        return redirect()->route('admin.scripts.171kl.authenticated-list')->with('success', 'Successfully Approved the job request.');
        return redirect()->route('admin.core-job-osos.index')->with('success', 'Successfully Approved the job request.');



    }

    public function reject($jobRequestId)
    {
        abort_if(Gate::denies('job_request_authentication_reject'), Response::HTTP_FORBIDDEN, '403 Forbidden');

//        dd($jobRequestId);
//        load the logged in user
        $user = Auth::user();

//        load the job request data information
        $jobRequestInfo = JobRequest::find($jobRequestId);
        $jobRequestInfo->load('network_type', 'job_type', 'request_type','request_status','requested_by','approved_by','verified_by');
//        dd($jobRequestInfo);

//        set the verification time and verified by user information
        $jobRequestInfo->request_status_id = config('global.REQUEST_STATUS_REJECT');
        $jobRequestInfo->rejected_by_id = $user->id;
        $jobRequestInfo->rejection_time = Carbon::now()->format('d-m-Y H:i:s');
//        dd($jobRequestInfo);

        $numberProfile = NumberUtil::getNumberProfile($jobRequestInfo->number,$jobRequestInfo->network_type_id);
//        dd($numberProfile);
        if($jobRequestInfo->network_type->id == config('global.171KL_NETWORK_ID')){
            if($jobRequestInfo->request_type_id == config('global.NEW_CONNECTION_REQUEST')){
                $numberProfile->numberOsoNumberProfiles[0]->request_controller = false;
                $numberProfile->numberOsoNumberProfiles[0]->is_queued = false;
            }elseif($jobRequestInfo->request_type_id == config('global.PERMANENT_CLOSE_REQUEST')){
                $numberProfile->numberOsoNumberProfiles[0]->request_controller = true;
                $numberProfile->numberOsoNumberProfiles[0]->is_queued = false;
            }else{
                $numberProfile->numberOsoNumberProfiles[0]->is_queued = false;
            }
        }
        elseif($jobRequestInfo->network_type->id == config('global.TNDP_IMS_NETWORK_ID')){
        }



//        dd($numberProfile);
//        Save the job request information
        $jobRequestInfo->save();

        $numberProfile->push();

        return redirect()->back()->with('success','Successfully Reject the job request.');
    }


}
