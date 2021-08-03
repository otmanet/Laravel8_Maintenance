@extends('masterDashboard')
@section('content')

<div class="container login-container">
    <div class="row">
        <div class="col-md-6 ads">
            <h1><span id="fl">OCP</span><br>
                <span id="sl"> anciennement Office chérifien des phosphates</span></h1>
        </div>
        <div class="col-md-6 login-form">
            <div class="profile-img">
                <img src="{{URL::asset('images/logo_ocp.jpg')}}" alt="profile_img" height="140px" width="160px;">
            </div>
            <h3>Modifier Departement</h3>
           <form action="/update/Departement/{{$dep->id}}" method="post">
            @csrf
            <div class="form-group">

                <input type="Text" class="form-control" value="{{$dep->name_d}}" name="name_d" placeholder="Enter Nom Departement" required>
            </div>
                <div class="form-group">
                    <button type="submit" id="login" class="btn btn-success btn-lg btn-block">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
