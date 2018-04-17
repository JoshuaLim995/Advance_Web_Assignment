<?php
use App\User;

$user = Auth::user();
?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                    @if($user->isA('admin'))
                    Admin
                    @elseif($user->isA('member'))
                    Member
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
