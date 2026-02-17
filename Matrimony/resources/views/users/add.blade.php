@extends('layouts.dashboard')

@section('title') Create New User @endsection
@section('page_pre_title')  @endsection
@section('page_title') Create New User @endsection

@section('content')
<div class="col-md-8" style="margin: auto;">
	<div class="card shadow">
		<div class="card-body">
			{!! Form::open(['url' => route('app.users.save'), 'id' => 'userAddForm']) !!}
                <div class="form-group ">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('role_id', 'Select Role', ['class' => 'form-label']) !!}
                                <div>
                                    {{-- {!! Form::text('product_code', null, ['class' => 'form-control']) !!} --}}
                                    {!! Form::select('role_id', $roles, null, ['class' => 'custom_form_select_2 js_select']) !!}
                                </div>
                                @if ($errors->has('role_id'))
                                    <div class="text-danger text-danger--space">
                                        <p>{{ $errors->first('role_id') }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group ">
                                {!! Form::label('name', 'Name', ['class' => 'form-label']) !!}
                                <div class="input-group-flat">
                                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                </div>
                                @if ($errors->has('name'))
                                    <div class="text-danger text-danger--space">
                                        <p>{{ $errors->first('name') }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group mt-2">
                                {!! Form::label('email', 'Email', ['class' => 'form-label']) !!}
                                <div class="input-group-flat">
                                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                                </div>
                                @if ($errors->has('email'))
                                    <div class="text-danger text-danger--space">
                                        <p>{{ $errors->first('email') }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group mt-2">
                                {!! Form::label('username', 'Username', ['class' => 'form-label']) !!}
                                <div class="input-group-flat">
                                    {!! Form::text('username', null, ['class' => 'form-control', 'maxlength' =>32]) !!}
                                </div>
                                @if ($errors->has('username'))
                                    <div class="text-danger text-danger--space">
                                        <p>{{ $errors->first('username') }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group mt-2">
                            {!! Form::label('password', 'Password', ['class' => 'form-label']) !!}
                            <div class="input-group-flat">
                                {!! Form::password('password', ['class' => 'form-control', 'maxlength' =>16]) !!}
                            </div>
                            @if ($errors->has('password'))
                                <div class="text-danger text-danger--space">
                                    <p>{{ $errors->first('password') }}</p>
                                </div>
                            @endif
                        </div>

                        <div class="form-group mt-2">
                            {!! Form::label('password_confirmation', 'Confirm Password', ['class' => 'form-label']) !!}
                            <div class="input-group-flat">
                                {!! Form::password('password_confirmation', ['class' => 'form-control', 'maxlength' =>16]) !!}
                            </div>
                            @if ($errors->has('password_confirmation'))
                                <div class="text-danger text-danger--space">
                                    <p>{{ $errors->first('password_confirmation') }}</p>
                                </div>
                            @endif
                        </div>

                        <div class="form-footer">
                            <a class="btn btn-light" href="{{ route('app.users.list') }}">Cancel</a>
                            {!! Form::submit('Save', ['class' => 'btn accent_color']) !!}
                        </div>
                    </div>
                </div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection
<style>
    .error{
        margin-top: 5px;
        font-size: 14px;
        color: #d63939 !important;
    }
</style>
