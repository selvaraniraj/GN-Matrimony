<div class="modal fade editSetting" id="editSetting_{{ $setting->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="max-width: 800px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Setting</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="max-height: 450px; overflow-y: auto;margin-bottom:30px;">
                {!! Form::open(['url' => route('app.settings.edit', ['id' => $setting->id]), 'class' => 'editSettingForm', 'data-setting-id' => $setting->id]) !!}
                    <div class="form-group ">
                        {!! Form::label('key', "Setting Key (Can't change)", ['class' => 'form-label']) !!}
                        <div class="input-group-flat">
                            {!! Form::text('key', $setting->key, ['class' => 'form-control', 'readonly' => 'readonly']) !!}
                        </div>
                    </div>
                    <br>
                    <div class="form-group ">
                        {!! Form::label('value', 'Setting Value', ['class' => 'form-label']) !!}
                        <div class="input-group-flat">
                            {!! Form::text('value', $setting->value, ['class' => 'form-control']) !!}
                        </div>
                        <br>
                            <div class="text-danger text-danger--space" id="setting_edit_value_{{ $setting->id }}"></div>
                    </div>
                    <div class="form-footer">
                        <a class="btn btn-light" href="{{ route('app.settings.list') }}">Cancel</a>
                        {!! Form::submit('Save', ['class' => 'btn accent_color']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
