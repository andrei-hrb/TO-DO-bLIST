@extends('layouts.master')

@section('title') Register @endsection

@section('loginLink') /login @endsection
@section('registerLink') # @endsection
@section('register') selected @endsection

@section('main')
    <div class="container">

        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group row btn-lg">
                    <label for="name" class="col-md-4 col-form-label text-md-right" id="text">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name text" type="text" class="form-control form-control-lg{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus autocomplete="off">

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert" id="text">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row btn-lg">
                    <label for="email" class="col-md-4 col-form-label text-md-right" id="text">{{ __('E-Mail') }}</label>

                    <div class="col-md-6">
                        <input id="email text" type="email" class="form-control form-control-lg{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="off">

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert" id="text">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row btn-lg">
                    <label for="password" class="col-md-4 col-form-label text-md-right" id="text">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password text" type="password" class="form-control form-control-lg{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert" id="text">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row btn-lg">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right" id="text">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm text" type="password" class="form-control form-control-lg" name="password_confirmation" required>
                    </div>
                </div>

                <div class="form-group row mb-0 mx-auto mt-5">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-lg btn-outline-primary">
                            <span id="text">{{ __('Register') }}</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection
