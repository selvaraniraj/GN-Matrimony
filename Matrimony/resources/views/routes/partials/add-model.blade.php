<div class="modal fade" id="addRoute" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="max-width: 800px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Route</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="max-height: 450px; overflow-y: auto;margin-bottom:30px;">
                {!! Form::open(['url' => route('app.routes.add'), 'id' => 'addRouteForm']) !!}
                    <div class="form-group ">
                        {!! Form::label('name', 'Route Name', ['class' => 'form-label']) !!}
                        <div class="input-group-flat">
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>
                        @if ($errors->has('name'))
                            <div class="text-danger text-danger--space">
                                <p>{{ $errors->first('name') }}</p>
                            </div>
                        @endif
                    </div>
                    <br>
                    <div class="form-group ">
                        {!! Form::label('path', 'Route Path', ['class' => 'form-label']) !!}
                        <div class="input-group-flat">
                            {!! Form::text('path', null, ['class' => 'form-control addPath']) !!}
                        </div>
                        @if ($errors->has('path'))
                            <div class="text-danger text-danger--space">
                                <p>{{ $errors->first('path') }}</p>
                            </div>
                        @endif
                    </div>
                    <br>
                    <div class="form-footer">
                        <a class="btn btn-light" href="{{ route('app.routes.list') }}">Cancel</a>
                        {!! Form::submit('Save', ['class' => 'btn accent_color']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
