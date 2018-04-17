<?php
use App\User;

$user = Auth::user();
?>
@extends('layouts.app')
@section('content')
<div class="panel-body container">

	<div class="card">
		<div class="card-header">
			<h1 align="center">
				{{ $book->title }}
			</h1>
		</div>

		<div class="card-body">

			<div id="book-show">
				<script>
					var __props = {
						url: "{{ route('book.api-show', $book->id) }}",
					};
				</script>
			</div>
			<a href="{{ route('book.index') }}"><button class="btn">Done</button></a>
			@if($user->isA('admin'))
			<a href="{{ route('book.edit', ['id' => $book->id]) }}"><button class="btn btn-primary">Edit</button></a>
			<a href="{{ route('book.destroy', ['id' => $book->id]) }}"><button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this book?');">Delete</button></a>
			@endif
		</div>
	</div>

</div>
@endsection