@extends('layouts.admin')

@section('title', 'Listar Recibos')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Listado de Recibos</h3>
                </div>
                @if (session('create') || session('delete') || session('update'))
                    <div class="alert alert-success" id="alert" role="alert">
                        {{session('create')}}
                        {{session('delete')}}
                        {{session('update')}}
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
                    <table id="tableRecibos" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th># Recibo</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Imei</th>
                        <th>Daño</th>
                        <th>Patron</th>
                        <th>Dueño</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($recibos as $recibo)
                        <tr>
                            <th scope="row">{{ $recibo->id }}</th>
                            <td> {{ $recibo->marca }} </td>
                            <td> {{ $recibo->modelo }} </td>
                            <td> {{ $recibo->imei }} </td>
                            <td> {{ $recibo->daño  }} </td>
                            <td> {{ $recibo->codigo }} </td>
                            <td>
                                {{ $recibo->client->nombre }} <br/>
                                tel: {{ $recibo->client->telefono }} <br/>
                            </td>
                            <td>
                                @switch($recibo->estado)
                                    @case('en_revision')
                                        <span class="label label-danger">En Revisión</span> 
                                        @break
                                    @case('en_proceso')
                                        <span class="label label-warning">En Proceso</span> 
                                        @break
                                    @case('completado')
                                        <span class="label label-success">Completado</span> 
                                        @break
                                    @default
                                        
                                @endswitch
                                
                            </td>
                            <td>
                                <a href="/recibos/{{$recibo->id}}"  class="btn btn-primary"> <i class="fa fa-eye" aria-hidden="true"></i> </a>
                                <a class="btn btn-warning" href="/recibos/{{ $recibo->id}}/edit" > <i class="fa fa-pencil" aria-hidden="true"></i> </a>
                                <form action="{{route('recibos.destroy', $recibo->id)}}" method="POST" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                    <button class="btn btn-danger" type="submit" > <i class="fa fa-trash" aria-hidden="true"></i></button>
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