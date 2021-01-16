<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CallSourceCode;
use App\Models\JobRequestStatus;
use App\Models\JobType;
use App\Models\NetworkType;
use App\Models\RequestType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CoreJobRequestController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('core_job_request_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

//        return view('admin.coreJobRequests.index');
        return view('admin.171klNetwork.coreJob.index');
    }

    public function coreJobRequest($RequestTypeid)
    {
        switch ($RequestTypeid)
        {
            case config('global.NEW_CONNECTION_REQUEST'):
//               abort_if(Gate::denies('new_connection_request_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

//                $network_types = NetworkType::all()->where('name','TNDP IMS')->first();
//                dd($network_types->id);

//                $job_types = JobType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
//
//                $request_types = RequestType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
//
//                $request_statuses = JobRequestStatus::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
//                return view('admin.171klNetwork.coreJob.newConnectionRequest',compact('network_types'));
                $call_source_codes = CallSourceCode::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
                return view('admin.171klNetwork.coreJob.newConnectionRequest',compact('call_source_codes'));
                break;
            case config('global.RE_CONNECTION_REQUEST'):
                return view('admin.171klNetwork.coreJob.reConnectionRequest');
                break;
            case config('global.CASUAL_CONNECTION_REQUEST'):
                return view('admin.171klNetwork.coreJob.casualConnectionRequest');
                break;
            case config('global.CASUAL_DISCONNECTION_REQUEST'):
                return view('admin.171klNetwork.coreJob.casualDisconnectionRequest');
                break;
            case config('global.RESTORATION_REQUEST'):
                return view('admin.171klNetwork.coreJob.restorationRequest');
                break;
            case config('global.TEMPORARY_DISCONNECTION_REQUEST'):
                return view('admin.171klNetwork.coreJob.temporaryDisconnectionRequest');
                break;
            case config('global.PERMANENT_CLOSE_REQUEST'):
                return view('admin.171klNetwork.coreJob.permanentCloseRequest');
                break;
            case config('global.ISD_FACILITIES_REQUEST'):
                return view('admin.171klNetwork.coreJob.isdFacilitiesRequest');
                break;
            case config('global.NWD_FACILITIES_REQUEST'):
                return view('admin.171klNetwork.coreJob.nwdFacilitiesRequest');
                break;
            case config('global.NON_NWD_FACILITIES_REQUEST'):
                return view('admin.171klNetwork.coreJob.nonNwdFacilitiesRequest');
                break;
            case config('global.CENTREX_REQUEST'):
                return view('admin.171klNetwork.coreJob.centrexRequest');
                break;
            case config('global.PBX_REQUEST'):
                return view('admin.171klNetwork.coreJob.pbxRequest');
                break;
            case config('global.HOTLINE_REQUEST'):
                return view('admin.171klNetwork.coreJob.hotLineRequest');
                break;
            case config('global.OUTGOING_CALL_BARING_REQUEST'):
                return view('admin.171klNetwork.coreJob.outgoingCallBaringRequest');
                break;
            case config('global.INCOMING_CALL_BARING_REQUEST'):
                return view('admin.171klNetwork.coreJob.incomingCallBaringRequest');
                break;
            case config('global.NUMBER_CHANGE_REQUEST'):
                return view('admin.171klNetwork.coreJob.numberChangeRequest');
                break;
            case config('global.CLOSING_FOR_SHIFTING_REQUEST'):
                return view('admin.171klNetwork.coreJob.closingForShiftingRequest');
                break;
            case config('global.GREEN_NUMBER_REQUEST'):
                return view('admin.171klNetwork.coreJob.greenNumberRequest');
                break;
            case config('global.CALL_FORWARDING_REQUEST'):
                return view('admin.171klNetwork.coreJob.callForwardingRequest');
                break;
            case config('global.CALL_WAITING_REQUEST'):
                return view('admin.171klNetwork.coreJob.callWaitingRequest');
                break;
            case config('global.DO_NOT_DISTURB_REQUEST'):
                return view('admin.171klNetwork.coreJob.doNotDisturbRequest');
                break;
            case config('global.CALL_CONFERENCE_REQUEST'):
                return view('admin.171klNetwork.coreJob.callConferenceRequest');
                break;
            case config('global.BW_LIST_REQUEST'):
                return view('admin.171klNetwork.coreJob.bwListRequest');
                break;
            case config('global.ABSENTEE_SUBSCRIBER_REQUEST'):
                return view('admin.171klNetwork.coreJob.absenteeSubscriberRequest');
                break;
            case config('global.MALICIOUS_CALL_TRACE_REQUEST'):
                return view('admin.171klNetwork.coreJob.maliciousCallTraceRequest');
                break;
            case config('global.CONVERSION_REQUEST'):
                return view('admin.171klNetwork.coreJob.conversionRequest');
                break;
            case config('global.EISD_REQUEST'):
                return view('admin.171klNetwork.coreJob.eisdRequest');
                break;
            case config('global.UNLOCK_REQUEST'):
                return view('admin.171klNetwork.coreJob.unlockRequest');
                break;
            default:

                break;
        }

    }
}
