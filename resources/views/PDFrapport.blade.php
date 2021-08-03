@extends('home')
@section('content')
<div class="row">
    <div class="col-md-12">
        <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Crée par</th>
                    <th>Nom</th>
                    <th>Date Debut</th>
                    <th>Date Fin</th>
                    <th>Type Maintances</th>
                    <th>Nome Departement</th>
                    <th>Nom Machine</th>
                    <th>Serie Machine</th>
                    <th>Material</th>
                    <th>Créé A</th>
                    <th>Montre moi le</th>
                    <th>Situation</th>

                </tr>
            </thead>

            <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Crée par</th>
                    <th>Nom</th>
                    <th>Date Debut</th>
                    <th>Date Fin</th>
                    <th>Type Maintances</th>
                    <th>Nome Departement</th>
                    <th>Nom Machine</th>
                    <th>Serie Machine</th>
                    <th>Material</th>
                    <th>Créé A</th>
                    <th>Montre moi le</th>
                    <th>Situation</th>

                </tr>
            </tfoot>

            <tbody>
                @foreach($maintances as $main)
                <tr>
                    <td>{{$main->id}}</td>
                    <td>{{$main->username}}</td>
                    <td>{{$main->name_maintance}}</td>
                    <td>{{$main->dateDebut}}</td>
                    <td>{{$main->dateFin}}</td>
                    <td>{{$main->TypeMaintence}}</td>
                    <td>{{$main->nameDepartement}}</td>
                    <td>{{$main->machineName}}</td>
                    <td>{{$main->serie}}</td>
                    <td>{{$main->material}}</td>
                    <td>{{$main->created_at}}</td>
                    <td>
                        <a href="/Admin/PDF/Maintance/{{$main->id}}" data-placement="top" data-toggle="tooltip"
                            title="pdf"><button class="btn btn-primary btn-xs">PDF</button>
                        </a>
                    </td>

                        <td>

                            @if($main->valide==0)
                            <p>Non Valide</p>
                            @elseif($main->valide==1)
                            <p>Valide</p>
                            @endif
                        </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
