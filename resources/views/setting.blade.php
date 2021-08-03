@extends('home')
@section('content')
 <div class="container" style="position: absolute; top: 0;margin-top: 70px;">
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
                <h3>Setting</h3>
                <form method="POST" action="/updateSetting/{{Auth::user()->id}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group" style="display:flex;justify-items: center;margin-left: 230px">

                        <input  class="form-control @error('photo') is-invalid @enderror" type="file" name="photo" accept="image/*" multiple
                            id="file" onchange="loadFile(event)" style="display: none;"  />
                        <img id="output" class="image rounded-circle" src="{{asset('/files/'.Auth::user()->photo)}}"
                            style="width: 100px;height: 100px; margin: 0px;border: 1px black solid" />
                        @error('photo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <label for="file" style="cursor: pointer;display:flex;justify-items: center;margin-left: 230px">Modifier Image</label>
                    <div class="form-group">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                             required autocomplete="name" autofocus  value="{{$user->name}}" >

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ $user->email }}" required autocomplete="email" placeholder="Email....">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                            required autocomplete="new-password" placeholder="Password....">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" id="login" class="btn btn-success btn-lg btn-block">Modifier</button>
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

 </div>
@endsection
