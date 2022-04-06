@extends('layouts.app')

@section('content')
<div id="authBody">
    <nav id="authNav">
        <img src="images/logo_symbol.svg" alt="logo">

        <a href="/">&#8617;</a>
    </nav>
    
    

    <section id="authCon">
        <div>
            <h2>Welcome Back</h2>
            <h4>Log in to your account</h4>
        </div> 
        <div>        
            <form id="formCon" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="formGroup">
                    <label for="email" class="formLabel">{{ __('E-Mail Address') }}</label>

                    <div class="formInput">
                        <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="formGroup">
                    <label for="password" class="formLabel">{{ __('Password') }}</label>

                    <div class="formInput">
                        <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="formGroup">
                    <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
                
                <div>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>
                </div>

                <div id="formGroupOptions">
                        <a href="{{ route('register') }}">
                                {{ __('Register') }}
                        </a>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                </div>
            </form>
        </div>
    </section>
    
     
</div>
@endsection

