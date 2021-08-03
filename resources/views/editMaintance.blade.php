@extends('home')
@section('content')
<style>
    input[type=text],
    select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=submit] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }
</style>
<h3>Modifier Maintenance</h3><br>

<div>
    <form action="/Modifier/Maintance/{{$main->id}}" method="post">
        @csrf
        <label for="fname">Nom Maintenance</label>
        <input type="text" id="fname" name="name_maintance" placeholder="Nom Maintenance.." value="{{$main->name_maintance}}"><br><br>

        <label for="lname">Date Debut</label>
        <input type="date" id="lname" name="dateDebut" style="margin-right: 60px" value="{{$main->dateDebut}}">
        <label for="lname">Date Fin</label>
        <input type="date" id="lname" name="dateFin" value="{{$main->dateFin}}"><br><br>
        <label for="lname">Type Maintenance</label>
        <input type="text" id="lname" name="TypeMaintence" value="{{$main->TypeMaintence}}">
        <label for="country">Departement</label>
        <select id="country" name="departement_id">
            <option selected value="{{$main->departement_id}}">Ouvrir ce menu de sélection</option>
            @foreach($departements as $dep)
            <option value="{{$dep->id}}">{{$dep->name_d}}</option>
            @endforeach
        </select>
        <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
        <label for="country">Machine</label>
        <select name="machine_id">
            <option selected value="{{$main->machine_id}}">Ouvrir ce menu de sélection</option>
            @foreach($machines as $mach)
            <option value="{{$mach->id}}">{{$mach->name_m}}-{{$mach->serie}}</option>
            @endforeach
        </select><br><br>
        <label for="country">matérielle</label>
        <textarea name="material" id="" cols="50" rows="10" style="width:100%" >{{$main->material}}</textarea>
        <input type="hidden" value="0" name="valide">
        <input type="submit" value="Ajouter">
    </form>
</div>
@endsection
