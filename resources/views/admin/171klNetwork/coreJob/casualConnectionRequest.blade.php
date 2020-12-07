@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ "Casual Connection Request" }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.171klnetwork.corejob.store-casual-connection.request") }}" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    {{--                    Phone Number input--}}
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="required" for="phone_number">{{ "Phone Number" }}</label>
                            <input class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', '') }}" required placeholder="5XXXXXXX">
                            @if($errors->has('phone_number'))
                                <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="required" for="agw_ip">{{ "AGW IP Address" }}</label>
                            <input class="form-control {{ $errors->has('agw_ip') ? 'is-invalid' : '' }}" type="ip" name="agw_ip" id="agw_ip" value="{{ old('agw_ip', '') }}"
                                   required autofocus placeholder="10.X.X.X">
                            @if($errors->has('agw_ip'))
                                <span class="text-danger">{{ $errors->first('agw_ip') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="required" for="tid">{{ "TID" }}</label>
                            <input class="form-control {{ $errors->has('tid') ? 'is-invalid' : '' }}" type="text" name="tid" id="tid" value="{{ old('tid', '') }}"
                                   required autofocus placeholder="XXXX">
                            @if($errors->has('tid'))
                                <span class="text-danger">{{ $errors->first('tid') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="note">{{ "Reference Note" }}</label>
                    <textarea class="form-control ckeditor {{ $errors->has('note') ? 'is-invalid' : '' }}" placeholder="{{"Reference Note (Optional)"}}" name="note" id="note">{!! old('note') !!}</textarea>
                    @if($errors->has('note'))
                        <span class="text-danger">{{ $errors->first('note') }}</span>
                    @endif
                </div>

                <input type="hidden" id="requested_by" name="requested_by" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">
                <input type="hidden" id="request_type" name="request_type" value="{{ config('global.CASUAL_CONNECTION_REQUEST') }}">
                <input type="hidden" id="network_type" name="network_type" value="{{ config('global.171KL_NETWORK') }}">
                <input type="hidden" id="network_sub_type" name="network_sub_type" value="{{ config('global.CORE_JOB') }}">
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>


        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script>
        // Initialize InputMask
        $( document ).ready(function() {
            $("#ip").inputmask();
        });

    </script>
@endsection

