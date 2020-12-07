@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ "Casual Disconnection Request" }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.171klnetwork.corejob.store-casual-disconnection.request") }}" enctype="multipart/form-data">
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

                </div>

                <input type="hidden" id="requested_by" name="requested_by" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">
                <input type="hidden" id="request_type" name="request_type" value="{{ config('global.CASUAL_DISCONNECTION_REQUEST') }}">
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

