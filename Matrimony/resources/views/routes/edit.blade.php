@extends('layouts.dashboard')

@section('title') Edit Route @endsection
@section('page_pre_title')  @endsection
@section('page_title') Edit Route @endsection

@section('content')
<div class="col-md-6" style="margin: auto;">
	<div class="card shadow">
		<div class="card-body">
			{!! Form::open(['url' => route('app.routes.edit', ['id' => $route->id])]) !!}
                <div class="form-group ">
                    {!! Form::label('name', 'Route Name', ['class' => 'form-label']) !!}
                    <div>
                        {!! Form::text('name', $route->name, ['class' => 'form-control']) !!}
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
                    <div>
                        {!! Form::text('path', $route->path, ['class' => 'form-control']) !!}
                    </div>
                    @if ($errors->has('path'))
                        <div class="text-danger text-danger--space">
                            <p>{{ $errors->first('path') }}</p>
                        </div>
                    @endif
                </div>

				<div class="form-footer">
					<a class="btn btn-light" href="{{ route('app.routes.list') }}">Cancel</a>
					{!! Form::submit('Save', ['class' => 'btn accent_color']) !!}
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection
