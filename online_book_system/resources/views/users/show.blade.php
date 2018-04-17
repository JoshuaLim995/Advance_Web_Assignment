@extends('layouts.app')
@section('content')
<div class="panel-body container">
	<div class="card">
		<div class="card-header">
			<h1 align="center">View {{ $user->name }}</h1>
		</div>

		<div class="card-body">
			<div id="user-show">
				<script>
					var __props = {
						url: "{{ route('user.api-show', $user->id) }}",
					};
				</script>


			</div>
			<a href="{{ route('user.index') }}"><button class="btn">Done</button></a>

			<a href="{{ route('user.edit', ['id' => $user->id]) }}"><button class="btn btn-primary">Edit</button></a>
		</div>
	</div>
</div>
@endsection