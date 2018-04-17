

@extends('layouts.app')

@section('content')

<div class="container">

	<div class="card">
		<div class="card-header">Create Category</div>

		<div class="card-body">

	{!! Form::model($category, [
	'route' => ['category.update', $category->id],
	'method' => 'put',
	'class' => 'form-horizontal',
	]) 
	!!}

	{{-- Name --}}
	<div class="form-group row">
		{!! Form::label('category-name', 'Name', [
		'class' => 'control-label col-sm-2', 
		])
		!!}
		<div class="col-sm-7">
			{!! Form::text('name', null, [
			'id' => 'category-name',
			'class' => 'form-control',
			'maxlength' => 100,
			'required'
			]) 
			!!}
		</div>
	</div>


	<!-- Submit Button -->
	<div class="form-group row">
		<div class="col-sm-offset-3 col-sm-6">
			{!! Form::button('Save', [
			'type' => 'submit',
			'class' => 'btn btn-primary',
			]) 
			!!}
		</div>
	</div>

	{!! Form::close() !!}

	</div>
	</div>

</div>
@endsection