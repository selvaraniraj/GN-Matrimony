<aside class="navbar navbar-expand-lg bg-website">
    @php $routesCheckLists = empty(getRoutesList() === false) ? getRoutesList() : []; @endphp
    @php $role = empty(getRole() === false) ? getRole() : null; @endphp
    @php $roleCheck = getRole(); @endphp
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
        <span class="navbar-toggler-icon"></span>
        </button>
        @if(in_array('app.main.dashboard',$routesCheckLists))
            <a class="nav-link" href="{{ route('app.main.dashboard') }}" title="CC Support" >
                <h1 class="navbar-brand navbar-brand-autodark">
                    {{-- <img src="{{ asset('img/logo.svg') }}" /> --}}
                    Home
                </h1>
            </a>
        @endif
        <div class=" navbar-collapse" >
            <ul class="navbar-nav collapse1" style="width: 100%;" id="navbar-menu">
                @if(in_array('app.main.dashboard',$routesCheckLists))
                    <li class="nav-item @if(in_array(Route::currentRouteName(), ['app.main.dashboard'])) active @endif">
                        <a class="nav-link" href="{{ route('app.main.dashboard') }}" >
                            <span class="nav-link-title">
                                Dashboard
                            </span>
                        </a>
                    </li>
                @endif

                @if(in_array('app.notifications.list',$routesCheckLists))
                    <li class="nav-item @if(in_array(Route::currentRouteName(), ['app.notifications.list', 'app.notifications.read', 'app.notifications.status'])) active @endif" style="width: 100px;">
                        <a class="nav-link" href="{{ route('app.notifications.list') }}" >
                            <span class="nav-link-title">
                                Notifications
                            </span>
                        </a>
                    </li>
                @endif
                @if($roleCheck == 'super-admin')
                    <li class="nav-item dropdown @if(in_array(Route::currentRouteName(), ['app.users.list', 'app.users.add', 'app.users.save', 'app.users.edit', 'app.users.update', 'app.users.status', 'app.roles.list', 'app.roles.add', 'app.roles.save', 'app.roles.edit', 'app.roles.update', 'app.roles.status', 'app.routes.status','app.routes.list','app.routes.migration', 'app.routes.migrate','app.products.list', 'app.products.add', 'app.products.save', 'app.products.edit', 'app.products.update', 'app.products.status', 'app.issueTypes.list', 'app.issueTypes.add', 'app.issueTypes.save', 'app.issueTypes.edit', 'app.issueTypes.update', 'app.issueTypes.status', 'app.settings.list', 'app.settings.add', 'app.settings.save', 'app.settings.edit', 'app.settings.update', 'app.settings.status', 'app.teams.list', 'app.teams.add', 'app.teams.save', 'app.teams.edit', 'app.teams.update', 'app.teams.status', 'app.logs.list'])) active @endif">
                        <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="true" role="button" aria-expanded="false" >
                            <span class="nav-link-title">
                                Settings
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <div class="dropdown-menu-columns">
                                <div class="dropdown-menu-column">
                                    @if(in_array('app.roles.list',$routesCheckLists))
                                        <a class="dropdown-item" href="{{ route('app.roles.list') }}" >
                                            Roles
                                        </a>
                                    @endif
                                    @if(in_array('app.routes.list',$routesCheckLists))
                                        <a class="dropdown-item" href="{{ route('app.routes.list') }}" >
                                            Routes
                                        </a>
                                    @endif
                                    @if(in_array('app.settings.list',$routesCheckLists))
                                        <a class="dropdown-item" href="{{ route('app.settings.list') }}" >
                                            Settings
                                        </a>
                                    @endif
                                    @if(in_array('app.users.list',$routesCheckLists))
                                        <a class="dropdown-item" href="{{ route('app.users.list') }}" >
                                            Users
                                        </a>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </li>
                @endif
                {{-- @if(in_array('app.v2.main_summary',$routesCheckLists))
                <li class="nav-item @if(in_array(Route::currentRouteName(), ['app.v2.main_summary'])) active @endif">
                    <a class="nav-link" href="{{ route('app.v2.main_summary') }}" style="min-width: 70px;" >
                        <span class="nav-link-title">
                            K-ONE
                        </span>
                    </a>
                </li>
                @endif --}}
            </ul>
            <ul class="navbar-nav-2 d-flex " style="width: 100%;" >
                <li class="nav-item dropdown d-none d-lg-block" >
                    <span class="d-md-none d-lg-inline-block">
                        <i class="ti ti-user-circle icon" style="vertical-align: sub; font-size: 22px;"></i>
                    </span>
                    <span class="nav-link-title font-size__sm">
                        {{ Auth::user()->name }}
                    </span>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link nav-link--space confirmation-link" href="{{ route('logout') }}" title="Logout">
                        <span class="">
                            <i class="ti ti-logout icon" style="font-size: 22px;"></i>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>
