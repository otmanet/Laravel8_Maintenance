@extends('masterdashboard')
@section('content')


        <div class="row">
            <div class="col-md-12">
                <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Date-Create</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Date-Create</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>

                    <tbody>
                        @foreach($departement as $dep)
                        <tr>
                            <td>{{$dep->id}}</td>
                            <td>{{$dep->name_d}}</td>
                            <td>{{$dep->created_at}}</td>
                            <td>
                                <a  href="/edit/Departement/{{$dep->id}}" data-placement="top" data-toggle="tooltip" title="Edit"><button
                                        class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></button>
                                </a>
                            </td>
                            <td>
                                <a href="/Delete/Departement/{{$dep->id}}" data-placement="top" data-toggle="tooltip" title="Delete"><button
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
