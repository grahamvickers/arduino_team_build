@extends('layouts.app')

@section('content')
<body id="loginBody">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6" style="padding: 4%;">
                <div class="login_logo">
                    <img src="{{ asset('images/mainLogo.svg') }}" height="80%" width="100%">
                </div>
                {{-- <div class="login_heading_logo">
                    <img src="">
                </div> --}}
            </div>
            <div class="col-md-6">
                <div class="login-card">
                    <div class="form-flex">
                        <div class="login-header">{{ __('Welcome To') }}</div>
                        <div class="login-header" style="color: #60a55f; margin-left: 30px; font-size: 50px;">{{ __('Flora') }}</div>

                        <div class="login-header-small">{{ __('Login to your account') }}</div>

                    <br>
                    <br>
                    <div class="login-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
                                    <br>
                                    <br>
                                    <a class="btn btn-link" href="{{ route('register') }}">
                                            {{ __('Register') }}
                                    </a>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>


                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection

