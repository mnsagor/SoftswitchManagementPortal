<?php

namespace App\Http\Controllers\Traits;

use App\Http\Utills\NumberUtil;
use App\Models\JobRequestStatus;
use App\Models\JobType;
use App\Models\NetworkType;
use App\Models\OsoNumber;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use SpreadsheetReader;

trait CsvImportTrait
{
    public function processCsvImport(Request $request)
    {
//        dd($request->all());

        try {
            $filename = $request->input('filename', false);
            $path     = storage_path('app/csv_import/' . $filename);

            $hasHeader = $request->input('hasHeader', false);

            $fields = $request->input('fields', false);
            $fields = array_flip(array_filter($fields));

            $modelName = $request->input('modelName', false);
            $model     = "App\Models\\" . $modelName;

            $reader = new SpreadsheetReader($path);
            $insert = [];

            foreach ($reader as $key => $row) {
                if ($hasHeader && $key == 0) {
                    continue;
                }

                $tmp = [];

                foreach ($fields as $header => $k) {
                    if (isset($row[$k])) {
                        $tmp[$header] = $row[$k];
                    }
                }

                if (count($tmp) > 0) {
                    $insert[] = $tmp;
                }
            }


            $for_insert = array_chunk($insert, 100);
//            dd($for_insert);

            foreach ($for_insert as $insert_item) {
                $model::insert($insert_item);
            }

            $rows  = count($insert);
            $table = Str::plural($modelName);

            File::delete($path);

            session()->flash('message', trans('global.app_imported_rows_to_table', ['rows' => $rows, 'table' => $table]));

            return redirect($request->input("redirect"));
        } catch (\Exception $ex) {
            throw $ex;
        }
    }

    public function parseCsvImport(Request $request)
    {
//        dd($request);
        $file = $request->file('csv_file');
        $request->validate([
            'csv_file' => 'mimes:csv,txt',
        ]);

        $path      = $file->path();
        $hasHeader = $request->input('header', false) ? true : false;

        $reader  = new SpreadsheetReader($path);
        $headers = $reader->current();
        $lines   = [];
        $lines[] = $reader->next();
        $lines[] = $reader->next();

        $filename = Str::random(10) . '.csv';
        $file->storeAs('csv_import', $filename);

        $modelName     = $request->input('model', false);
        $fullModelName = "App\Models\\" . $modelName;

        $model     = new $fullModelName();
        $fillables = $model->getFillable();

        $redirect = url()->previous();

        $routeName = 'admin.' . strtolower(Str::plural(Str::kebab($modelName))) . '.processCsvImport';
//        dd($routeName);
//        "admin.job-requests.processCsvImport"

        return view('csvImport.parseInput', compact('headers', 'filename', 'fillables', 'hasHeader', 'modelName', 'lines', 'redirect', 'routeName'));
    }

