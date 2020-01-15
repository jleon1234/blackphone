@extends('layouts.admin')

@section('title', 'Listar Clientes')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Listado de Clientes</h3>
                </div>
                @if (session('update'))
                    <div class="alert alert-success" id="alert" role="alert">
                        {{session('update')}}
                    </div>
                    <script>
                        setTimeout(function(){
                            let divAlert = document.querySelector('#alert');
                            divAlert.style.display = "none";
                        }, 2000);
                    </script>
                    
                @endif

                @if (session('delete'))
                    <div class="alert alert-danger" id="alert" role="alert">
                        {{session('delete')}}
                    </div>
                    <script>
                        setTimeout(function(){
                            let divAlert = document.querySelector('#alert');
                            divAlert.style.display = "none";
                        }, 2000);
                    </script>
                    
                @endif
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="tableClients" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Cedúla</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($clients as $client)
                    <tr>
                        <th scope="row">{{ $client->id }}</th>
                        <td> {{ $client->nombre }} </td>
                        <td> {{ $client->apellido }} </td>
                        <td> {{ $client->cedula }} </td>
                        <td> {{ $client->direccion }} </td>
                        <td> {{ $client->telefono }} </td>
                        <td>
                            <a class="btn btn-warning" href="/clientes/{{ $client->id}}/edit"> Editar </a>
                            <form action="{{route('clientes.destroy', $client->id)}}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" > Eliminar </button>
                            </form> 
                            
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                </div>
            <!-- /.box -->
        </div>
    </div>

@endsection