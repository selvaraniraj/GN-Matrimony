@extends('layouts.dashboard')

@section('title', 'Settings')

@section('page_pre_title', 'Overview')

@section('page_title', 'Settings')

@section('header_actions')
    <div class="d-md-flex justify-content-md-between">
        @php $routesCheckLists = getRoutesList(); @endphp
        @if (in_array('app.settings.add', $routesCheckLists))
            <a href="javascript:void(0);" title="Create" data-bs-toggle="modal" data-bs-target="#addSettingNew" class="btn accent_color mb-md-0 mb-3">
                <i class="ti ti-plus icon"></i> Create New Setting
            </a>
        @endif
        <div class="btn-list d-md-flex d-grid justify-content-md-end gap-3 row-gap-3">
            @if(in_array('app.settings.search', $routesCheckLists))
                {!! Form::open(['url' => route('app.settings.list'), 'method' => 'GET', 'id' => 'settingListSearch']) !!}
                    <div class="col input-group input-icon setting-search-fields">
                        {!! Form::text('key', $nameVal, [
                            'class' => 'form-control',
                            'placeholder' => 'Enter key name to search...',
                        ]) !!}
                        <button class="btn btn--search accent_color" type="submit"><i class="ti ti-search icon"></i></button>
                    </div>
                {!! Form::close() !!}
                <a href="{{ route('app.settings.list') }}" class="btn accent_color">
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
                @if ($settings->count() > 0)
                <div class="table-responsive">
                    <table class="table table-vcenter card-table table-striped">
                        <thead>
                            <tr>
                                <th>S No</th>
                                <th>Key</th>
                                <th>Value</th>
                                <th>Updated At</th>
                                <th>Edit</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($settings as $setting)
                                <tr>
                                    <td>{{ ($settings->currentPage() - 1) * $settings->perPage() + $loop->index + 1 }}</td>
                                    <td class="text-muted">{{ $setting->key }}</td>
                                    <td class="text-muted">{{ $setting->value }}</td>
                                    <td>{{ $setting->updated_at->format('d-m-Y h:i:s') }}</td>
                                    <td class="custom_btns">
                                        @if (in_array('app.settings.edit', $routesCheckLists))
                                            <button class="btn">
                                                <a href="javascript:void(0);" title="Edit Setting" data-bs-toggle="modal" data-bs-target="#editSetting_{{ $setting->id }}" class="btn accent_color">
                                                    <i class="ti ti-edit icon"></i>
                                                </a>
                                            </button>
                                        @endif
                                    </td>
                                    <td class="custom_btns">
                                        @if ($setting->is_active)
                                            <button class="btn">
                                                <a href="{{ route('app.settings.status', ['id' => $setting->id, 'type' => 'inactive']) }}"
                                                    class="confirmation-link" title="Active">
                                                    <i class="ti ti-toggle-right icon" style="color: #089203"></i>
                                                </a>
                                            </button>
                                        @else
                                            <button class="btn">
                                                <a href="{{ route('app.settings.status', ['id' => $setting->id, 'type' => 'active']) }}"
                                                    class="confirmation-link" title="Inactive">
                                                    <i class="ti ti-toggle-left icon" style="color: #c20c0c"></i>
                                                </a>
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                                @include('settings.partials.edit-model')
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if ($settings->hasPages())
                <div class="card-footer divider_color">
                    {!! $settings->onEachSide(0)->links() !!}
                </div>
                @endif
        @else
            <div class="card">
                <div class="card-body">
                    <div class="alert alert-warning alert-dismissible" role="alert">
                        <div class="d-flex">
                            <div>
                                <i class="ti ti-alert-triangle icon alert-icon"></i>
                            </div>
                            <div>
                                <h4 class="alert-title">You haven't added Settings yet.</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        </div>
    </div>
    </div>
    @include('settings.partials.add-model')
@endsection
@push('custom_scripts')
    @if ($errors->has('key') || $errors->has('value'))
        <script>
            $(document).ready(function() {
                $('#addSettingNew').modal('show');
            });
        </script>
    @endif
@endpush
