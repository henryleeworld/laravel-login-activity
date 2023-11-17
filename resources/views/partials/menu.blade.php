<div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <li class="nav-item">
                <a href="{{ route("admin.home") }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt">

                    </i>
                    <p>
                        {{ trans('global.dashboard') }}
                    </p>
                </a>
            </li>
            @can('user_management_access')
            <li class="nav-item {{ request()->is('admin/permissions*') || request()->is('admin/roles*') || request()->is('admin/users*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ request()->is('admin/permissions*') || request()->is('admin/roles*') || request()->is('admin/users*') ? 'active' : '' }}">
                    <i class="nav-icon fa-solid fa-users nav-icon"></i>
                    <p>
                        {{ trans('cruds.user_management.title') }}
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                @can('permission_access')
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.permissions.index') }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                            <i class="fa-solid fa-unlock nav-icon"></i>
                            <p>{{ trans('cruds.permission.title') }}</p>
                        </a>
                    </li>
                </ul>
                @endcan
                @can('role_access')
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.roles.index') }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                            <i class="fa-solid fa-briefcase nav-icon"></i>
                            <p>{{ trans('cruds.role.title') }}</p>
                        </a>
                    </li>
                </ul>
                @endcan
                @can('user_access')
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                            <i class="fa-solid fa-user nav-icon"></i>
                            <p>{{ trans('cruds.user.title') }}</p>
                        </a>
                    </li>
                </ul>
                @endcan
            </li>
            @endcan
        </ul>
    </nav>
</div>