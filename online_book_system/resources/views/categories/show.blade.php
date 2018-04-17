<?php
use App\User;

$user = Auth::user();
?>
@extends('layouts.app')

@section('content')

<div class="panel-body container">
	<div class="card">
		<div class="card-header" align="center">
			<h1>
				{{ $category->name }} <a href="{{ route('category.edit', $category->id) }}">
				@if($user->isA('admin'))
				<button class="btn btn-primary">Rename</button></a>
				@endif
			</h1>			
		</div>

		<div class="card-body">

			@if(count($books) > 0)
			<table class="table">
				<thead>
					<tr>
						<th>No.</th>
						<th>Book</th>
					</tr>
				</thead>
				<tbody>
					@foreach($books as $i => $book)
					<tr>
						<td>{{ $i+1 }}</td>
						<td>
							{!! link_to_route(
								'book.show',
								$title = $book->title,
								$parameters = [
								'id' => $book->id
								])
								!!}
							</td>
						</tr>

						@endforeach
					</tbody>
				</table>
				@else
				<div>
					No Book Record...
				</div>
				@endif

				<a href="{{ route('category.index') }}"><button class="btn">Done</button></a>

				@if($user->isA('admin'))
				<a href="{{ route('category.destroy', ['id' => $category->id]) }}"><button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?');">Delete</button></a>
				@endif
			</div>
		</div>
	</div>
	@endsection