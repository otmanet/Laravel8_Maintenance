@extends('layouts.app')
@section('content')
<div class="container login-container" >
    <div class="row">
        <div class="col-md-6 ads">
            <h1><span id="fl">OCP</span><br>
                <span id="sl"> anciennement Office chérifien des phosphates</span></h1>
        </div>
        <div class="col-md-6 login-form">
            <div class="profile-img">
                <img src="images/logo_ocp.jpg" alt="profile_img" height="140px" width="160px;">
            </div>
            <h3>Register</h3>
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group" style="display:flex;justify-items: center;margin-left: 230px">

                    <input class="form-control @error('photo') is-invalid @enderror" type="file" name="photo" accept="image/*" multiple id="file" onchange="loadFile(event)"
                        style="display: none;" />
                    <img id="output" class="image rounded-circle" style="width: 100px;height: 100px; margin: 0px;border: 1px black solid"/>
                      @error('photo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
<label for="file" style="cursor: pointer;display:flex;justify-items: center;margin-left: 230px">Upload Image</label>
                   <div class="form-group">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nom d'utilisateur....">

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email....">
                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="form-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password....">
                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                 <div class="form-group">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password....">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-lg btn-block">Register</button>
                </div>
                <div class="form-group forget-password">
                    @if (Route::has('password.request'))
                                    <a  href="{{route('password.request')}}">
                                        {{ __('Mot de passe oublié ?') }}
                                    </a>
                                @endif
                    <a class="form-check-label" href="login">J'ai déjà un compte</a>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    var loadFile = function(event) {
    var image = document.getElementById('output');
    image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
@endsection
