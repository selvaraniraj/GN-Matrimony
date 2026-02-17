<div class="modal fade" id="addSettingNew" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="max-width: 800px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Setting</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="max-height: 450px; overflow-y: auto;margin-bottom:30px;">
                {!! Form::open(['url' => route('app.settings.add'), 'id' => 'settingsAddForm']) !!}
                    <div class="form-group ">
                        {!! Form::label('key', 'Setting Key', ['class' => 'form-label']) !!}
                        <div class="input-group-flat">
                            {!! Form::text('key', null, ['class' => 'form-control']) !!}
                        </div>
                        @if ($errors->has('key'))
                            <div class="text-danger text-danger--space">
                                <p>{{ $errors->first('key') }}</p>
                            </div>
                        @endif
                    </div>
                    <br>
                    <div class="form-group ">
                        {!! Form::label('value', 'Setting Value', ['class' => 'form-label']) !!}
                        <div class="input-group-flat">
                            {!! Form::text('value', null, ['class' => 'form-control']) !!}
                        </div>
                        @if ($errors->has('value'))
                        <div class="text-danger text-danger--space">
                                <p>{{ $errors->first('value') }}</p>
                            </div>
                        @endif
                    </div>
                    <br>
                    <div class="form-footer">
                        <a class="btn btn-light" href="{{ route('app.settings.list') }}">Cancel</a>
                        {!! Form::submit('Save', ['class' => 'btn accent_color']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
