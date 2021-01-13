<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CallSourceCode;
use App\Models\JobRequest;
use App\Models\JobRequestStatus;
use App\Models\JobType;
use App\Models\NetworkType;
use App\Models\RequestType;
use App\Models\User;
use Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class MyJobRequestsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('my_job_request_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users =User::find(Auth::id());
//        dd($users->id);

        if ($request->ajax()) {

            $query = JobRequest::with(['network_type', 'job_type', 'request_type', 'request_status', 'call_source_code', 'requested_by', 'verified_by', 'approved_by', 'rejected_by'])
                ->select(sprintf('%s.*', (new JobRequest)->table))->where('requested_by_id',$users->id);

            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'my_job_request_show';
//                $editGate      = 'job_request_edit';
//                $deleteGate    = 'job_request_delete';
                $crudRoutePart = 'my-job-requests';

                return view('admin.jobRequestManagement.myJobRequests.datatablesActions', compact(
                    'viewGate',
//                    'editGate',
//                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->addColumn('network_type_name', function ($row) {
                return $row->network_type ? $row->network_type->name : '';
            });

            $table->addColumn('job_type_name', function ($row) {
                return $row->job_type ? $row->job_type->name : '';
            });

            $table->addColumn('request_type_name', function ($row) {
                return $row->request_type ? $row->request_type->name : '';
            });

            $table->addColumn('request_status_name', function ($row) {
                return $row->request_status ? $row->request_status->name : '';
            });

            $table->editColumn('number', function ($row) {
                return $row->number ? $row->number : "";
            });
            $table->editColumn('agw_ip', function ($row) {
                return $row->agw_ip ? $row->agw_ip : "";
            });
            $table->editColumn('tid', function ($row) {
                return $row->tid ? $row->tid : "";
            });
            $table->addColumn('call_source_code_name', function ($row) {
                return $row->call_source_code ? $row->call_source_code->name : '';
            });

            $table->addColumn('requested_by_name', function ($row) {
                return $row->requested_by ? $row->requested_by->name : '';
            });

            $table->addColumn('verified_by_name', function ($row) {
                return $row->verified_by ? $row->verified_by->name : '';
            });

            $table->addColumn('approved_by_name', function ($row) {
                return $row->approved_by ? $row->approved_by->name : '';
            });

            $table->addColumn('rejected_by_name', function ($row) {
                return $row->rejected_by ? $row->rejected_by->name : '';
            });

            $table->editColumn('script', function ($row) {
                return $row->script ? $row->script : "";
            });
            $table->editColumn('is_force_request', function ($row) {
                return $row->is_force_request ? JobRequest::IS_FORCE_REQUEST_SELECT[$row->is_force_request] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'network_type', 'job_type', 'request_type', 'request_status', 'call_source_code', 'requested_by', 'verified_by', 'approved_by', 'rejected_by']);

            return $table->make(true);
        }

        $network_types        = NetworkType::get();
        $job_types            = JobType::get();
        $request_types        = RequestType::get();
        $job_request_statuses = JobRequestStatus::get();
        $call_source_codes    = CallSourceCode::get();
        $users                = User::get();
        $users                = User::get();
        $users                = User::get();
        $users                = User::get();

//        return view('admin.jobRequests.index', compact('network_types', 'job_types', 'request_types', 'job_request_statuses', 'call_source_codes', 'users', 'users', 'users', 'users'));



        return view('admin.jobRequestManagement.myJobRequests.index', compact('network_types', 'job_types', 'request_types', 'job_request_statuses', 'call_source_codes', 'users', 'users', 'users', 'users'));
    }

    public function show(JobRequest $jobRequest)
    {
        abort_if(Gate::denies('my_job_request_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobRequest->load('network_type', 'job_type', 'request_type', 'request_status', 'call_source_code', 'requested_by', 'verified_by', 'approved_by', 'rejected_by');

        return view('admin.jobRequests.show', compact('jobRequest'));
    }
}
