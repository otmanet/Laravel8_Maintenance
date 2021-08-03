
@extends('layouts.app')
@section('content')
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<div class="container login-container">
    <div class="row">
        <div class="col-md-6 ads">
            <h1><span id="fl">OCP</span><br>
                <span id="sl"> anciennement Office chérifien des phosphates</span></h1>
        </div>
        <div class="col-md-6 login-form">
            <div class="profile-img">
                <img src="{{asset('images/logo_ocp.jpg')}}" alt="profile_img" height="140px" width="160px;">
            </div>
            <h3>Mot de passe oublié</h3>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group">
                    <input placeholder="Enter Email...." id="email" type="email"
                        class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-lg btn-block">Envoyer le lien du mot de
                        passe</button>
                </div>
                <div class="form-group forget-password">
                    <a class="form-check-label" href="{{route('register')}}">Créer un nouveau compte</a>
                </div>
            </form>
        </div>
    </div>
</div>
    </div>
@endsection

