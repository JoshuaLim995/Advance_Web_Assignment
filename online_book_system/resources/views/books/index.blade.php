<?php
use App\User;

$user = Auth::user();
?>
@extends('layouts.app')

@section('content')

<div class="panel-body container">
	<div class="card">
		<div class="card-header">
			<h1 align="center">Books</h1>
		</div>

		<div class="card-body">

			@if($user->isA('admin'))
			<a href="{{ route('book.create') }}"><button class="btn btn-primary">Add Book</button></a>
			@endif
			<div id="book-index">
				<script>
					var __props = {
						url: "{{ route('book.api-index') }}",
					};
				</script>
			</div>
		</div>
	</div>
</div>
@endsection