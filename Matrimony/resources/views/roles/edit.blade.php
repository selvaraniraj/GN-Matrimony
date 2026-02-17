@extends('layouts.dashboard')

@section('title') Edit Role @endsection
@section('page_pre_title')  @endsection
@section('page_title') Edit Role @endsection

@section('content')
<div class="col-md-8" style="margin: auto;">
	<div class="card shadow">
		<div class="card-body">
			{!! Form::open(['url' => route('app.roles.edit', ['id' => $role->id]), 'id' => 'roleEditForm']) !!}
				<div class="form-group ">
					{!! Form::label('name', 'Role Name', ['class' => 'form-label']) !!}
					<div class="input-group-flat">
						{!! Form::text('name', $role->name , ['class' => 'form-control']) !!}
					</div>
                    <small class="form-hint">You have to specify the role name like manager or lead etc..</small>
					@if ($errors->has('name'))
                        <div class="text-danger text-danger--space">
                            <p>{{ $errors->first('name') }}</p>
                        </div>
                    @endif
                    {!! Form::hidden('id', $role->id) !!}
				</div>
				<div class="form-group mt-2">
					{!! Form::label('routes', 'Routes', ['class' => 'form-label']) !!}
					<ul class="tree" id="tree">
						<input type="checkbox" id="select-all" class="form-check-input"> Check All / Reset All
						<div class="row mt-2 v-scroll">
							@foreach($routes as $key => $valueDatas)
								<li class="li-text-bold">
								<input type="checkbox" data-p='{{ $key }}' class="form-check-input" @if(in_array($key, $selectRouteName)) checked @endif /> {{ $key }}
									<ul class="ul-remove-bullets">
										<li class="li-text-name">
											@foreach($valueDatas as $route)
												<label class="form-check mt-2 li-label-horizontal-align">
													<input type="checkbox" name="routes[]" class="form-check-input" value="{{ $route->id }}" @if(in_array($route->id, $seletedroutes)) checked @endif />
													<span class="form-check-label"> {{ $route->name }} </span>
												</label>
											@endforeach
										</li>
									</ul><hr>
								</li>
							@endforeach
						</div>
					</ul>
				</div>

				<div class="form-footer">
					<a class="btn btn-light" href="{{ route('app.roles.list') }}">Cancel</a>
					{!! Form::submit('Save', ['class' => 'btn accent_color']) !!}
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection
