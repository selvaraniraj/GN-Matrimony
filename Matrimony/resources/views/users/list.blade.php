@extends('layouts.dashboard')

@section('title', 'Users')

@section('page_pre_title', 'Overview')

@section('page_title', 'Users')

@section('header_actions')
    <div class="d-md-flex justify-content-md-between">
        @php $routesCheckLists = getRoutesList(); @endphp
        @if(in_array('app.users.add',$routesCheckLists))
            <a href="{{ route('app.users.add') }}" class="btn accent_color">
                <i class="ti ti-plus icon"></i> Create New User
            </a>
        @endif
        <div class="btn-list d-md-flex d-grid justify-content-md-end gap-3 row-gap-3">
            @if(in_array('app.users.search',$routesCheckLists))
                {!! Form::open(['url' => route('app.users.list'), 'method' => 'GET', 'id' => 'userListSearch']) !!}
                    <div class="col input-group input-icon product-search-fields">
                        {!! Form::text('name', $nameVal, ['class' => 'form-control', 'placeholder' => 'Enter name to search...']) !!}
                        <button class="btn btn--search accent_color" type="submit"><i class="ti ti-search icon"></i></button>
                    </div>
                {!! Form::close() !!}
                <a href="{{ route('app.users.list') }}" class="btn accent_color">
                     RESET
                </a>
            @endif
        </div>
    </div>
@endsection

@section('content')
<div class="col-12">
    <div class="card shadow">
        <div class="card-body">
            @if($users->count() > 0)
                <div class="table-responsive">
                    <table class="table table-vcenter card-table table-striped">
                        <thead>
                            <tr style="text-align: center;">
                                <th>S No</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>E-Mail</th>
                                <th style="width:25%">Roles</th>
                                <th>Last Login</th>
                                <th>Created On</th>
                                <th>Updated On</th>
                                <th>Edit</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr style="vertical-align: middle">
                                    <td>{{ ($users->currentPage() - 1) * $users->perPage() + $loop->index + 1 }}</td>
                                    <td class="text-muted">{{ $user->name }}</td>
                                    <td class="text-muted">{{ $user->username }}</td>
                                    <td class="text-muted">{{ $user->email }}</td>
                                    <td class="text-muted" style="text-align: center;">
                                        <span class="badge bg-gray">{{ $user->roles->name }}</span>
                                    </td>
                                    <td class="text-muted">
                                        @if(!empty($user->last_login))
                                            <?php
                                                $lastLoginDateTime = new DateTime($user->last_login);
                                                echo $lastLoginDateTime->format('d-m-Y h:i:s');
                                            ?>
                                        @endif
                                    </td>
                                    <td>{{ $user->created_at->format('d-m-Y h:i:s') }}</td>
                                    <td>{{ $user->updated_at->format('d-m-Y h:i:s') }}</td>
                                    <td class="custom_btns">
                                        @if (in_array('app.users.edit', $routesCheckLists))
                                            <button class="btn">
                                                <a class="" href="{{ route('app.users.edit', ['id' => $user->id]) }}" title="Edit User">
                                                    <i class="ti ti-edit icon"></i>
                                                </a>
                                            </button>
                                        @endif
                                    </td>
                                    <td class="custom_btns">
                                        @if ($user->is_active)
                                            <button class="btn">
                                                <a href="{{ route('app.users.status', ['id' => $user->id, 'type' => 'inactive']) }}"
                                                    class="confirmation-link" title="Active">
                                                    <i class="ti ti-toggle-right icon" style="color: #089203"></i>
                                                </a>
                                            </button>
                                        @else
                                            <button class="btn">
                                                <a href="{{ route('app.users.status', ['id' => $user->id, 'type' => 'active']) }}"
                                                    class="confirmation-link" title="Inactive">
                                                    <i class="ti ti-toggle-left icon" style="color: #c20c0c"></i>
                                                </a>
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if ($users->hasPages())
                    <div class="card-footer divider_color">
                        {!! $users->onEachSide(0)->links() !!}
                    </div>
                @endif
            @else
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <div class="d-flex">
                        <div>
                            <i class="ti ti-alert-triangle icon alert-icon"></i>
                        </div>
                        <div>
                            <h4 class="alert-title">You haven't added Users yet.</h4>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
