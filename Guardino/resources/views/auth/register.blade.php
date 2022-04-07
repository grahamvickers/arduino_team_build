@extends('layouts.app')

@section('content')
<body id="authBody">
    <nav id="authNav">
        <img src="images/logo_symbol.svg" alt="logo">

        <a href="/">&#8617;</a>
    </nav>
    <!-- <div>
        <img src="images/plant.png" alt="plant overlay">
    </div> -->

    <section id="authCon">
        <div class="authDiv">
           <h2>Register</h2> 
           <h4>Create your new account</h4>
        </div>
        <div class="authDiv">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="formGroup">
                    <label for="name" class="formLabel">{{ __('Name') }}</label>

                    <div class="formInput">
                        <input id="name" type="text" class=" @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="formGroup">
                    <label for="email" class="formLabel">{{ __('E-Mail Address') }}</label>

                    <div class="formInput">
                        <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                        <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="formGroup">
                    <label for="password-confirm" class="formLabel">{{ __('Confirm Password') }}</label>

                    <div class="formInput">
                        <input id="password-confirm" type="password" class="" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="formGroup">
                    <p>By signing you agree to our terms of use and privacy agreement</p>
                </div>

                <div class="formGroup">
                    <div class="formInput">
                        <button type="submit" class="authBtn">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    
                
       
</body>
@endsection



