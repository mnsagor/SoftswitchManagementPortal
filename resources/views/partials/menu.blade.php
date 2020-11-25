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