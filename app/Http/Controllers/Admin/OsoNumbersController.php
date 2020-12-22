<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyOsoNumberRequest;
use App\Http\Requests\Store171klCoreJobNewConnectionRequest;
use App\Http\Requests\StoreOsoNumberRequest;
use App\Http\Requests\UpdateOsoNumberRequest;
use App\Http\Utills\NumberUtil;
use App\Models\JobRequest;
use App\Models\JobRequestStatus;
use App\Models\JobType;
use App\Models\NetworkType;
use App\Models\OsoAgw;
use App\Models\OsoNumber;
use Carbon\Carbon;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class OsoNumbersController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('oso_number_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = OsoNumber::with(['agw_ip'])->select(sprintf('%s.*', (new OsoNumber)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'oso_number_show';
                $editGate      = 'oso_number_edit';
                $deleteGate    = 'oso_number_delete';
                $crudRoutePart = 'oso-numbers';


                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->editColumn('number', function ($row) {
                return $row->number ? $row->number : "";
            });
            $table->editColumn('tid', function ($row) {
                return $row->tid ? $row->tid : "";
            });
            $table->addColumn('agw_ip_ip', function ($row) {
                return $row->agw_ip ? $row->agw_ip->ip : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'agw_ip']);

            return $table->make(true);
        }

        $oso_agws = OsoAgw::get();

        return view('admin.osoNumbers.index', compact('oso_agws'));
    }

    public function create()
    {
        abort_if(Gate::denies('oso_number_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agw_ips = OsoAgw::all()->pluck('ip', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.osoNumbers.create', compact('agw_ips'));
    }

    public function store(StoreOsoNumberRequest $request)
    {
        $osoNumber = OsoNumber::create($request->all());

        return redirect()->route('admin.oso-numbers.index');
    }

    public function edit(OsoNumber $osoNumber)
    {
        abort_if(Gate::denies('oso_number_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agw_ips = OsoAgw::all()->pluck('ip', 'id')->prepend(trans('global.pleaseSelect'), '');

        $osoNumber->load('agw_ip');

        return view('admin.osoNumbers.edit', compact('agw_ips', 'osoNumber'));
    }

    public function update(UpdateOsoNumberRequest $request, OsoNumber $osoNumber)
    {
        $osoNumber->update($request->all());

        return redirect()->route('admin.oso-numbers.index');
    }

    public function show(OsoNumber $osoNumber)
    {
        abort_if(Gate::denies('oso_number_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $osoNumber->load('agw_ip', 'numberOsoNumberProfiles');
//        $test = $osoNumber->numberOsoNumberProfiles[0]->id;
//        dd($test);


        return view('admin.osoNumbers.show', compact('osoNumber'));
    }

    public function destroy(OsoNumber $osoNumber)
    {
        abort_if(Gate::denies('oso_number_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $osoNumber->delete();

        return back();
    }

    public function massDestroy(MassDestroyOsoNumberRequest $request)
    {
        OsoNumber::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function validate171klPhoneNumber(Request $request){

        $inputPhoneNumber = request('number') ;
        $inputRequestType = request('request_type_id') ;

//        dd($inputPhoneNumber);

        if($inputPhoneNumber == null){
            $data['empty_phone_number'] = 'Phone Number should not be empty';
            $data['msg'] = 'Phone Number should not be empty';
            $data['error'] = true;

            return $data;

        }else {

            $phoneNumber = OsoNumber::all()
                ->where('number',$inputPhoneNumber)->first();

            if($phoneNumber == null) {
                $data['error'] = true;
                $data['msg'] = "The Given number is not found in database.";
                return $data;
            }else {
                $phoneNumber->load('numberOsoNumberProfiles','agw_ip');

                if($inputRequestType == config('global.NEW_CONNECTION_REQUEST') && $inputPhoneNumber != null){

//                    if(NumberUtil::isActive171klNumber($phoneNumber->number)){
                    if(NumberUtil::isActiveNumber171kl($phoneNumber)){
                        $data['error'] = true;
                        $data['msg'] = "The Given number is already active.";

                    }else{
                        $data['error'] = false;
                        $data['msg'] = "The Given number is free for New Connection Request";
                        $data['agw_ip'] = $phoneNumber->agw_ip->ip;
                        $data['tid'] = $phoneNumber->tid;
                    }
                    return $data;

                }

                elseif ($inputRequestType == config('global.RE_CONNECTION_REQUEST') && $inputPhoneNumber != null){

                    //Write code here
                    if(NumberUtil::isActiveNumber($phoneNumber->phone_number)){
                        $data['error'] = true;
                        $data['msg'] = "The Given number is already active.";

                    }else{
                        $data['error'] = false;
                        $data['msg'] = "The Given number is free for Re-Connection Request";
                        $data['agw_ip'] = $phoneNumber->agw->ip;
                        $data['tid'] = $phoneNumber->tid;
                    }
                    return $data;

                }
                elseif ($inputRequestType == config('global.CASUAL_CONNECTION_REQUEST') && $inputPhoneNumber != null){

                    //Write code here
                    if(NumberUtil::isActiveNumber($phoneNumber->phone_number)){
                        $data['error'] = true;
                        $data['msg'] = "The Given number is already active.";

                    }else{
                        $data['error'] = false;
                        $data['msg'] = "The Given number is free for Re-Connection Request";
                        $data['agw_ip'] = $phoneNumber->agw_ip->ip;
                        $data['tid'] = $phoneNumber->tid;
                    }
                    return $data;

                }
                elseif ($inputRequestType == config('global.CASUAL_CONNECTION_REQUEST') && $inputPhoneNumber != null){

                    //Write code here
                    if(NumberUtil::isActiveNumber($phoneNumber->phone_number)){
                        $data['error'] = true;
                        $data['msg'] = "The Given number is already active.";

                    }else{
                        $data['error'] = false;
                        $data['msg'] = "The Given number is free for Re-Connection Request";
                        $data['agw_ip'] = $phoneNumber->agw->ip;
                        $data['tid'] = $phoneNumber->tid;
                    }
                    return $data;

                }
                elseif ($inputRequestType == config('global.CASUAL_DISCONNECTION_REQUEST') && $inputPhoneNumber != null){

                }
                elseif ($inputRequestType == config('global.RESTORATION_REQUEST') && $inputPhoneNumber != null){
                    //Write Code here.
                    if(NumberUtil::isTdNumber($phoneNumber->phone_number)){
                        $data['error'] = false;
                        $data['msg'] = "The Given number is in TD state.";
                    }else{
                        $data['error'] = true;
                        $data['msg'] = "Cannot proceed the request. The given number is not in Temporary Disconnected stage.";
                    }
                    return $data;


                }
                elseif ($inputRequestType == config('global.TEMPORARY_DISCONNECTION_REQUEST') && $inputPhoneNumber != null){

                    //Write code here
                    if( NumberUtil::isActiveNumber($phoneNumber->phone_number)){
                        $data['error'] = false;
                        $data['msg'] = "The Given number is eligible for Temporary Disconnect Request.";

                    }else{
                        $data['error'] = true;
                        $data['msg'] = "Then Given number is Inactive. Cannot proceed request for Temporary Disconnection.";
                    }
                    return $data;

                }
                elseif ($inputRequestType == config('global.PERMANENT_CLOSE_REQUEST') && $inputPhoneNumber != null){

                    //Write code here
                    if( NumberUtil::isActiveNumber($phoneNumber->phone_number)){
                        $data['error'] = false;
                        $data['msg'] = "The Given number is free for Permanent Close Request.";

                    }else{
                        $data['error'] = true;
                        $data['msg'] = "Then Given number is Inactive. Cannot proceed request for Permanent Close.";
                    }
                    return $data;

                }
            }
        }
    }

    public function storeCoreJobNewConnectionRequest(Store171klCoreJobNewConnectionRequest $request)
    {
//        dd($request->all());

        $network_type_id = NetworkType::all()->where('id',config('global.171KL_NETWORK_ID'))->first();
        $job_type_id = JobType::all()->where('id', config('global.NEW_CONNECTION_REQUEST'))->first();
        $job_request_status_id = JobRequestStatus::all()->where('id', config('global.REQUEST_STATUS_PENDING'))->first();

        if(!$request->call_source_code_id){
            $call_source_code_id = Auth::user()->call_source_code_id;
            $request->request->add([
                'call_source_code_id'       =>$call_source_code_id
            ]);
        }

//        check the empty then add
        if ($request->request_type_id == null){
            $request->request->add(['request_type_id' => config('global.NEW_CONNECTION_REQUEST')]);
        }
        $request->request->add([
            'network_type_id'           => $network_type_id->id,
            'job_type_id'               => $job_type_id->id,
            'request_status_id'         => $job_request_status_id->id,
        ]);

        $jobRequests = JobRequest::all()->where('number', $request->number);
        $numberProfile = NumberUtil::getNumberProfile($request->number,$network_type_id->id);
//        dd($numberProfile);

        if($numberProfile->numberOsoNumberProfiles[0]->is_queued == true || $numberProfile->numberOsoNumberProfiles[0]->request_controller == true){
            return redirect()->back()->with('fail', 'Given number '. $request->number .' is already in processing queue. Please communicate with admin');
        }elseif($numberProfile->numberOsoNumberProfiles[0]->is_active == config('global.ACTIVE_ID')
                || $numberProfile->numberOsoNumberProfiles[0]->request_controller == true){
            return redirect()->back()->with('fail', 'Given number '. $request->phone_number .' is already active.');
        }
        else{
//            $current_date_time = Carbon::now()->toDateTimeString();
            $current_date_time = Carbon::now()->format('d-m-Y H:i:s');
//            $current_date_time = Carbon::now()->format('Y-m-d H:i:s');

            $request->request->add([
                'request_time' => $current_date_time
            ]);
//        dd($request->all());

            $jobRequest = JobRequest::create($request->all());
//            dd($jobRequest);

            //Update Number profile
            $numberProfile->numberOsoNumberProfiles[0]->is_queued = true;
            $numberProfile->numberOsoNumberProfiles[0]->request_controller = true;
            $numberProfile->push();

            return redirect()->back()->with('success', 'New Connection Request is submitted Successfully');
        }
    }
}
