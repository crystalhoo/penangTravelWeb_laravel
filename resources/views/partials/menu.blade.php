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
                <li class="nav-item">
                    <a href="{{ route('admin.home') }}" class="nav-link">
                        <p>
                            <i class="fas fa-fw fa-tachometer-alt">

                            </i>
                            <span>{{ trans('global.dashboard') }}</span>
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-users">

                            </i>
                            <p>
                                <span>{{ trans('cruds.userManagement.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.permission.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-briefcase">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.role.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-user">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.user.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                    <li class="nav-item">
                        <a href="{{ route("admin.settings.index") }}" class="nav-link {{ request()->is('admin/settings') || request()->is('admin/settings/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-cogs">

                            </i>
                            <p>
                                <span>{{ trans('cruds.setting.title') }}</span>
                            </p>
                        </a>
                    </li>

                    

                    <li class="nav-item">
                        <a href="{{ route('plan.index') }}" class="nav-link {{ request()->is('admin/plan') || request()->is('admin/plan/*') ? 'active' : '' }}">
                            <i class="fa-fw far fa-clock">

                            </i>
                            <p>
                                <span>{{ trans('Plan') }}</span>
                            </p>
                            </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('schedule.index') }}" class="nav-link {{ request()->is('admin/schedule') || request()->is('admin/schedule/*') ? 'active' : '' }}">
                            <i class="fa-fw far fa-clock">

                            </i>
                            <p>
                                <span>{{ trans('cruds.schedule.title') }}</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('hotel.index') }}" class="nav-link {{ request()->is('admin/hotel') || request()->is('admin/hotel/*') ? 'active' : '' }}">
                            <i class="fa-fw far fa-clock">
                            </i>
                            <p>
                                <span>{{ trans('Hotel') }}</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("admin.galleries.index") }}" class="nav-link {{ request()->is('admin/galleries') || request()->is('admin/galleries/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-images">

                            </i>
                            <p>
                                <span>{{ trans('cruds.gallery.title') }}</span>
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route("admin.faqs.index") }}" class="nav-link {{ request()->is('admin/faqs') || request()->is('admin/faqs/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-question">
                            </i>
                            <p>
                                <span>{{ trans('cruds.faq.title') }}</span>
                            </p>
                        </a>
                    </li>

                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt">

                            </i>
                            <span>{{ trans('global.logout') }}</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
