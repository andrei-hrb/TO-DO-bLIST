@extends('layouts.master')

@section('title') Login @endsection

@section('loginLink') # @endsection
@section('registerLink') /register @endsection
@section('login') selected @endsection

@section('main')
    <div class="container">

        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group row btn-lg">
                    <label for="email" class="col-sm-4 col-form-label text-md-right" id="text">{{ __('E-Mail') }}</label>

                    <div class="col-md-6">
                        <input id="email text" type="email" class="form-control form-control-lg{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

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
                        <input id="password" type="password" class="form-control form-control-lg{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert" id="text">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-0 mx-auto mt-5">
                    <div class="col-md-8 offset-md-4 mr-3">
                        <button type="submit" class="btn btn-lg btn-outline-primary">
                            <span id="text">{{ __('Login') }}</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        let elements = document.getElementsByClassName("form-control");
        let currentIndex = 0;

        document.onkeydown = function(e) {
            switch (e.keyCode) {
                case 38:
                    currentIndex = (currentIndex === 0) ? elements.length - 1 : --currentIndex;
                    elements[currentIndex].focus();
                    break;
                case 40:
                    currentIndex = ((currentIndex + 1) === elements.length) ? 0 : ++currentIndex;
                    elements[currentIndex].focus();
                    break;
            }
        };
    </script>
@endsection
