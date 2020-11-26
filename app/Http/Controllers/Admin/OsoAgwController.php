<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyOsoAgwRequest;
use App\Http\Requests\StoreOsoAgwRequest;
use App\Http\Requests\UpdateOsoAgwRequest;
use App\Models\Office;
use App\Models\OsoAgw;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class OsoAgwController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('oso_agw_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = OsoAgw::with(['office'])->select(sprintf('%s.*', (new OsoAgw)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'oso_agw_show';
                $editGate      = 'oso_agw_edit';
                $deleteGate    = 'oso_agw_delete';
                $crudRoutePart = 'oso-agws';

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
                return $row->is_active ? OsoAgw::IS_ACTIVE_RADIO[$row->is_active] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'office']);

            return $table->make(true);
        }

        $offices = Office::get();

        return view('admin.osoAgws.index', compact('offices'));
    }

    public function create()
    {
        abort_if(Gate::denies('oso_agw_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $offices = Office::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.osoAgws.create', compact('offices'));
    }

    public function store(StoreOsoAgwRequest $request)
    {
        $osoAgw = OsoAgw::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $osoAgw->id]);
        }

        return redirect()->route('admin.oso-agws.index');
    }

    public function edit(OsoAgw $osoAgw)
    {
        abort_if(Gate::denies('oso_agw_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $offices = Office::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $osoAgw->load('office');

        return view('admin.osoAgws.edit', compact('offices', 'osoAgw'));
    }

    public function update(UpdateOsoAgwRequest $request, OsoAgw $osoAgw)
    {
        $osoAgw->update($request->all());

        return redirect()->route('admin.oso-agws.index');
    }

    public function show(OsoAgw $osoAgw)
    {
        abort_if(Gate::denies('oso_agw_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $osoAgw->load('office', 'agwIpOsoNumbers', 'osoAgwIpOsoNumberProfiles');

        return view('admin.osoAgws.show', compact('osoAgw'));
    }

    public function destroy(OsoAgw $osoAgw)
    {
        abort_if(Gate::denies('oso_agw_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $osoAgw->delete();

        return back();
    }

    public function massDestroy(MassDestroyOsoAgwRequest $request)
    {
        OsoAgw::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('oso_agw_create') && Gate::denies('oso_agw_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new OsoAgw();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
