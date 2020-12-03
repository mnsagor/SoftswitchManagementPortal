<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\CallSourceCode;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\Office;
use App\Models\Role;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::with(['payroll_emp', 'designation', 'roles', 'offices', 'call_source_code'])->get();

        $employees = Employee::get();

        $designations = Designation::get();

        $roles = Role::get();

        $offices = Office::get();

        $call_source_codes = CallSourceCode::get();

        return view('admin.users.index', compact('users', 'employees', 'designations', 'roles', 'offices', 'call_source_codes'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $payroll_emps = Employee::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $designations = Designation::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $roles = Role::all()->pluck('title', 'id');

        $offices = Office::all()->pluck('name', 'id');

        $call_source_codes = CallSourceCode::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.users.create', compact('payroll_emps', 'designations', 'roles', 'offices', 'call_source_codes'));
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());
        $user->roles()->sync($request->input('roles', []));
        $user->offices()->sync($request->input('offices', []));

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $payroll_emps = Employee::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $designations = Designation::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $roles = Role::all()->pluck('title', 'id');

        $offices = Office::all()->pluck('name', 'id');

        $call_source_codes = CallSourceCode::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $user->load('payroll_emp', 'designation', 'roles', 'offices', 'call_source_code');

        return view('admin.users.edit', compact('payroll_emps', 'designations', 'roles', 'offices', 'call_source_codes', 'user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));
        $user->offices()->sync($request->input('offices', []));

        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('payroll_emp', 'designation', 'roles', 'offices', 'call_source_code', 'requestedByJobRequests', 'verifiedByJobRequests', 'approvedByJobRequests', 'rejectedByJobRequests', 'requestedByOltJobRequests', 'verifiedByOltJobRequests', 'approvedByOltJobRequests', 'rejectedByOltJobRequests', 'userUserAlerts');

        return view('admin.users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
