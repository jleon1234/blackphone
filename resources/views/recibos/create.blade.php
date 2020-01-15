@extends('layouts.admin')

@section('title', 'Crear Recibo')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-tag"></i> Nuevo Recibo</h3>
                </div>
                <div class="box-body ">
                    <form action="/recibos" class="from-control" method="POST">
                        @csrf
                        {{-- Choice a cliente --}}
                        <div class="col-12 my-2">
                            <div class="form-group">
                                <label for="clientes">Elegir un cliente</label>
                                <select id="clientes" class="form-control" name="cliente">
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->id }}" >{{ $client->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
    
                        {{-- Info to the phone --}}
                        <div class="col-12 my-2">
                            <h3 class="text-center">Infromacion Telefono</h3>
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-4 text-center numero_recibo">
                                    <input class="form-control form-control-sm" type="text" placeholder="N° <?php printf("%06d",$recibo_numero);  ?>" value="<?php printf("%06d",$recibo_numero) ?>"  name="numero_recibo" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Marca <span>*</span></label>
                                        <div class="col">
                                            <input type="text" class="form-control" name="marca" value="{{ old('marca') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Modelo <span>*</span></label>
                                        <input type="text" class="form-control" name="modelo" value="{{ old('modelo') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Imei <span>*</span></label>
                                        <input type="text" class="form-control" name="imei" value="{{ old('imei') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Codigo <span>*</span></label>
                                        <input type="text" class="form-control" name="codigo" value="{{ old('codigo') }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="estado">Estado</label>
                                        <select id="estado" class="form-control" name="estado">
                                            <option value="en_revision" >En Revisión</option>
                                            <option value="en_proceso" >En Proceso</option>
                                            <option value="completado" >Completado</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Accesorios <span>*</span></label>
                                        <input type="text" class="form-control" name="accesorios" value="{{ old('accesorios') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col">
                                    <div class="form-group">
                                        <div class="col-md-12"> 
                                            <label>Daño</label> 
                                            <textarea class="form-control" name="daño" style="max-width:100%; min-width:100%; min-height:150px; max-height:150px">{{ old('daño') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Total</label>
                                <input type="number" class="form-control" id="total" name="total" nim="0">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Abono</label>
                                <input type="number" class="form-control" id="abono" name="abono" min="0" value="0">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Restante</label>
                                <input type="text" id="restante" class="form-control" id="restante" name="restante" value="$ 0.00" readonly >
                            </div>
                        </div>
                        <div class="col-md-3" style="margin-top: 25px">
                            <button type="submit" class="btn btn-primary d-block mx-auto"  >Guardar</button>
                        </div>
                        <div class="col-md-12">
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
                        </div>
                    </form>
                    
                </div>
                <!-- /.box-body -->
            </div>
        </div>
       
    </div>
    


@endsection