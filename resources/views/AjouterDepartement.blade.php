@extends('masterdashboard')
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
            <h3>Ajouter Departement</h3>
<form action="/Admin/AddDepartement" method="post">
    @csrf
    <div class="form-group">
        <input type="Text" class="form-control" placeholder="Enter Nom Departement" name="name_d" required>
    </div>
   <div class="form-group">
                    <button type="submit" id="login" class="btn btn-success btn-lg btn-block">Ajouter</button>
                </div>
</form>
        </div>
    </div>
</div>
@endsection
