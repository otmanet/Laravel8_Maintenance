@extends('masterDashboard')
@section('content')

<div class="row">
    <div class="col-md-12">
        <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Situation</th>
                    <th>Delete</th>

                </tr>
            </thead>

            <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Situation</th>
                    <th>Delete</th>
                </tr>
            </tfoot>

            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <select class="form-select" aria-label="Default select example"
                            onchange="location = this.value;">
                            @if($user->is_admin==0)
                            <option value="0">utilisateur</option>

                            <option value="Update/User/{{$user->id}}">
                               administrateur
                            </option>
                            @endif
                        </select>
                    </td>
                    <td>
                        <a href="/Delete/User/{{$user->id}}" data-placement="top" data-toggle="tooltip" title="Delete"><button
                                class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
