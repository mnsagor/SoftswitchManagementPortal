<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li>
                    <select class="searchable-field form-control">

                    </select>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/users*") ? "menu-open" : "" }} {{ request()->is("admin/audit-logs*") ? "menu-open" : "" }} {{ request()->is("admin/user-registration-requests*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('audit_log_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.audit-logs.index") }}" class="nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-file-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.auditLog.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_registration_request_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.user-registration-requests.index") }}" class="nav-link {{ request()->is("admin/user-registration-requests") || request()->is("admin/user-registration-requests/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.userRegistrationRequest.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('user_alert_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.user-alerts.index") }}" class="nav-link {{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-bell">

                            </i>
                            <p>
                                {{ trans('cruds.userAlert.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('setting_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/network-types*") ? "menu-open" : "" }} {{ request()->is("admin/job-types*") ? "menu-open" : "" }} {{ request()->is("admin/request-types*") ? "menu-open" : "" }} {{ request()->is("admin/job-request-statuses*") ? "menu-open" : "" }} {{ request()->is("admin/designations*") ? "menu-open" : "" }} {{ request()->is("admin/regions*") ? "menu-open" : "" }} {{ request()->is("admin/offices*") ? "menu-open" : "" }} {{ request()->is("admin/employees*") ? "menu-open" : "" }} {{ request()->is("admin/olts*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.setting.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('network_type_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.network-types.index") }}" class="nav-link {{ request()->is("admin/network-types") || request()->is("admin/network-types/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fab fa-r-project">

                                        </i>
                                        <p>
                                            {{ trans('cruds.networkType.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('job_type_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.job-types.index") }}" class="nav-link {{ request()->is("admin/job-types") || request()->is("admin/job-types/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-award">

                                        </i>
                                        <p>
                                            {{ trans('cruds.jobType.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('request_type_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.request-types.index") }}" class="nav-link {{ request()->is("admin/request-types") || request()->is("admin/request-types/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.requestType.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('job_request_status_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.job-request-statuses.index") }}" class="nav-link {{ request()->is("admin/job-request-statuses") || request()->is("admin/job-request-statuses/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-star">

                                        </i>
                                        <p>
                                            {{ trans('cruds.jobRequestStatus.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('designation_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.designations.index") }}" class="nav-link {{ request()->is("admin/designations") || request()->is("admin/designations/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.designation.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('region_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.regions.index") }}" class="nav-link {{ request()->is("admin/regions") || request()->is("admin/regions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.region.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('office_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.offices.index") }}" class="nav-link {{ request()->is("admin/offices") || request()->is("admin/offices/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.office.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('employee_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.employees.index") }}" class="nav-link {{ request()->is("admin/employees") || request()->is("admin/employees/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user-cog">

                                        </i>
                                        <p>
                                            {{ trans('cruds.employee.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('olt_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.olts.index") }}" class="nav-link {{ request()->is("admin/olts") || request()->is("admin/olts/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.olt.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('agw_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/oso-agws*") ? "menu-open" : "" }} {{ request()->is("admin/tndp-ims-agws*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.agwManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('oso_agw_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.oso-agws.index") }}" class="nav-link {{ request()->is("admin/oso-agws") || request()->is("admin/oso-agws/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.osoAgw.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tndp_ims_agw_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tndp-ims-agws.index") }}" class="nav-link {{ request()->is("admin/tndp-ims-agws") || request()->is("admin/tndp-ims-agws/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.tndpImsAgw.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('number_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/oso-numbers*") ? "menu-open" : "" }} {{ request()->is("admin/oso-number-profiles*") ? "menu-open" : "" }} {{ request()->is("admin/tndp-ims-numbers*") ? "menu-open" : "" }} {{ request()->is("admin/tndp-ims-number-profiles*") ? "menu-open" : "" }} {{ request()->is("admin/tndp-ims-olt-profiles*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.numberManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('oso_number_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.oso-numbers.index") }}" class="nav-link {{ request()->is("admin/oso-numbers") || request()->is("admin/oso-numbers/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.osoNumber.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('oso_number_profile_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.oso-number-profiles.index") }}" class="nav-link {{ request()->is("admin/oso-number-profiles") || request()->is("admin/oso-number-profiles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.osoNumberProfile.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tndp_ims_number_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tndp-ims-numbers.index") }}" class="nav-link {{ request()->is("admin/tndp-ims-numbers") || request()->is("admin/tndp-ims-numbers/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.tndpImsNumber.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tndp_ims_number_profile_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tndp-ims-number-profiles.index") }}" class="nav-link {{ request()->is("admin/tndp-ims-number-profiles") || request()->is("admin/tndp-ims-number-profiles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.tndpImsNumberProfile.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tndp_ims_olt_profile_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tndp-ims-olt-profiles.index") }}" class="nav-link {{ request()->is("admin/tndp-ims-olt-profiles") || request()->is("admin/tndp-ims-olt-profiles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.tndpImsOltProfile.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('job_request_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/job-requests*") ? "menu-open" : "" }} {{ request()->is("admin/olt-job-requests*") ? "menu-open" : "" }} {{ request()->is("admin/job-request-authenticatioins*") ? "menu-open" : "" }} {{ request()->is("admin/my-job-requests*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-book-open">

                            </i>
                            <p>
                                {{ trans('cruds.jobRequestManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('job_request_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.job-requests.index") }}" class="nav-link {{ request()->is("admin/job-requests") || request()->is("admin/job-requests/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-star">

                                        </i>
                                        <p>
                                            {{ trans('cruds.jobRequest.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('olt_job_request_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.olt-job-requests.index") }}" class="nav-link {{ request()->is("admin/olt-job-requests") || request()->is("admin/olt-job-requests/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.oltJobRequest.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('job_request_authenticatioin_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.job-request-authenticatioins.index") }}" class="nav-link {{ request()->is("admin/job-request-authenticatioins") || request()->is("admin/job-request-authenticatioins/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fab fa-autoprefixer">

                                        </i>
                                        <p>
                                            {{ trans('cruds.jobRequestAuthenticatioin.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('my_job_request_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.my-job-requests.index") }}" class="nav-link {{ request()->is("admin/my-job-requests") || request()->is("admin/my-job-requests/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-address-card">

                                        </i>
                                        <p>
                                            {{ trans('cruds.myJobRequest.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('oso_network_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/core-job-requests*") ? "menu-open" : "" }} {{ request()->is("admin/oso-olt-jobs*") ? "menu-open" : "" }} {{ request()->is("admin/oso-reports*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-basketball-ball">

                            </i>
                            <p>
                                {{ trans('cruds.osoNetwork.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('core_job_request_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.core-job-requests.index") }}" class="nav-link {{ request()->is("admin/core-job-requests") || request()->is("admin/core-job-requests/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-file">

                                        </i>
                                        <p>
                                            {{ trans('cruds.coreJobRequest.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('oso_olt_job_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.oso-olt-jobs.index") }}" class="nav-link {{ request()->is("admin/oso-olt-jobs") || request()->is("admin/oso-olt-jobs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-calendar-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.osoOltJob.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('oso_report_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.oso-reports.index") }}" class="nav-link {{ request()->is("admin/oso-reports") || request()->is("admin/oso-reports/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-book">

                                        </i>
                                        <p>
                                            {{ trans('cruds.osoReport.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('tndp_ims_newtork_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/core-jobs*") ? "menu-open" : "" }} {{ request()->is("admin/ont-jobs*") ? "menu-open" : "" }} {{ request()->is("admin/ims-reports*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-box">

                            </i>
                            <p>
                                {{ trans('cruds.tndpImsNewtork.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('core_job_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.core-jobs.index") }}" class="nav-link {{ request()->is("admin/core-jobs") || request()->is("admin/core-jobs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-calendar-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.coreJob.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('ont_job_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.ont-jobs.index") }}" class="nav-link {{ request()->is("admin/ont-jobs") || request()->is("admin/ont-jobs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-calendar-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.ontJob.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('ims_report_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.ims-reports.index") }}" class="nav-link {{ request()->is("admin/ims-reports") || request()->is("admin/ims-reports/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-book">

                                        </i>
                                        <p>
                                            {{ trans('cruds.imsReport.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('script_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/core-job-osos*") ? "menu-open" : "" }} {{ request()->is("admin/olt-osos*") ? "menu-open" : "" }} {{ request()->is("admin/core-job-ims*") ? "menu-open" : "" }} {{ request()->is("admin/ont-job-ims*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-book">

                            </i>
                            <p>
                                {{ trans('cruds.script.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('core_job_oso_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.core-job-osos.index") }}" class="nav-link {{ request()->is("admin/core-job-osos") || request()->is("admin/core-job-osos/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-file">

                                        </i>
                                        <p>
                                            {{ trans('cruds.coreJobOso.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('olt_oso_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.olt-osos.index") }}" class="nav-link {{ request()->is("admin/olt-osos") || request()->is("admin/olt-osos/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-calendar">

                                        </i>
                                        <p>
                                            {{ trans('cruds.oltOso.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('core_job_im_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.core-job-ims.index") }}" class="nav-link {{ request()->is("admin/core-job-ims") || request()->is("admin/core-job-ims/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-calendar-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.coreJobIm.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('ont_job_im_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.ont-job-ims.index") }}" class="nav-link {{ request()->is("admin/ont-job-ims") || request()->is("admin/ont-job-ims/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-calendar-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.ontJobIm.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key nav-icon">
                                </i>
                                <p>
                                    {{ trans('global.change_password') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt nav-icon">

                            </i>
                            <p>{{ trans('global.logout') }}</p>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>