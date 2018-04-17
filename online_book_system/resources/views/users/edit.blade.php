

@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card">
        <div class="card-header">Register User</div>

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

            {!! Form::model($user, [
            'route' => ['user.update', $user->id],
            'method' => 'put',
            'class' => 'form-horizontal',
            ]) 
            !!}

            {{-- Name --}}
            <div class="form-group row">
                {!! Form::label('user-name', 'Name', [
                'class' => 'control-label col-sm-2', 
                ])
                !!}
                <div class="col-sm-7">
                    {!! Form::text('name', null, [
                    'id' => 'user-name',
                    'class' => 'form-control',
                    'maxlength' => 100,
                    'required'
                    ]) 
                    !!}
                </div>
            </div>

            {{-- E-Mail Address --}}
            <div class="form-group row">
                {!! Form::label('user-email', 'E-Mail Address', [
                'class' => 'control-label col-sm-2', 
                ])
                !!}
                <div class="col-sm-7">
                    {!! Form::text('email', null, [
                    'id' => 'user-email',
                    'class' => 'form-control',
                    'required'
                    ]) 
                    !!}
                </div>
            </div>

            {{-- Role --}}
            <div class="form-group row">
                {!! Form::label('user-role', 'Role', [
                'class' => 'control-label col-sm-2', 
                ])
                !!}
                <div class="col-sm-7">
                    {!! Form::select('role', 
                    ['admin' => 'Administrator', 'member' => 'Member'], 
                    $user->roles()->pluck('name'), 
                    [
                    'placeholder' => 'Pick a role...',
                    'class' => 'form-control',
                    ]);

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