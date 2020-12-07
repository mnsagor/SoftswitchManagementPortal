@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="row">
            {{--        new connection request--}}
            <div class="col-lg-3">
                <div class="cat__core__widget">
                    <a href="{{route('admin.171klnetwork.corejob.request', config('global.NEW_CONNECTION_REQUEST'))}}">
                        <div class="cat__core__step cat__core__step--success">
                <span class="cat__core__step__digit">
                    <i class="icmn-phone"><!-- --></i>
                </span>
                            <div class="cat__core__step__desc">
                                <span class="cat__core__step__title">New Connection</span>
                                <p>Send New Connection Request</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            {{--        ReConnection Request--}}
            {{--            <div class="col-lg-3">--}}
            {{--                <div class="cat__core__widget">--}}
            {{--                    <a href="{{route('admin.171klnetwork.corejob.request', config('global.RE_CONNECTION_REQUEST'))}}">--}}
            {{--                        <div class="cat__core__step cat__core__step--primary">--}}
            {{--                <span class="cat__core__step__digit">--}}
            {{--                    <i class="icmn-share"><!-- --></i>--}}
            {{--                </span>--}}
            {{--                            <div class="cat__core__step__desc">--}}
            {{--                                <span class="cat__core__step__title">Re-Connection</span>--}}
            {{--                                <p>Send Re-Connection Request</p>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </a>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--            --}}{{--        Casual Connection--}}
            {{--            <div class="col-lg-3">--}}
            {{--                <div class="cat__core__widget">--}}
            {{--                    <a href="{{route('admin.171klnetwork.corejob.request', config('global.CASUAL_CONNECTION_REQUEST'))}}">--}}
            {{--                        <div class="cat__core__step cat__core__step--danger">--}}
            {{--                <span class="cat__core__step__digit">--}}
            {{--                    <i class="icmn-enter"><!-- --></i>--}}
            {{--                </span>--}}
            {{--                            <div class="cat__core__step__desc">--}}
            {{--                                <span class="cat__core__step__title">Casual Connection</span>--}}
            {{--                                <p>Send Casual Connection Request</p>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </a>--}}

            {{--                </div>--}}
            {{--            </div>--}}
            {{--            --}}{{--        Casual Disconnection--}}
            {{--            <div class="col-lg-3">--}}
            {{--                <div class="cat__core__widget">--}}
            {{--                    <a href="{{route('admin.171klnetwork.corejob.request', config('global.CASUAL_DISCONNECTION_REQUEST'))}}">--}}
            {{--                        <div class="cat__core__step cat__core__step--default">--}}
            {{--                <span class="cat__core__step__digit">--}}
            {{--                    <i class="icmn-price-tags"><!-- --></i>--}}
            {{--                </span>--}}
            {{--                            <div class="cat__core__step__desc">--}}
            {{--                                <span class="cat__core__step__title">Casual Disconnection</span>--}}
            {{--                                <p>Send Casual Disconnection Request</p>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </a>--}}
            {{--                </div>--}}
            {{--            </div>--}}

            {{--            --}}{{--            Restoration Request--}}
            {{--            <div class="col-lg-3">--}}
            {{--                <div class="cat__core__widget">--}}
            {{--                    <a href="{{route('admin.171klnetwork.corejob.request', config('global.RESTORATION_REQUEST'))}}">--}}
            {{--                        <div class="cat__core__step cat__core__step--primary">--}}
            {{--                <span class="cat__core__step__digit">--}}
            {{--                    <i class="icmn-phone-hang-up"><!-- --></i>--}}
            {{--                </span>--}}
            {{--                            <div class="cat__core__step__desc">--}}
            {{--                                <span class="cat__core__step__title">Restoration</span>--}}
            {{--                                <p>Send Restoration Request</p>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </a>--}}
            {{--                </div>--}}
            {{--            </div>--}}


            {{--            --}}{{--        Temporary Disconnection request--}}
            {{--            <div class="col-lg-3">--}}
            {{--                <div class="cat__core__widget">--}}
            {{--                    <a href="{{route('admin.171klnetwork.corejob.request', config('global.TEMPORARY_DISCONNECTION_REQUEST'))}}">--}}
            {{--                        <div class="cat__core__step cat__core__step--success">--}}
            {{--                <span class="cat__core__step__digit">--}}
            {{--                    <i class="icmn-phone"><!-- --></i>--}}
            {{--                </span>--}}
            {{--                            <div class="cat__core__step__desc">--}}
            {{--                                <span class="cat__core__step__title">Temporary Disconnection</span>--}}
            {{--                                <p>Send Temporary Disconnection Request</p>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </a>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--        Permanent Close Request--}}
            {{--            <div class="col-lg-3">--}}
            {{--                <div class="cat__core__widget">--}}
            {{--                    <a href="{{route('admin.171klnetwork.corejob.request', config('global.PERMANENT_CLOSE_REQUEST'))}}">--}}
            {{--                        <div class="cat__core__step cat__core__step--primary">--}}
            {{--                <span class="cat__core__step__digit">--}}
            {{--                    <i class="icmn-share"><!-- --></i>--}}
            {{--                </span>--}}
            {{--                            <div class="cat__core__step__desc">--}}
            {{--                                <span class="cat__core__step__title">Permanent Close</span>--}}
            {{--                                <p>Send Permanent Close Request</p>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </a>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--            --}}{{--        ISD Facilities Connection Request--}}
            {{--            <div class="col-lg-3">--}}
            {{--                <div class="cat__core__widget">--}}
            {{--                    <a href="">--}}
            {{--                        <div class="cat__core__step cat__core__step--active">--}}
            {{--                <span class="cat__core__step__digit">--}}
            {{--                    <i class="icmn-enter"><!-- --></i>--}}
            {{--                </span>--}}
            {{--                            <div class="cat__core__step__desc">--}}
            {{--                                <span class="cat__core__step__title">ISD Facilities</span>--}}
            {{--                                <p>Send ISD Facilities Request</p>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </a>--}}

            {{--                </div>--}}
            {{--            </div>--}}
            {{--            --}}{{--        NWD Facilities --}}
            {{--            <div class="col-lg-3">--}}
            {{--                <div class="cat__core__widget">--}}
            {{--                    <a href="">--}}
            {{--                        <div class="cat__core__step cat__core__step--active">--}}
            {{--                <span class="cat__core__step__digit">--}}
            {{--                    <i class="icmn-price-tags"><!-- --></i>--}}
            {{--                </span>--}}
            {{--                            <div class="cat__core__step__desc">--}}
            {{--                                <span class="cat__core__step__title">NWD Facilities</span>--}}
            {{--                                <p>Send NWD Facilities Request</p>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </a>--}}
            {{--                </div>--}}
            {{--            </div>--}}

            {{--            --}}{{--        Non NWD Facilities --}}
            {{--            <div class="col-lg-3">--}}
            {{--                <div class="cat__core__widget">--}}
            {{--                    <a href="">--}}
            {{--                        --}}{{--                        <div class="cat__core__step cat__core__step--primary">--}}
            {{--                        <div class="cat__core__step cat__core__step--active">--}}
            {{--                <span class="cat__core__step__digit">--}}
            {{--                    <i class="icmn-phone-hang-up"><!-- --></i>--}}
            {{--                </span>--}}
            {{--                            <div class="cat__core__step__desc">--}}
            {{--                                <span class="cat__core__step__title">Non NWD Facilities</span>--}}
            {{--                                <p>Send Non NWD Facilities Request</p>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </a>--}}
            {{--                </div>--}}
            {{--            </div>--}}

            {{--            <div class="col-lg-3">--}}
            {{--                <div class="cat__core__widget">--}}
            {{--                    <a href="">--}}
            {{--                        --}}{{--                        <div class="cat__core__step cat__core__step--primary">--}}
            {{--                        <div class="cat__core__step cat__core__step--active">--}}
            {{--                <span class="cat__core__step__digit">--}}
            {{--                    <i class="icmn-share"><!-- --></i>--}}
            {{--                </span>--}}
            {{--                            <div class="cat__core__step__desc">--}}
            {{--                                <span class="cat__core__step__title">Centrex</span>--}}
            {{--                                <p>Send Centrex Request</p>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </a>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--            --}}{{--        PBX Connection--}}
            {{--            <div class="col-lg-3">--}}
            {{--                <div class="cat__core__widget">--}}
            {{--                    <a href="">--}}
            {{--                        --}}{{--                        <div class="cat__core__step cat__core__step--danger">--}}
            {{--                        <div class="cat__core__step cat__core__step--active">--}}
            {{--                <span class="cat__core__step__digit">--}}
            {{--                    <i class="icmn-enter"><!-- --></i>--}}
            {{--                </span>--}}
            {{--                            <div class="cat__core__step__desc">--}}
            {{--                                <span class="cat__core__step__title">PBX</span>--}}
            {{--                                <p>Send PBX Request</p>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </a>--}}

            {{--                </div>--}}
            {{--            </div>--}}
            {{--            --}}{{-- Hotline--}}
            {{--            <div class="col-lg-3">--}}
            {{--                <div class="cat__core__widget">--}}
            {{--                    <a href="">--}}
            {{--                        --}}{{--                        <div class="cat__core__step cat__core__step--default">--}}
            {{--                        <div class="cat__core__step cat__core__step--active">--}}
            {{--                <span class="cat__core__step__digit">--}}
            {{--                    <i class="icmn-price-tags"><!-- --></i>--}}
            {{--                </span>--}}
            {{--                            <div class="cat__core__step__desc">--}}
            {{--                                <span class="cat__core__step__title">Hot-Line</span>--}}
            {{--                                <p>Send Hot-Line Connection Request</p>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </a>--}}
            {{--                </div>--}}
            {{--            </div>--}}


            {{--            --}}{{--            Outgoing Call Baring Request--}}
            {{--            <div class="col-lg-3">--}}
            {{--                <div class="cat__core__widget">--}}
            {{--                    <a href="">--}}
            {{--                        --}}{{--                        <div class="cat__core__step cat__core__step--primary">--}}
            {{--                        <div class="cat__core__step cat__core__step--active">--}}
            {{--                <span class="cat__core__step__digit">--}}
            {{--                    <i class="icmn-phone-hang-up"><!-- --></i>--}}
            {{--                </span>--}}
            {{--                            <div class="cat__core__step__desc">--}}
            {{--                                <span class="cat__core__step__title">Outgoing Call Baring</span>--}}
            {{--                                <p>Outgoing Call Baring Request</p>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </a>--}}
            {{--                </div>--}}
            {{--            </div>--}}

            {{--            --}}{{--        Incoming Call Baring request--}}
            {{--            <div class="col-lg-3">--}}
            {{--                <div class="cat__core__widget">--}}
            {{--                    --}}{{--                    <a href="{{route('admin.171klnetwork.corejob.request', config('global.NEW_CONNECTION_REQUEST'))}}">--}}
            {{--                    --}}{{--                        <div class="cat__core__step cat__core__step--success">--}}
            {{--                    <div class="cat__core__step cat__core__step--active">--}}
            {{--                <span class="cat__core__step__digit">--}}
            {{--                    <i class="icmn-phone"><!-- --></i>--}}
            {{--                </span>--}}
            {{--                        <div class="cat__core__step__desc">--}}
            {{--                            <span class="cat__core__step__title">Incoming Call Baring</span>--}}
            {{--                            <p>Send Incoming Call Baring Request</p>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                    </a>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--            --}}{{--        Number Change Request--}}
            {{--            <div class="col-lg-3">--}}
            {{--                <div class="cat__core__widget">--}}
            {{--                    <a href="{{route('admin.171klnetwork.corejob.request', config('global.NUMBER_CHANGE_REQUEST'))}}">--}}
            {{--                        <div class="cat__core__step cat__core__step--primary">--}}
            {{--                <span class="cat__core__step__digit">--}}
            {{--                    <i class="icmn-share"><!-- --></i>--}}
            {{--                </span>--}}
            {{--                            <div class="cat__core__step__desc">--}}
            {{--                                <span class="cat__core__step__title">Number Change</span>--}}
            {{--                                <p>Send Number Change Request</p>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </a>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--            --}}{{--        Closing for Shifting Connection--}}
            {{--            <div class="col-lg-3">--}}
            {{--                <div class="cat__core__widget">--}}
            {{--                    <a href="{{route('admin.171klnetwork.corejob.request', config('global.CLOSING_FOR_SHIFTING_REQUEST'))}}">--}}
            {{--                        <div class="cat__core__step cat__core__step--danger">--}}
            {{--                <span class="cat__core__step__digit">--}}
            {{--                    <i class="icmn-enter"><!-- --></i>--}}
            {{--                </span>--}}
            {{--                            <div class="cat__core__step__desc">--}}
            {{--                                <span class="cat__core__step__title">Closing for Shifting</span>--}}
            {{--                                <p>Send Closing for Shifting Request</p>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </a>--}}

            {{--                </div>--}}
            {{--            </div>--}}
            {{--            --}}{{--        Green Number--}}
            {{--            <div class="col-lg-3">--}}
            {{--                <div class="cat__core__widget">--}}
            {{--                    <a href="">--}}
            {{--                        --}}{{--                        <div class="cat__core__step cat__core__step--default">--}}
            {{--                        <div class="cat__core__step cat__core__step--active">--}}
            {{--                <span class="cat__core__step__digit">--}}
            {{--                    <i class="icmn-price-tags"><!-- --></i>--}}
            {{--                </span>--}}
            {{--                            <div class="cat__core__step__desc">--}}
            {{--                                <span class="cat__core__step__title">Green Number</span>--}}
            {{--                                <p>Send Green Number Connection Request</p>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </a>--}}
            {{--                </div>--}}
            {{--            </div>--}}

            {{--            --}}{{--            Call Forwarding Request--}}
            {{--            <div class="col-lg-3">--}}
            {{--                <div class="cat__core__widget">--}}
            {{--                    <a href="">--}}
            {{--                        --}}{{--                        <div class="cat__core__step cat__core__step--primary">--}}
            {{--                        <div class="cat__core__step cat__core__step--active">--}}
            {{--                <span class="cat__core__step__digit">--}}
            {{--                    <i class="icmn-phone-hang-up"><!-- --></i>--}}
            {{--                </span>--}}
            {{--                            <div class="cat__core__step__desc">--}}
            {{--                                <span class="cat__core__step__title">Call Forwarding</span>--}}
            {{--                                <p>Send Call Forwarding Request</p>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </a>--}}
            {{--                </div>--}}
            {{--            </div>--}}

            {{--            --}}{{--        Call Waiting request--}}
            {{--            <div class="col-lg-3">--}}
            {{--                <div class="cat__core__widget">--}}
            {{--                    <a href="{{route('admin.171klnetwork.corejob.request', config('global.NEW_CONNECTION_REQUEST'))}}">--}}
            {{--                        --}}{{--                        <div class="cat__core__step cat__core__step--success">--}}
            {{--                        <div class="cat__core__step cat__core__step--active">--}}
            {{--                <span class="cat__core__step__digit">--}}
            {{--                    <i class="icmn-phone"><!-- --></i>--}}
            {{--                </span>--}}
            {{--                            <div class="cat__core__step__desc">--}}
            {{--                                <span class="cat__core__step__title">Call Waiting</span>--}}
            {{--                                <p>Send Call Waiting Request</p>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </a>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--            --}}{{--        Do not Disturb Request--}}
            {{--            <div class="col-lg-3">--}}
            {{--                <div class="cat__core__widget">--}}
            {{--                    <a href="">--}}
            {{--                        --}}{{--                        <div class="cat__core__step cat__core__step--primary">--}}
            {{--                        <div class="cat__core__step cat__core__step--active">--}}
            {{--                <span class="cat__core__step__digit">--}}
            {{--                    <i class="icmn-share"><!-- --></i>--}}
            {{--                </span>--}}
            {{--                            <div class="cat__core__step__desc">--}}
            {{--                                <span class="cat__core__step__title">Do Not Disturb</span>--}}
            {{--                                <p>Send Do Not Disturb Request</p>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </a>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--            --}}{{--        Call Conference Connection--}}
            {{--            <div class="col-lg-3">--}}
            {{--                <div class="cat__core__widget">--}}
            {{--                    <a href="">--}}
            {{--                        --}}{{--                        <div class="cat__core__step cat__core__step--danger">--}}
            {{--                        <div class="cat__core__step cat__core__step--active">--}}
            {{--                <span class="cat__core__step__digit">--}}
            {{--                    <i class="icmn-enter"><!-- --></i>--}}
            {{--                </span>--}}
            {{--                            <div class="cat__core__step__desc">--}}
            {{--                                <span class="cat__core__step__title">Call Conference</span>--}}
            {{--                                <p>Send Call Conference Request</p>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </a>--}}

            {{--                </div>--}}
            {{--            </div>--}}
            {{--            --}}{{--        B/W List --}}
            {{--            <div class="col-lg-3">--}}
            {{--                <div class="cat__core__widget">--}}
            {{--                    <a href="">--}}
            {{--                        --}}{{--                        <div class="cat__core__step cat__core__step--default">--}}
            {{--                        <div class="cat__core__step cat__core__step--active">--}}
            {{--                <span class="cat__core__step__digit">--}}
            {{--                    <i class="icmn-price-tags"><!-- --></i>--}}
            {{--                </span>--}}
            {{--                            <div class="cat__core__step__desc">--}}
            {{--                                <span class="cat__core__step__title">B/W List</span>--}}
            {{--                                <p>Send B/W List Request</p>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </a>--}}
            {{--                </div>--}}
            {{--            </div>--}}

            {{--            --}}{{--            Absentee Subscriber Request--}}
            {{--            <div class="col-lg-3">--}}
            {{--                <div class="cat__core__widget">--}}
            {{--                    <a href="">--}}
            {{--                        --}}{{--                        <div class="cat__core__step cat__core__step--primary">--}}
            {{--                        <div class="cat__core__step cat__core__step--active">--}}
            {{--                <span class="cat__core__step__digit">--}}
            {{--                    <i class="icmn-phone-hang-up"><!-- --></i>--}}
            {{--                </span>--}}
            {{--                            <div class="cat__core__step__desc">--}}
            {{--                                <span class="cat__core__step__title">Absentee Subscriber</span>--}}
            {{--                                <p>Send Absentee Subscriber Request</p>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </a>--}}
            {{--                </div>--}}
            {{--            </div>--}}

            {{--            --}}{{--        Malicious Call Trace request--}}
            {{--            <div class="col-lg-3">--}}
            {{--                <div class="cat__core__widget">--}}
            {{--                    <a href="{{route('admin.171klnetwork.corejob.request', config('global.NEW_CONNECTION_REQUEST'))}}">--}}
            {{--                        --}}{{--                        <div class="cat__core__step cat__core__step--success">--}}
            {{--                        <div class="cat__core__step cat__core__step--active">--}}
            {{--                <span class="cat__core__step__digit">--}}
            {{--                    <i class="icmn-phone"><!-- --></i>--}}
            {{--                </span>--}}
            {{--                            <div class="cat__core__step__desc">--}}
            {{--                                <span class="cat__core__step__title">Malicious Call Trace</span>--}}
            {{--                                <p>Send Malicious Call Trace Request</p>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </a>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--            --}}{{--        Conversion Request--}}
            {{--            <div class="col-lg-3">--}}
            {{--                <div class="cat__core__widget">--}}
            {{--                    <a href="{{route('admin.171klnetwork.corejob.request', config('global.CONVERSION_REQUEST'))}}">--}}
            {{--                        <div class="cat__core__step cat__core__step--primary">--}}
            {{--                <span class="cat__core__step__digit">--}}
            {{--                    <i class="icmn-share"><!-- --></i>--}}
            {{--                </span>--}}
            {{--                            <div class="cat__core__step__desc">--}}
            {{--                                <span class="cat__core__step__title"> Conversion</span>--}}
            {{--                                <p>Send Conversion Request</p>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </a>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--            --}}{{--        EISD Connection--}}
            {{--            <div class="col-lg-3">--}}
            {{--                <div class="cat__core__widget">--}}
            {{--                    <a href="">--}}
            {{--                        --}}{{--                        <div class="cat__core__step cat__core__step--danger">--}}
            {{--                        <div class="cat__core__step cat__core__step--active">--}}
            {{--                <span class="cat__core__step__digit">--}}
            {{--                    <i class="icmn-enter"><!-- --></i>--}}
            {{--                </span>--}}
            {{--                            <div class="cat__core__step__desc">--}}
            {{--                                <span class="cat__core__step__title">EISD</span>--}}
            {{--                                <p>Send EISD Request</p>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </a>--}}

            {{--                </div>--}}
            {{--            </div>--}}
            {{--            --}}{{--        uNLOCK Disconnection--}}
            {{--            <div class="col-lg-3">--}}
            {{--                <div class="cat__core__widget">--}}
            {{--                    <a href="">--}}
            {{--                        --}}{{--                        <div class="cat__core__step cat__core__step--default">--}}
            {{--                        <div class="cat__core__step cat__core__step--active">--}}
            {{--                <span class="cat__core__step__digit">--}}
            {{--                    <i class="icmn-price-tags"><!-- --></i>--}}
            {{--                </span>--}}
            {{--                            <div class="cat__core__step__desc">--}}
            {{--                                <span class="cat__core__step__title">Unlock</span>--}}
            {{--                                <p>Send Unlock Request</p>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </a>--}}
            {{--                </div>--}}
            {{--            </div>--}}


        </div>
    </div>
@endsection
