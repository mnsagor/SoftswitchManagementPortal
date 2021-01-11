<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobRequest;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class CoreJobOsoController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('core_job_oso_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobRequests = JobRequest::all()
            ->where('request_status_id',2);

        $jobRequests->load('network_type', 'job_type', 'request_type','request_status','requested_by','approved_by','verified_by');

//        return view('admin.coreJobOsos.index');
        return view('admin.scripts.coreJob171klNetwork.index',compact('jobRequests'));
    }
}
