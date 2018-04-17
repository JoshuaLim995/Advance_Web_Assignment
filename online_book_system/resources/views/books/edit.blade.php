<?php

use App\Category;

?>

@extends('layouts.app')

@section('content')


<div class="container">

	<div class="card">
		<div class="card-header">Edit Book</div>

		<div class="card-body">

			<!-- Display Error Message -->
			@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif

			
			{!! Form::model($book, [
			'route' => ['book.update', $book->id],
			'method' => 'put',
			'class' => 'form-horizontal',
			]) 
			!!}

			{{-- ISBN --}}
			<div class="form-group row">
				{!! Form::label('book-isbn', 'ISBN', [
				'class' => 'control-label col-sm-2', 
				])
				!!}
				<div class="col-sm-7">
					{!! Form::text('isbn', null, [
					'id' => 'book-isbn',
					'class' => 'form-control',
					'maxlength' => 100,
					'required'
					]) 
					!!}
				</div>
			</div>

			{{-- Title --}}
			<div class="form-group row">
				{!! Form::label('book-title', 'Title', [
				'class' => 'control-label col-sm-2', 
				])
				!!}
				<div class="col-sm-7">
					{!! Form::text('title', null, [
					'id' => 'book-title',
					'class' => 'form-control',
					'maxlength' => 100,
					'required'
					]) 
					!!}
				</div>
			</div>

			{{-- Synopsis --}}
			<div class="form-group row">
				{!! Form::label('book-synopsis', 'Synopsis', [
				'class' => 'control-label col-sm-2', 
				])
				!!}
				<div class="col-sm-7">
					{!! Form::textarea('synopsis', null, [
					'id' => 'book-synopsis',
					'class' => 'form-control',
					]) 
					!!}
				</div>
			</div>


			{{-- Author --}}
			<div class="form-group row">
				{!! Form::label('book-author', 'Author', [
				'class' => 'control-label col-sm-2', 
				])
				!!}
				<div class="col-sm-7">
					{!! Form::text('author', null, [
					'id' => 'book-author',
					'class' => 'form-control',
					'maxlength' => 100,
					'required'
					]) 
					!!}
				</div>
			</div>

			{{-- Edition --}}
			<div class="form-group row">
				{!! Form::label('book-edition', 'Edition', [
				'class' => 'control-label col-sm-2', 
				])
				!!}
				<div class="col-sm-7">
					{!! Form::text('edition', null, [
					'id' => 'book-edition',
					'class' => 'form-control',
					'maxlength' => 50,
					'required'
					]) 
					!!}
				</div>
			</div>

			{{-- Edition Year --}}
			<div class="form-group row">
				{!! Form::label('book-edition_year', 'Edition Year', [
				'class' => 'control-label col-sm-2', 
				])
				!!}
				<div class="col-sm-7">
					{!! Form::text('edition_year', null, [
					'id' => 'book-edition_year',
					'class' => 'form-control',
					'maxlength' => 4,
					'required'
					]) 
					!!}
				</div>
			</div>

			{{-- Category --}}
			<div class="form-group row">
				{!! Form::label('select_categories', 'Select Categories', [
				'class' => 'control-label col-sm-2',
				])
				!!}
				<div class="col-sm-7">
					{!! Form::select('categories[]', Category::pluck('name', 'id'), null, [
					'class' => 'select2-form form-control',
					'multiple' => true,
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