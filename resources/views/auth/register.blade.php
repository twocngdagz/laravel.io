@title('Register')

@extends('layouts.small')

@section('small-content')
    {!! Form::open(['route' => 'register.post']) !!}
        @formGroup('name')
            {!! Form::label('name') !!}
            {!! Form::text('name', session('githubData.name'), ['class' => 'form-control', 'required', 'placeholder' => 'John Doe']) !!}
            @error('name')
        @endFormGroup

        @formGroup('email')
            {!! Form::label('email') !!}
            {!! Form::email('email', session('githubData.email'), ['class' => 'form-control', 'required', 'placeholder' => 'john@example.com']) !!}
            @error('email')
        @endFormGroup

        @formGroup('username')
            {!! Form::label('username') !!}
            {!! Form::text('username', session('githubData.username'), ['class' => 'form-control', 'required', 'placeholder' => 'johndoe']) !!}
            @error('username')
        @endFormGroup

        @if (! session()->has('githubData'))
            @formGroup('password')
                {!! Form::label('password') !!}
                {!! Form::password('password', ['class' => 'form-control', Session::has('githubData') ? null : 'required']) !!}
                @error('password')
            @endFormGroup

            <div class="form-group">
                {!! Form::label('password_confirmation') !!}
                {!! Form::password('password_confirmation', ['class' => 'form-control', Session::has('githubData') ? null : 'required']) !!}
            </div>
        @endif

        @formGroup('rules')
            <label>
                {!! Form::checkbox('rules') !!}
                &nbsp; I agree to <a href="{{ route('rules') }}" target="_blank">the rules of the portal</a>
            </label>
            @error('rules')
        @endFormGroup

        {!! Form::submit('Register', ['class' => 'btn btn-primary btn-block']) !!}

        @if (! session()->has('githubData'))
            <a href="{{ route('login.github') }}" class="btn btn-default btn-block">
                <i class="fa fa-github"></i> Github
            </a>
        @endif
    {!! Form::close() !!}
@endsection
