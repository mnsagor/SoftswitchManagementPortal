@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header">
                {{"Status Report"}}
            </div>

            <div class="card-body">

                <div class="row">
                    {{--        Active Subscriber Report--}}
                    <div class="col-lg-3">
                        <div class="cat__core__widget">
                            <a href="{{route('admin.171klNetwork.active-subscribers.report')}}">
                                <div class="cat__core__step cat__core__step--success">
                <span class="cat__core__step__digit">
                    <i class="icmn-phone"><!-- --></i>
                </span>
                                    <div class="cat__core__step__desc">
                                        <span class="cat__core__step__title">Active Subscribers</span>
                                        <p>Active Subscribers Report</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    {{--        Free Numbers Reports--}}
                    <div class="col-lg-3">
                        <div class="cat__core__widget">
                            <a href="{{route('admin.171klnetwork.corejob.request', config('global.RE_CONNECTION_REQUEST'))}}">
                                <div class="cat__core__step cat__core__step--primary">
                <span class="cat__core__step__digit">
                    <i class="icmn-share"><!-- --></i>
                </span>
                                    <div class="cat__core__step__desc">
                                        <span class="cat__core__step__title">Free Numbers</span>
                                        <p>Free Numbers Report</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    {{--        TD Reports--}}
                    <div class="col-lg-3">
                        <div class="cat__core__widget">
                            <a href="{{route('admin.171klnetwork.corejob.request', config('global.CASUAL_CONNECTION_REQUEST'))}}">
                                <div class="cat__core__step cat__core__step--danger">
                <span class="cat__core__step__digit">
                    <i class="icmn-enter"><!-- --></i>
                </span>
                                    <div class="cat__core__step__desc">
                                        <span class="cat__core__step__title">Temporary Disconnected Numbers</span>
                                        <p>Temporary Disconnected Numbers Report</p>
                                    </div>
                                </div>
                            </a>

                        </div>
                    </div>

                </div>

            </div>
        </div>

        <div class="card">
            <div class="card-header">
                {{"Facilities Report"}}
            </div>

            <div class="card-body">

                <div class="row">
                    {{--        new connection request--}}
                    <div class="col-lg-3">
                        <div class="cat__core__widget">
                            <a href="{{route('admin.171klnetwork.corejob.request', config('global.NEW_CONNECTION_REQUEST'))}}">
                                <div class="cat__core__step cat__core__step--secondary">
                <span class="cat__core__step__digit">
                    <i class="icmn-phone"><!-- --></i>
                </span>
                                    <div class="cat__core__step__desc">
                                        <span class="cat__core__step__title">ISD</span>
                                        <p>ISD Report</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    {{--        ReConnection Request--}}
                    <div class="col-lg-3">
                        <div class="cat__core__widget">
                            <a href="{{route('admin.171klnetwork.corejob.request', config('global.RE_CONNECTION_REQUEST'))}}">
                                <div class="cat__core__step cat__core__step--warning">
                <span class="cat__core__step__digit">
                    <i class="icmn-share"><!-- --></i>
                </span>
                                    <div class="cat__core__step__desc">
                                        <span class="cat__core__step__title">EISD</span>
                                        <p>EISD Report</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    {{--        Casual Connection--}}
                    <div class="col-lg-3">
                        <div class="cat__core__widget">
                            <a href="{{route('admin.171klnetwork.corejob.request', config('global.CASUAL_CONNECTION_REQUEST'))}}">
                                <div class="cat__core__step cat__core__step--default">
                <span class="cat__core__step__digit">
                    <i class="icmn-enter"><!-- --></i>
                </span>
                                    <div class="cat__core__step__desc">
                                        <span class="cat__core__step__title">PBX</span>
                                        <p>PBX Report</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
