@extends('layouts.dashboard')

@section('title', 'Routes')

@section('page_pre_title', 'Overview')

@section('page_title', 'Routes')

@section('header_actions')
    <div class="d-md-flex justify-content-md-between">
        @php $routesCheckLists = getRoutesList(); @endphp
        @if(in_array('app.routes.add',$routesCheckLists))
            <a href="javascript:void(0);" title="view" data-bs-toggle="modal" data-bs-target="#addRoute" class="btn accent_color mb-md-0 mb-3">
                <i class="ti ti-plus icon"></i> Create New Route
            </a>
        @endif
        <div class="btn-list d-md-flex d-grid justify-content-md-end gap-3 row-gap-3">
            @if(in_array('app.routes.migrate',$routesCheckLists))
                <a href="{{ route('app.routes.migrate') }}" class="btn accent_color" id="migrateRouteBtn">
                    <i class="ti ti-settings icon"></i> Migrate Routes
                </a>
            @endif
            @if(in_array('app.routes.search',$routesCheckLists))
                {!! Form::open(['url' => route('app.routes.list'), 'method' => 'GET', 'id' => 'routeListSearch']) !!}
                    <div class="col input-group input-icon product-search-fields">
                        {!! Form::text('name', $nameVal, [
                            'class' => 'form-control',
                            'placeholder' => 'Enter name to search...',
                        ]) !!}
                        <button class="btn btn--search accent_color" type="submit"><i class="ti ti-search icon"></i></button>
                    </div>
                {!! Form::close() !!}
                <a href="{{ route('app.routes.list') }}" class="btn accent_color">
                     RESET
                </a>
            @endif
        </div>
    </div>
    <div class="alert main alert-success alert-dismissible customSuccessMessage" role="alert" style="margin-top: 15px; display: none;">
        <div class="d-flex">
            <div>
                <i class="ti ti-alert-circle alert-icon icon"></i>
            </div>
            <div>
                <div class="alert-title">
                    <span class="text-success customSuccessMessageValue"></span>
                </div>
            </div>
        </div>
        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
	</div>
@endsection

@section('content')
    <div class="col-12">
        <div class="card shadow">
            <div class="card-body">
                @if ($routes->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table table-striped">
                                <thead>
                                    <tr>
                                        <th>S No</th>
                                        <th>Name</th>
                                        <th>Path</th>
                                        <th>Created On</th>
                                        <th>Updated On</th>
                                        <th>Edit</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($routes as $route)
                                        <tr>
                                            <td>{{ ($routes->currentPage() - 1) * $routes->perPage() + $loop->index + 1 }}</td>
                                            <td class="text-muted">{{ $route->name }}</td>
                                            <td class="text-muted">{{ $route->path }}</td>
                                            <td>{{ $route->created_at->format('d-m-Y h:i:s') }}</td>
                                            <td>{{ $route->updated_at->format('d-m-Y h:i:s') }}</td>
                                            <td class="custom_btns">
                                                @if (in_array('app.routes.edit', $routesCheckLists))
                                                    <button class="btn">
                                                        <a href="javascript:void(0);" title="Edit Route" data-bs-toggle="modal" data-bs-target="#editRoute_{{ $route->id }}" class="btn accent_color">
                                                            <i class="ti ti-edit icon"></i>
                                                        </a>
                                                    </button>
                                                @endif
                                            </td>
                                            <td class="custom_btns">
                                                @if ($route->is_active)
                                                    <button class="btn">
                                                        <a href="{{ route('app.routes.status', ['id' => $route->id, 'type' => 'inactive']) }}"
                                                            class="confirmation-link" title="Active">
                                                            <i class="ti ti-toggle-right icon" style="color: #089203"></i>
                                                        </a>
                                                    </button>
                                                @else
                                                    <button class="btn">
                                                        <a href="{{ route('app.routes.status', ['id' => $route->id, 'type' => 'active']) }}"
                                                            class="confirmation-link" title="Inactive">
                                                            <i class="ti ti-toggle-left icon" style="color: #c20c0c"></i>
                                                        </a>
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                        @include('routes.partials.edit-model')
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @if ($routes->hasPages())
                        <div class="card-footer divider_color">
                            {!! $routes->onEachSide(0)->links() !!}
                        </div>
                        @endif
                    </div>
                    @include('routes.partials.add-model')
                @else
                    <div class="card">
                        <div class="card-body">
                            <div class="alert alert-warning alert-dismissible" role="alert">
                                <div class="d-flex">
                                    <div>
                                        <i class="ti ti-alert-triangle icon alert-icon"></i>
                                    </div>
                                    <div>
                                        <h4 class="alert-title">You haven't added Routes yet.</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
@push('custom_scripts')
    @if ($errors->has('name') || $errors->has('path'))
        <script>
            $(document).ready(function() {
                $('#addRoute').modal('show');
            });
        </script>
    @endif
@endpush