    public function processCsvImportFor171klCoreJob(Request $request){

        $jobRequestType = $request->input('jobRequestType');
//        dd($jobRequestType);

        $network_type_id = NetworkType::all()->where('id',config('global.171KL_NETWORK_ID'))->first();
        $job_type_id = JobType::all()->where('id', config('global.CORE_JOB'))->first();
        $job_request_status_id = JobRequestStatus::all()->where('id', config('global.REQUEST_STATUS_PENDING'))->first();


        try {
            $filename = $request->input('filename', false);
            $path     = storage_path('app/csv_import/' . $filename);

            $hasHeader = $request->input('hasHeader', false);

            $fields = $request->input('fields', false);
            $fields = array_flip(array_filter($fields));

            $modelName = $request->input('modelName', false);
            $model     = "App\Models\\" . $modelName;

            $reader = new SpreadsheetReader($path);
            $insert = [];
            switch ($jobRequestType) {
                case config('global.NEW_CONNECTION_REQUEST'):
//                    dd($jobRequestType);

                    foreach ($reader as $key => $row) {
                        if ($hasHeader && $key == 0) {
                            continue;
                        }
                        $tmp = [];

                        foreach ($fields as $header => $k) {
                            if (isset($row[$k])) {
                                $phoneNumber = OsoNumber::all()->where('number',$row[$k])->first();
                                $numberProfile = NumberUtil::getNumberProfile($row[$k],$network_type_id->id);

                                if($numberProfile->numberOsoNumberProfiles[0]->is_queued == false
                                    && $numberProfile->numberOsoNumberProfiles[0]->request_controller == false
                                    && $numberProfile->numberOsoNumberProfiles[0]->is_active == config('global.INACTIVE_ID')){

                                    $tmp["requested_by_id"] = Auth::user()->id;
                                    $tmp["request_type_id"] = config('global.NEW_CONNECTION_REQUEST');
                                    $tmp["number"] = $row[$k];
                                    $tmp["network_type_id"] = $network_type_id->id;
                                    $tmp["job_type_id"] = $job_type_id->id;
                                    $tmp["request_status_id"] = $job_request_status_id->id;
                                    $tmp["request_time"] = Carbon::now();
                                    $tmp["agw_ip"] = $numberProfile->agw_ip->ip;
                                    $tmp["tid"] = $phoneNumber->tid;
                                    $tmp["call_source_code_id"] = Auth::user()->call_source_code_id;

                                    $numberProfile->numberOsoNumberProfiles[0]->is_queued = true;
                                    $numberProfile->numberOsoNumberProfiles[0]->request_controller = true;
                                    $numberProfile->push();
                                }
                            }
                        }

                        if (count($tmp) > 0) {
                            $insert[] = $tmp;
                        }
                    }

                    break;

                case config('global.RE_CONNECTION_REQUEST'):
                    dd($jobRequestType);
                    break;
                case config('global.CASUAL_CONNECTION_REQUEST'):
                    dd($jobRequestType);
                    break;

                case config('global.CASUAL_DISCONNECTION_REQUEST'):
                    dd($jobRequestType);
                    break;
                case config('global.RESTORATION_REQUEST')  :
//                    dd($jobRequestType);
                    foreach ($reader as $key => $row) {
                        if ($hasHeader && $key == 0) {
                            continue;
                        }
                        $tmp = [];

                        foreach ($fields as $header => $k) {
                            if (isset($row[$k])) {
                                $phoneNumber = OsoNumber::all()->where('number',$row[$k])->first();
                                $numberProfile = NumberUtil::getNumberProfile($row[$k],$network_type_id->id);
//                                dd($numberProfile);

                                if($numberProfile->numberOsoNumberProfiles[0]->is_queued == false
                                    && $numberProfile->numberOsoNumberProfiles[0]->is_td == config('global.ACTIVE_ID')
                                    && NumberUtil::isActive171klNumber($row[$k])){

                                    $tmp["requested_by_id"] = Auth::user()->id;
                                    $tmp["request_type_id"] = config('global.RESTORATION_REQUEST');
                                    $tmp["number"] = $row[$k];
                                    $tmp["network_type_id"] = $network_type_id->id;
                                    $tmp["job_type_id"] = $job_type_id->id;
                                    $tmp["request_status_id"] = $job_request_status_id->id;
//                            $tmp["request_time"] = Carbon::now()->format('d-m-Y H:i:s');
                                    $tmp["request_time"] = Carbon::now();
                                    $tmp["agw_ip"] = $numberProfile->agw_ip->ip;
                                    $tmp["tid"] = $phoneNumber->tid;
                                    $tmp["call_source_code_id"] = Auth::user()->call_source_code_id;

                                    $numberProfile->numberOsoNumberProfiles[0]->is_queued = true;
                                    $numberProfile->push();
                                }
                            }
                        }

                        if (count($tmp) > 0) {
                            $insert[] = $tmp;
                        }
                    }
                    break;

                case config('global.TEMPORARY_DISCONNECTION_REQUEST')  :

                    foreach ($reader as $key => $row) {
                        if ($hasHeader && $key == 0) {
                            continue;
                        }
                        $tmp = [];

                        foreach ($fields as $header => $k) {
                            if (isset($row[$k])) {
                                $phoneNumber = OsoNumber::all()->where('number',$row[$k])->first();
                                $numberProfile = NumberUtil::getNumberProfile($row[$k],$network_type_id->id);
//                                dd($numberProfile);

                                if($numberProfile->numberOsoNumberProfiles[0]->is_queued == false
                                    && $numberProfile->numberOsoNumberProfiles[0]->is_td == config('global.INACTIVE_ID')
                                    && NumberUtil::isActive171klNumber($row[$k])){

                                    $tmp["requested_by_id"] = Auth::user()->id;
                                    $tmp["request_type_id"] = config('global.TEMPORARY_DISCONNECTION_REQUEST');
                                    $tmp["number"] = $row[$k];
                                    $tmp["network_type_id"] = $network_type_id->id;
                                    $tmp["job_type_id"] = $job_type_id->id;
                                    $tmp["request_status_id"] = $job_request_status_id->id;
//                            $tmp["request_time"] = Carbon::now()->format('d-m-Y H:i:s');
                                    $tmp["request_time"] = Carbon::now();
                                    $tmp["agw_ip"] = $numberProfile->agw_ip->ip;
                                    $tmp["tid"] = $phoneNumber->tid;
                                    $tmp["call_source_code_id"] = Auth::user()->call_source_code_id;

                                    $numberProfile->numberOsoNumberProfiles[0]->is_queued = true;
                                    $numberProfile->push();
                                }
                            }
                        }

                        if (count($tmp) > 0) {
                            $insert[] = $tmp;
                        }
                    }

                    break;

                case config('global.PERMANENT_CLOSE_REQUEST')  :
//                    dd($jobRequestType);
                    foreach ($reader as $key => $row) {
                        if ($hasHeader && $key == 0) {
                            continue;
                        }
                        $tmp = [];

                        foreach ($fields as $header => $k) {
                            if (isset($row[$k])) {
                                $phoneNumber = OsoNumber::all()->where('number',$row[$k])->first();
                                $numberProfile = NumberUtil::getNumberProfile($row[$k],$network_type_id->id);
//                                dd($numberProfile);

                                if($numberProfile->numberOsoNumberProfiles[0]->is_queued == false
//                                    && NumberUtil::isActive171klNumber($row[$k])
                                    && $numberProfile->numberOsoNumberProfiles[0]->is_active == config('global.ACTIVE_ID')){

                                    $tmp["requested_by_id"] = Auth::user()->id;
                                    $tmp["request_type_id"] = config('global.PERMANENT_CLOSE_REQUEST');
                                    $tmp["number"] = $row[$k];
                                    $tmp["network_type_id"] = $network_type_id->id;
                                    $tmp["job_type_id"] = $job_type_id->id;
                                    $tmp["request_status_id"] = $job_request_status_id->id;
//                            $tmp["request_time"] = Carbon::now()->format('d-m-Y H:i:s');
                                    $tmp["request_time"] = Carbon::now();
                                    $tmp["agw_ip"] = $numberProfile->agw_ip->ip;
                                    $tmp["tid"] = $phoneNumber->tid;
                                    $tmp["call_source_code_id"] = Auth::user()->call_source_code_id;

                                    $numberProfile->numberOsoNumberProfiles[0]->is_queued = true;
                                    $numberProfile->numberOsoNumberProfiles[0]->request_controller = false;
                                    $numberProfile->push();
                                }
                            }
                        }

                        if (count($tmp) > 0) {
                            $insert[] = $tmp;
                        }
                    }
                    break;

                case config('global.ISD_FACILITIES_REQUEST')  :
                    break;

                case config('global.NWD_FACILITIES_REQUEST')  :
                    break;

                case config('global.NON_NWD_FACILITIES_REQUEST')  :
                    break;

                case config('global.CENTREX_REQUEST')  :
                    break;

                case config('global.PBX_REQUEST')  :
                    break;
                case config('global.HOTLINE_REQUEST')  :
                    break;
                case config('global.OUTGOING_CALL_BARING_REQUEST')  :
                    break;

                case config('global.INCOMING_CALL_BARING_REQUEST')  :
                    break;

                case config('global.NUMBER_CHANGE_REQUEST'):
                    break;

                case config('global.CLOSING_FOR_SHIFTING_REQUEST')  :
                    break;

                case config('global.GREEN_NUMBER_REQUEST')  :
                    break;

                case config('global.CALL_FORWARDING_REQUEST')  :
                    break;

                case config('global.CALL_WAITING_REQUEST')  :
                    break;

                case config('global.DO_NOT_DISTURB_REQUEST')  :
                    break;

                case config('global.CALL_CONFERENCE_REQUEST')  :
                    break;

                case config('global.BW_LIST_REQUEST')  :
                    break;

                case config('global.ABSENTEE_SUBSCRIBER_REQUEST')  :
                    break;

                case config('global.MALICIOUS_CALL_TRACE_REQUEST')  :
                    break;

                case config('global.CONVERSION_REQUEST'):
                    break;

                case config('global.EISD_REQUEST')  :
                    break;

                case config('global.UNLOCK_REQUEST')  :
                    break;

                default:
                    break;
            }



            $for_insert = array_chunk($insert, 100);
//            dd($for_insert);

            foreach ($for_insert as $insert_item) {
                $model::insert($insert_item);
            }

            $rows  = count($insert);
            $table = Str::plural($modelName);

            File::delete($path);

            session()->flash('message', trans('global.app_imported_rows_to_table', ['rows' => $rows, 'table' => $table]));

            return redirect($request->input("redirect"));
        } catch (\Exception $ex) {
            throw $ex;
        }
    }

