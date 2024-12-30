@extends('layouts.app')

@section('content')
<div class="container-login">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body whitout-padding-left">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="img-container">
                            <img src="{{asset('assets/img/logo-modelo.png')}}" alt="example" class="img_modelo">
                        </div>

                        <div class="row mb-3 cdb justify-content-center">
                            <label for="email" class="col-md-3 col-form-label  text-md-start">{{ __('Email Address') }}</label>
                            <div class="col-md-3 whitout-padding-left">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 cdb justify-content-center">
                            <label for="password" class="col-md-3 col-form-label  text-md-start">{{ __('Password') }}</label>
                            <div class="col-md-3 whitout-padding-left">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 cdb justify-content-center">
                            <div class="col-md-3 d-flex justify-content-center align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label ms-2" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                @if (Route::has('password.request'))
                                <a class="btn btn-link ms-3" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>


                        <div class="row mb-3 cdb justify-content-center">
                            <div class="col-md-3 text-center whitout-padding-left">
                                <button type="submit" class="btn btn-primary btn-lar">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                        {{-- <div class="row mb-3 cdb justify-content-center">
                            <div class="col-md-4 text-center whitout-padding-left">
                                @if (Route::has('register'))
                                <ul style="list-style: none;" class="register-container whitout-padding-left">
                                    <li class="nav-item">
                                        <a class="nav-link register-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                    </li>
                                </ul>
                                @endif
                            </div> 
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection