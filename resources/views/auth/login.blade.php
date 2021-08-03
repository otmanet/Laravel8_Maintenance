@extends('layouts.app')
@section('content')
<div class="container login-container">
    <div class="row">
        <div class="col-md-6 ads">
            <h1><span id="fl">OCP</span><br>
                <span id="sl"> anciennement Office chérifien des phosphates</span></h1>
        </div>
        <div class="col-md-6 login-form">
            <div class="profile-img">
                <img src="images/logo_ocp.jpg" alt="profile_img" height="140px" width="160px;">
            </div>
            <h3>Login</h3>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                    placeholder="Email....">
                      @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="form-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"
                                  placeholder="Password....">
                     @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>

                <div class="form-group">
                    <button type="submit" id="login" class="btn btn-success btn-lg btn-block">Login</button>
                </div>
                <div class="form-group forget-password">

                     @if (Route::has('password.request'))
                                    <a  href="{{route('password.request')}}">
                                        {{ __('Mot de passe oublié ?') }}
                                    </a>
                                @endif
                    <a class="form-check-label" href="{{route('register')}}">Créer un nouveau compte</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
