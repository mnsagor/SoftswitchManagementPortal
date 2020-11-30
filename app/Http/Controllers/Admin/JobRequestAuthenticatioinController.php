<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JobRequestAuthenticatioinController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('job_request_authenticatioin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.jobRequestAuthenticatioins.index');
    }
}
