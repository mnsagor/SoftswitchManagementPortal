<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTndpImsAgwRequest;
use App\Http\Requests\StoreTndpImsAgwRequest;
use App\Http\Requests\UpdateTndpImsAgwRequest;
use App\Models\Office;
use App\Models\TndpImsAgw;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class TndpImsAgwController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('tndp_ims_agw_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = TndpImsAgw::with(['office'])->select(sprintf('%s.*', (new TndpImsAgw)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'tndp_ims_agw_show';
                $editGate      = 'tndp_ims_agw_edit';
                $deleteGate    = 'tndp_ims_agw_delete';
                $crudRoutePart = 'tndp-ims-agws';

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
            $table->editColumn('ip', function ($row) {
                return $row->ip ? $row->ip : "";
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : "";
            });
            $table->addColumn('office_name', function ($row) {
                return $row->office ? $row->office->name : '';
            });

            $table->editColumn('is_active', function ($row) {
                return $row->is_active ? TndpImsAgw::IS_ACTIVE_RADIO[$row->is_active] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'office']);

            return $table->make(true);
        }

        $offices = Office::get();

        return view('admin.tndpImsAgws.index', compact('offices'));
    }

    public function create()
    {
        abort_if(Gate::denies('tndp_ims_agw_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $offices = Office::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.tndpImsAgws.create', compact('offices'));
    }

    public function store(StoreTndpImsAgwRequest $request)
    {
        $tndpImsAgw = TndpImsAgw::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $tndpImsAgw->id]);
        }

        return redirect()->route('admin.tndp-ims-agws.index');
    }

    public function edit(TndpImsAgw $tndpImsAgw)
    {
        abort_if(Gate::denies('tndp_ims_agw_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $offices = Office::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tndpImsAgw->load('office');

        return view('admin.tndpImsAgws.edit', compact('offices', 'tndpImsAgw'));
    }

    public function update(UpdateTndpImsAgwRequest $request, TndpImsAgw $tndpImsAgw)
    {
        $tndpImsAgw->update($request->all());

        return redirect()->route('admin.tndp-ims-agws.index');
    }

    public function show(TndpImsAgw $tndpImsAgw)
    {
        abort_if(Gate::denies('tndp_ims_agw_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tndpImsAgw->load('office');

        return view('admin.tndpImsAgws.show', compact('tndpImsAgw'));
    }

    public function destroy(TndpImsAgw $tndpImsAgw)
    {
        abort_if(Gate::denies('tndp_ims_agw_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tndpImsAgw->delete();

        return back();
    }

    public function massDestroy(MassDestroyTndpImsAgwRequest $request)
    {
        TndpImsAgw::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('tndp_ims_agw_create') && Gate::denies('tndp_ims_agw_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new TndpImsAgw();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
