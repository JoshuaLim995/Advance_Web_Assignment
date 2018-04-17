<?php
use App\User;

$user = Auth::user();
?>
@extends('layouts.app')

@section('content')

<div class="panel-body container">
	<div class="card">
		<div class="card-header">
			<h1 align="center">Users</h1>
		</div>

		<div class="card-body">

			<a href="{{ route('user.create') }}"><button class="btn btn-primary">Register User</button></a>
			<div id="user-index">
				<script>
					var __props = {
						url: "{{ route('user.api-index') }}",
					};
				</script>
			</div>
		</div>
	</div>
</div>

@endsection