@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                <a  class="google-auth" href="{{ route('google.auth') }}">
                                    <svg width="21" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="ui-logged-button__icon"><path fill-rule="evenodd" clip-rule="evenodd" d="M23.5 12.3c0-.9 0-1.7-.2-2.5H12v4.7h6.5A5.5 5.5 0 0 1 16 18v3h3.8c2.3-2.1 3.6-5.2 3.6-8.8Z" fill="#4285F4"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M12 24c3.2 0 6-1 8-3l-4-3a7.2 7.2 0 0 1-10.7-3.7h-4v3c2 4 6 6.7 10.7 6.7Z" fill="#34A853"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M5.3 14.3a7.2 7.2 0 0 1 0-4.6v-3h-4a12 12 0 0 0 0 10.7l4-3.1Z" fill="#FBBC05"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M12 4.8c1.8 0 3.3.6 4.6 1.8L20 3A12 12 0 0 0 1.2 6.6l4 3.1c1-2.8 3.7-5 6.8-5Z" fill="#EA4335"></path></svg> <span class="ui-logged-button__text"><!----> <!----></span> <!---->
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
