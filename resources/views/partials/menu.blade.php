<aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li>
                <select class="searchable-field form-control">

                </select>
            </li>
            <li>
                <a href="{{ route("admin.home") }}">
                    <i class="fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('user_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-users">

                        </i>
                        <span>{{ trans('cruds.userManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('permission_access')
                            <li class="{{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                <a href="{{ route("admin.permissions.index") }}">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span>{{ trans('cruds.permission.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="{{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                <a href="{{ route("admin.roles.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.role.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="{{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                <a href="{{ route("admin.users.index") }}">
                                    <i class="fa-fw fas fa-user">

                                    </i>
                                    <span>{{ trans('cruds.user.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('audit_log_access')
                            <li class="{{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "active" : "" }}">
                                <a href="{{ route("admin.audit-logs.index") }}">
                                    <i class="fa-fw fas fa-file-alt">

                                    </i>
                                    <span>{{ trans('cruds.auditLog.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('user_registration_request_access')
                            <li class="{{ request()->is("admin/user-registration-requests") || request()->is("admin/user-registration-requests/*") ? "active" : "" }}">
                                <a href="{{ route("admin.user-registration-requests.index") }}">
                                    <i class="fa-fw far fa-user">

                                    </i>
                                    <span>{{ trans('cruds.userRegistrationRequest.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('user_alert_access')
                <li class="{{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "active" : "" }}">
                    <a href="{{ route("admin.user-alerts.index") }}">
                        <i class="fa-fw fas fa-bell">

                        </i>
                        <span>{{ trans('cruds.userAlert.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('setting_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.setting.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('network_type_access')
                            <li class="{{ request()->is("admin/network-types") || request()->is("admin/network-types/*") ? "active" : "" }}">
                                <a href="{{ route("admin.network-types.index") }}">
                                    <i class="fa-fw fab fa-r-project">

                                    </i>
                                    <span>{{ trans('cruds.networkType.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('job_type_access')
                            <li class="{{ request()->is("admin/job-types") || request()->is("admin/job-types/*") ? "active" : "" }}">
                                <a href="{{ route("admin.job-types.index") }}">
                                    <i class="fa-fw fas fa-award">

                                    </i>
                                    <span>{{ trans('cruds.jobType.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('request_type_access')
                            <li class="{{ request()->is("admin/request-types") || request()->is("admin/request-types/*") ? "active" : "" }}">
                                <a href="{{ route("admin.request-types.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.requestType.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('job_request_status_access')
                            <li class="{{ request()->is("admin/job-request-statuses") || request()->is("admin/job-request-statuses/*") ? "active" : "" }}">
                                <a href="{{ route("admin.job-request-statuses.index") }}">
                                    <i class="fa-fw fas fa-star">

                                    </i>
                                    <span>{{ trans('cruds.jobRequestStatus.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('designation_access')
                            <li class="{{ request()->is("admin/designations") || request()->is("admin/designations/*") ? "active" : "" }}">
                                <a href="{{ route("admin.designations.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.designation.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('region_access')
                            <li class="{{ request()->is("admin/regions") || request()->is("admin/regions/*") ? "active" : "" }}">
                                <a href="{{ route("admin.regions.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.region.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('office_access')
                            <li class="{{ request()->is("admin/offices") || request()->is("admin/offices/*") ? "active" : "" }}">
                                <a href="{{ route("admin.offices.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.office.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('employee_access')
                            <li class="{{ request()->is("admin/employees") || request()->is("admin/employees/*") ? "active" : "" }}">
                                <a href="{{ route("admin.employees.index") }}">
                                    <i class="fa-fw fas fa-user-cog">

                                    </i>
                                    <span>{{ trans('cruds.employee.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('olt_access')
                            <li class="{{ request()->is("admin/olts") || request()->is("admin/olts/*") ? "active" : "" }}">
                                <a href="{{ route("admin.olts.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.olt.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('agw_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.agwManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('oso_agw_access')
                            <li class="{{ request()->is("admin/oso-agws") || request()->is("admin/oso-agws/*") ? "active" : "" }}">
                                <a href="{{ route("admin.oso-agws.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.osoAgw.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('tndp_ims_agw_access')
                            <li class="{{ request()->is("admin/tndp-ims-agws") || request()->is("admin/tndp-ims-agws/*") ? "active" : "" }}">
                                <a href="{{ route("admin.tndp-ims-agws.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.tndpImsAgw.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('number_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.numberManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('oso_number_access')
                            <li class="{{ request()->is("admin/oso-numbers") || request()->is("admin/oso-numbers/*") ? "active" : "" }}">
                                <a href="{{ route("admin.oso-numbers.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.osoNumber.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('oso_number_profile_access')
                            <li class="{{ request()->is("admin/oso-number-profiles") || request()->is("admin/oso-number-profiles/*") ? "active" : "" }}">
                                <a href="{{ route("admin.oso-number-profiles.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.osoNumberProfile.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('tndp_ims_number_access')
                            <li class="{{ request()->is("admin/tndp-ims-numbers") || request()->is("admin/tndp-ims-numbers/*") ? "active" : "" }}">
                                <a href="{{ route("admin.tndp-ims-numbers.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.tndpImsNumber.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('tndp_ims_number_profile_access')
                            <li class="{{ request()->is("admin/tndp-ims-number-profiles") || request()->is("admin/tndp-ims-number-profiles/*") ? "active" : "" }}">
                                <a href="{{ route("admin.tndp-ims-number-profiles.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.tndpImsNumberProfile.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('tndp_ims_olt_profile_access')
                            <li class="{{ request()->is("admin/tndp-ims-olt-profiles") || request()->is("admin/tndp-ims-olt-profiles/*") ? "active" : "" }}">
                                <a href="{{ route("admin.tndp-ims-olt-profiles.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.tndpImsOltProfile.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('job_request_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-book-open">

                        </i>
                        <span>{{ trans('cruds.jobRequestManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('job_request_access')
                            <li class="{{ request()->is("admin/job-requests") || request()->is("admin/job-requests/*") ? "active" : "" }}">
                                <a href="{{ route("admin.job-requests.index") }}">
                                    <i class="fa-fw fas fa-star">

                                    </i>
                                    <span>{{ trans('cruds.jobRequest.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('olt_job_request_access')
                            <li class="{{ request()->is("admin/olt-job-requests") || request()->is("admin/olt-job-requests/*") ? "active" : "" }}">
                                <a href="{{ route("admin.olt-job-requests.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.oltJobRequest.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('job_request_authenticatioin_access')
                            <li class="{{ request()->is("admin/job-request-authenticatioins") || request()->is("admin/job-request-authenticatioins/*") ? "active" : "" }}">
                                <a href="{{ route("admin.job-request-authenticatioins.index") }}">
                                    <i class="fa-fw fab fa-autoprefixer">

                                    </i>
                                    <span>{{ trans('cruds.jobRequestAuthenticatioin.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('my_job_request_access')
                            <li class="{{ request()->is("admin/my-job-requests") || request()->is("admin/my-job-requests/*") ? "active" : "" }}">
                                <a href="{{ route("admin.my-job-requests.index") }}">
                                    <i class="fa-fw fas fa-address-card">

                                    </i>
                                    <span>{{ trans('cruds.myJobRequest.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('oso_network_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-basketball-ball">

                        </i>
                        <span>{{ trans('cruds.osoNetwork.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('core_job_request_access')
                            <li class="{{ request()->is("admin/core-job-requests") || request()->is("admin/core-job-requests/*") ? "active" : "" }}">
                                <a href="{{ route("admin.core-job-requests.index") }}">
                                    <i class="fa-fw far fa-file">

                                    </i>
                                    <span>{{ trans('cruds.coreJobRequest.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('oso_olt_job_access')
                            <li class="{{ request()->is("admin/oso-olt-jobs") || request()->is("admin/oso-olt-jobs/*") ? "active" : "" }}">
                                <a href="{{ route("admin.oso-olt-jobs.index") }}">
                                    <i class="fa-fw fas fa-calendar-alt">

                                    </i>
                                    <span>{{ trans('cruds.osoOltJob.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('oso_report_access')
                            <li class="{{ request()->is("admin/oso-reports") || request()->is("admin/oso-reports/*") ? "active" : "" }}">
                                <a href="{{ route("admin.oso-reports.index") }}">
                                    <i class="fa-fw fas fa-book">

                                    </i>
                                    <span>{{ trans('cruds.osoReport.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('tndp_ims_newtork_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-box">

                        </i>
                        <span>{{ trans('cruds.tndpImsNewtork.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('core_job_access')
                            <li class="{{ request()->is("admin/core-jobs") || request()->is("admin/core-jobs/*") ? "active" : "" }}">
                                <a href="{{ route("admin.core-jobs.index") }}">
                                    <i class="fa-fw far fa-calendar-alt">

                                    </i>
                                    <span>{{ trans('cruds.coreJob.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('ont_job_access')
                            <li class="{{ request()->is("admin/ont-jobs") || request()->is("admin/ont-jobs/*") ? "active" : "" }}">
                                <a href="{{ route("admin.ont-jobs.index") }}">
                                    <i class="fa-fw fas fa-calendar-alt">

                                    </i>
                                    <span>{{ trans('cruds.ontJob.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('ims_report_access')
                            <li class="{{ request()->is("admin/ims-reports") || request()->is("admin/ims-reports/*") ? "active" : "" }}">
                                <a href="{{ route("admin.ims-reports.index") }}">
                                    <i class="fa-fw fas fa-book">

                                    </i>
                                    <span>{{ trans('cruds.imsReport.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('script_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-book">

                        </i>
                        <span>{{ trans('cruds.script.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('core_job_oso_access')
                            <li class="{{ request()->is("admin/core-job-osos") || request()->is("admin/core-job-osos/*") ? "active" : "" }}">
                                <a href="{{ route("admin.core-job-osos.index") }}">
                                    <i class="fa-fw far fa-file">

                                    </i>
                                    <span>{{ trans('cruds.coreJobOso.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('olt_oso_access')
                            <li class="{{ request()->is("admin/olt-osos") || request()->is("admin/olt-osos/*") ? "active" : "" }}">
                                <a href="{{ route("admin.olt-osos.index") }}">
                                    <i class="fa-fw far fa-calendar">

                                    </i>
                                    <span>{{ trans('cruds.oltOso.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('core_job_im_access')
                            <li class="{{ request()->is("admin/core-job-ims") || request()->is("admin/core-job-ims/*") ? "active" : "" }}">
                                <a href="{{ route("admin.core-job-ims.index") }}">
                                    <i class="fa-fw far fa-calendar-alt">

                                    </i>
                                    <span>{{ trans('cruds.coreJobIm.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('ont_job_im_access')
                            <li class="{{ request()->is("admin/ont-job-ims") || request()->is("admin/ont-job-ims/*") ? "active" : "" }}">
                                <a href="{{ route("admin.ont-job-ims.index") }}">
                                    <i class="fa-fw fas fa-calendar-alt">

                                    </i>
                                    <span>{{ trans('cruds.ontJobIm.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="{{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}">
                        <a href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>
    </section>
</aside>