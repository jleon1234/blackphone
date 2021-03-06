@extends('layouts.admin')

@section('title', 'Crear Cliente')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-tag"></i> Editar Cliente</h3>
                </div>
                <div class="box-body">
                    <form action="{{route('clientes.update', $clientUpdate->id)}}" class="from-control" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="">Nombres</label>
                            <input type="text" class="form-control" name="nombre" value="{{$clientUpdate->nombre}}">
                        </div>
                        <div class="form-group">
                            <label for="">Apellidos</label>
                            <input type="text" class="form-control" name="apellido" value="{{ $clientUpdate->apellido }}">
                        </div>
                        <div class="form-group">
                            <label for="">Cedúla</label>
                            <input type="text" class="form-control" name="cedula" value="{{ $clientUpdate->cedula }}" >
                        </div>
                        <div class="form-group">
                            <label for="">Direccion </label>
                            <input type="text" class="form-control" name="direccion" value="{{ $clientUpdate->direccion }}">
                        </div>
                        <div class="form-group">
                            <label for="">Telefono</label>
                            <input type="text" class="form-control" name="telefono" value="{{ $clientUpdate->telefono }}">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" name="email" value="{{ $clientUpdate->email }}">
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <h4>Por favor corrige los siguientes errores</h4>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <button type="submit" class="btn btn-primary d-block mx-auto">Actualizar</button>
                    </form>

                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>

@endsection