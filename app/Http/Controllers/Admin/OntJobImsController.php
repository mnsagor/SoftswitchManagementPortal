<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OntJobImsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ont_job_im_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ontJobIms.index');
    }
}
