<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyEmplpyeeRequest;
use App\Http\Requests\StoreEmplpyeeRequest;
use App\Http\Requests\UpdateEmplpyeeRequest;
use App\Models\Designation;
use App\Models\Emplpyee;
use App\Models\Office;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class EmplpyeeController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('emplpyee_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Emplpyee::with(['designation', 'office'])->select(sprintf('%s.*', (new Emplpyee)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'emplpyee_show';
                $editGate      = 'emplpyee_edit';
                $deleteGate    = 'emplpyee_delete';
                $crudRoutePart = 'emplpyees';

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
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : "";
            });
            $table->addColumn('designation_name', function ($row) {
                return $row->designation ? $row->designation->name : '';
            });

            $table->addColumn('office_name', function ($row) {
                return $row->office ? $row->office->name : '';
            });

            $table->editColumn('mobile', function ($row) {
                return $row->mobile ? $row->mobile : "";
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : "";
            });
            $table->editColumn('payroll_emp', function ($row) {
                return $row->payroll_emp ? $row->payroll_emp : "";
            });
            $table->editColumn('is_active', function ($row) {
                return $row->is_active ? Emplpyee::IS_ACTIVE_RADIO[$row->is_active] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'designation', 'office']);

            return $table->make(true);
        }

        $designations = Designation::get();
        $offices      = Office::get();

        return view('admin.emplpyees.index', compact('designations', 'offices'));
    }

    public function create()
    {
        abort_if(Gate::denies('emplpyee_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $designations = Designation::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $offices = Office::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.emplpyees.create', compact('designations', 'offices'));
    }

    public function store(StoreEmplpyeeRequest $request)
    {
        $emplpyee = Emplpyee::create($request->all());

        return redirect()->route('admin.emplpyees.index');
    }

    public function edit(Emplpyee $emplpyee)
    {
        abort_if(Gate::denies('emplpyee_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $designations = Designation::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $offices = Office::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $emplpyee->load('designation', 'office');

        return view('admin.emplpyees.edit', compact('designations', 'offices', 'emplpyee'));
    }

    public function update(UpdateEmplpyeeRequest $request, Emplpyee $emplpyee)
    {
        $emplpyee->update($request->all());

        return redirect()->route('admin.emplpyees.index');
    }

    public function show(Emplpyee $emplpyee)
    {
        abort_if(Gate::denies('emplpyee_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $emplpyee->load('designation', 'office', 'employeeUsers');

        return view('admin.emplpyees.show', compact('emplpyee'));
    }

    public function destroy(Emplpyee $emplpyee)
    {
        abort_if(Gate::denies('emplpyee_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $emplpyee->delete();

        return back();
    }

    public function massDestroy(MassDestroyEmplpyeeRequest $request)
    {
        Emplpyee::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
