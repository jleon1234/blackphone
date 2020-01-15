@extends('layouts.admin')

@section('title', 'Ingresar nueva Venta')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-tag"></i> Nueva Venta</h3>
                </div>
                <div class="box-body">
                    <form action="/ventas" class="from-control" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Producto</label>
                            <input type="text" class="form-control" name="producto" value="{{old('producto')}}">
                        </div>
                        <div class="form-group">
                            <label for="">Precio</label>
                            <input type="number" id="precioVenta" class="form-control" name="precio" value="{{ old('precio') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Cantidad</label>
                            <input type="numer"  id="cantidadVenta" class="form-control" name="cantidad" value="{{ old('cantidad') }}" >
                        </div>
                        <div class="form-group">
                            <label for="">Total </label>
                            <input type="numer" class="form-control" name="total" id="totalVenta" value="{{ old('total') }}" readonly>
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

                        <button type="submit" class="btn btn-primary d-block mx-auto"  >Guardar</button>
                    </form>

                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>

@endsection