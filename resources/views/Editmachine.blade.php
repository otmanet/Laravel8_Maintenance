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
            <h3>Modifier Machine</h3>
            <form action="/Admin/UpdateMachine/{{$mach->id}}" method="post">
                @csrf
                <div class="form-group">

                    <input type="Text" class="form-control" name="name_m" placeholder="Enter Nom Machine" value="{{$mach->name_m}}" required>
                </div>
                <div class="form-group">
                    <input type="Text" class="form-control" name="serie" placeholder="Enter Serie Machine" value="{{$mach->serie}}" required>
                </div>
                <div class="form-group">
                    <select class="form-select" name="departement_id" aria-label="Default select example" >
                        <option selected value="{{$mach->departement_id}}">Ouvrir ce menu de sélection</option>
                        @foreach($departements as $dep)
                        <option value="{{$dep->id}}">{{$dep->name_d}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" id="login" class="btn btn-success btn-lg btn-block">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
