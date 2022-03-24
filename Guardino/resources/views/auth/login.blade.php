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


                    <div class="login-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row mt-4">
                                <div class="col-md-6">
                                    <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Username" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mt-4">
                                <div class="col-md-6">
                                    <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mt-2">
                                <div class="col-md-8 centered">
                                    <a class="btn btn-link" href="{{ route('register') }}">
                                        {{ __('Register') }}
                                    </a>

                                </div>
                            </div>

                            <div class="form-group row mt-2">
                                <div class="col-md-8 ml-2">

                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}" style="width:110%;">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif

                                    <button type="submit" class="btn login-btn">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>

                            {{-- <div class="form-group row mb-0 mt-2">
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div> --}}
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection

