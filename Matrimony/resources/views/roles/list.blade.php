@extends('layouts.dashboard')

@section('title') Roles @endsection
@section('page_pre_title') Overview @endsection
@section('page_title') Roles @endsection

@section('header_actions')
    <div class="d-md-flex justify-content-md-between">
        @php $routesCheckLists = getRoutesList(); @endphp
        @if(in_array('app.roles.add',$routesCheckLists))
            <a href="{{ route('app.roles.add') }}" class="btn accent_color">
                <i class="ti ti-plus icon"></i> Create New Role
            </a>
        @endif
        <div class="btn-list d-md-flex d-grid justify-content-md-end gap-3 row-gap-3">
            @if(in_array('app.roles.search',$routesCheckLists))
                {!! Form::open(['url' => route('app.roles.list'), 'method' => 'GET', 'id' => 'roleListSearch']) !!}
                    <div class="col input-group input-icon product-search-fields">
                        {!! Form::text('name', $nameVal, ['class' => 'form-control', 'placeholder' => 'Enter name to search...']) !!}
                        <button class="btn btn--search accent_color" type="submit"><i class="ti ti-search icon"></i></button>
                    </div>
                {!! Form::close() !!}
                <a href="{{ route('app.roles.list') }}" class="btn accent_color">
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
            @if($roles->count() > 0)
                <div class="table-responsive">
                    <table class="table table-vcenter card-table table-striped">
                        <thead>
                            <tr>
                                <th>S No</th>
                                <th>Name</th>
                                <th style="width:25%">Routes</th>
                                <th>Created On</th>
                                <th>Updated On</th>
                                <th>Edit</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{ ($roles->currentPage() - 1) * $roles->perPage() + $loop->index + 1 }}</td>
                                    <td class="text-muted">{{ $role->name }}</td>
                                    <td>
                                        <button type="button" class="btn accent_color" data-bs-toggle="modal" data-bs-target="#viewPermission{{$role->id}}">View routes</button>
                                    </td>
                                    <td>{{ $role->created_at->format('d-m-Y h:i:s') }}</td>
                                    <td>{{ $role->updated_at->format('d-m-Y h:i:s') }}</td>
                                    <td class="custom_btns">
                                        @if (in_array('app.roles.edit', $routesCheckLists))
                                            <button class="btn">
                                                <a class="" href="{{ route('app.roles.edit', ['id' => $role->id]) }}" title="Edit Role">
                                                    <i class="ti ti-edit icon"></i>
                                                </a>
                                            </button>
                                        @endif
                                    </td>
                                    <td class="custom_btns">
                                        @if ($role->is_active)
                                            <button class="btn">
                                                <a href="{{ route('app.roles.status', ['id' => $role->id, 'type' => 'inactive']) }}"
                                                    class="confirmation-link" title="Active">
                                                    <i class="ti ti-toggle-right icon" style="color: #089203"></i>
                                                </a>
                                            </button>
                                        @else
                                            <button class="btn">
                                                <a href="{{ route('app.roles.status', ['id' => $role->id, 'type' => 'active']) }}"
                                                    class="confirmation-link" title="Inactive">
                                                    <i class="ti ti-toggle-left icon" style="color: #c20c0c"></i>
                                                </a>
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="viewPermission{{$role->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" style="max-width: 800px;">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Routes</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body" style="max-height: 450px; overflow-y: auto;margin-bottom:30px;">
                                                @if(empty($role->routes) === false)
                                                    <ul class="custom_grid_list" style="padding-left: 20px;"> <!-- Adjust padding as needed -->
                                                        @foreach($role->routes as $permission)
                                                            <li style="list-style: disc;">{{{ $permission->name }}}</li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if ($roles->hasPages())
                    <div class="card-footer divider_color">
                        {!! $roles->onEachSide(0)->links() !!}
                    </div>
                @endif
            @else
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <div class="d-flex">
                        <div>
                            <i class="ti ti-alert-triangle icon alert-icon"></i>
                        </div>
                        <div>
                            <h4 class="alert-title">You haven't added Roles yet.</h4>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
