@extends('layouts.admin')

@section('title', 'Listar Recibos')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Listado de Ventas</h3>
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
                        <th># Venta</th>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th>Fecha de venta</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($ventas as $venta)
                        <tr>
                            <th scope="row">{{ $venta->id }}</th>
                            <td> {{ $venta->producto }} </td>
                            <td> $ {{ $venta->precio }} </td>
                            <td> {{ $venta->cantidad }} </td>
                            <td> $ {{ $venta->total  }} </td>
                            <td> {{ $venta->created_at  }} </td>
                            <td>
                                <a href="/ventas/{{$venta->id}}"  class="btn btn-primary"> <i class="fa fa-eye" aria-hidden="true"></i> </a>
                                <form action="{{route('ventas.destroy', $venta->id)}}" method="POST" class="d-inline">
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