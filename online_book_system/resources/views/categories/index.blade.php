<?php
use App\User;

$user = Auth::user();
?>
@extends('layouts.app')

@section('content')

<div class="panel-body container">
	<div class="card">
		<div class="card-header">
			<h1 align="center">Category</h1>
		</div>

		<div class="card-body">
			@if($user->isA('admin'))
			<a href="{{ route('category.create') }}"><button class="btn btn-primary">Add Category</button></a>
			@endif
			<div id="category-index">
				<script>
					var __props = {
						url: "{{ route('category.api-index') }}",
					};
				</script>
			</div>
		</div>
	</div>
</div>
@endsection