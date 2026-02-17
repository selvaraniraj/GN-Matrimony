<div class="modal fade editRoute" id="editRoute_{{ $route->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="max-width: 800px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="max-height: 450px; overflow-y: auto;margin-bottom:30px;">
                {!! Form::open(['url' => route('app.routes.edit', ['id' => $route->id]),  'class' => 'editRouteForm', 'data-route-id' => $route->id]) !!}
                    <div class="form-group ">
                        {!! Form::label('name', 'Route Name', ['class' => 'form-label']) !!}
                        <div class="input-group-flat">
                            {!! Form::text('name', $route->name, ['class' => 'form-control']) !!}
                        </div>
                        <br>
                            <div class="text-danger text-danger--space" id="route_edit_name_{{ $route->id }}"></div>
                    </div>
                    <br>
                    <div class="form-group ">
                        {!! Form::label('path', 'Route Path', ['class' => 'form-label']) !!}
                        <div class="input-group-flat">
                            {!! Form::text('path', $route->path, ['class' => 'form-control']) !!}
                        </div>
                        <br>
                            <div class="text-danger text-danger--space" id="route_edit_path_{{ $route->id }}"></div>
                    </div>
                    <div class="form-footer">
                        <a class="btn btn-light" href="{{ route('app.routes.list') }}">Cancel</a>
                        {!! Form::submit('Save', ['class' => 'btn accent_color']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