    public function parseCsvImportFor171klCoreJob(Request $request){
//        dd($request->all());

        $jobRequestType = $request->input('jobRequestType');
//        dd($jobRequestType);

        $file = $request->file('csv_file');
        $request->validate([
            'csv_file' => 'mimes:csv,txt',
        ]);

        $path      = $file->path();
        $hasHeader = $request->input('header', false) ? true : false;

        $reader  = new SpreadsheetReader($path);
        $headers = $reader->current();
        $lines   = [];
        $lines[] = $reader->next();
        $lines[] = $reader->next();

        $filename = Str::random(10) . '.csv';
        $file->storeAs('csv_import', $filename);

        $modelName     = $request->input('model', false);
        $fullModelName = "App\Models\\" . $modelName;

        $model     = new $fullModelName();
        $fillables = $model->getFillable();

        $redirect = url()->previous();
//        $routeName = 'admin.' . strtolower(Str::plural(Str::kebab($modelName))) . '.processCsvImport.171kl-coreJob';
        $routeName = 'admin.' . strtolower(Str::plural(Str::kebab($modelName))) . '.processCsvImport.171kl-coreJob';


        switch ($jobRequestType) {
            case config('global.NEW_CONNECTION_REQUEST'):

//                dd($routeName);
                return view('admin.171klNetwork.csvImport.parseNewConnectionInput', compact('headers', 'filename', 'fillables', 'hasHeader', 'modelName', 'lines', 'redirect', 'routeName'));
                break;

            case config('global.RE_CONNECTION_REQUEST'):
                dd($jobRequestType);
                break;
            case config('global.CASUAL_CONNECTION_REQUEST'):
                dd($jobRequestType);
                break;

            case config('global.CASUAL_DISCONNECTION_REQUEST'):
                dd($jobRequestType);
                break;
            case config('global.RESTORATION_REQUEST')  :
//                dd($jobRequestType);
                return view('admin.171klNetwork.csvImport.parseRestorationInput', compact('headers', 'filename', 'fillables', 'hasHeader', 'modelName', 'lines', 'redirect', 'routeName'));
                break;

            case config('global.TEMPORARY_DISCONNECTION_REQUEST')  :
//                $routeName = 'admin.' . strtolower(Str::plural(Str::kebab($modelName))) . '.processCsvImport.171kl-coreJob';
//                dd($routeName);
                return view('admin.171klNetwork.csvImport.parseTdInput', compact('headers', 'filename', 'fillables', 'hasHeader', 'modelName', 'lines', 'redirect', 'routeName'));

                break;

            case config('global.PERMANENT_CLOSE_REQUEST')  :
//                dd($jobRequestType);
                return view('admin.171klNetwork.csvImport.parsePcInput', compact('headers', 'filename', 'fillables', 'hasHeader', 'modelName', 'lines', 'redirect', 'routeName'));
                break;

            case config('global.ISD_FACILITIES_REQUEST')  :
                break;

            case config('global.NWD_FACILITIES_REQUEST')  :
                break;

            case config('global.NON_NWD_FACILITIES_REQUEST')  :
                break;

            case config('global.CENTREX_REQUEST')  :
                break;

            case config('global.PBX_REQUEST')  :
                break;
            case config('global.HOTLINE_REQUEST')  :
                break;
            case config('global.OUTGOING_CALL_BARING_REQUEST')  :
                break;

            case config('global.INCOMING_CALL_BARING_REQUEST')  :
                break;

            case config('global.NUMBER_CHANGE_REQUEST'):
                break;

            case config('global.CLOSING_FOR_SHIFTING_REQUEST')  :
                break;

            case config('global.GREEN_NUMBER_REQUEST')  :
                break;

            case config('global.CALL_FORWARDING_REQUEST')  :
                break;

            case config('global.CALL_WAITING_REQUEST')  :
                break;

            case config('global.DO_NOT_DISTURB_REQUEST')  :
                break;

            case config('global.CALL_CONFERENCE_REQUEST')  :
                break;

            case config('global.BW_LIST_REQUEST')  :
                break;

            case config('global.ABSENTEE_SUBSCRIBER_REQUEST')  :
                break;

            case config('global.MALICIOUS_CALL_TRACE_REQUEST')  :
                break;

            case config('global.CONVERSION_REQUEST'):
                break;

            case config('global.EISD_REQUEST')  :
                break;

            case config('global.UNLOCK_REQUEST')  :
                break;

            default:
                break;
        }


//        dd($routeName);
//        admin.job-requests.processTdCsvImport


    }
}
