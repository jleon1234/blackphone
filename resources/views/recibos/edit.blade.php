@extends('layouts.admin')

@section('title', 'Crear Recibo')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-tag"></i> Editar Recibo</h3>
                </div>
                <div class="box-body ">
                    <form action="{{route('recibos.update', $reciboUpdate->id)}}"  class="from-control" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="col-12 my-2">
                            <div class="form-group">
                                <label for="">Cliente</label>
                                <div class="col">
                                <input type="hidden" class="form-control" name="cliente" value="{{$reciboUpdate->client->id}}" readonly>
                                <input type="value" class="form-control" name="nombre" value="{{$reciboUpdate->client->nombre}}" readonly>
                                </div>
                            </div>
                        </div>
                        {{-- Info to the phone --}}
                        <div class="col-12 my-2">
                            <h3 class="text-center">Infromacion Telefono</h3>
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-4 text-center numero_recibo">
                                    <input class="form-control form-control-sm" type="text" placeholder="N° <?php printf("%06d",$reciboUpdate->numero_recibo);  ?>" value="<?php printf("%06d",$reciboUpdate->numero_recibo) ?>"  name="numero_recibo" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Marca <span>*</span></label>
                                        <div class="col">
                                        <input type="text" class="form-control" name="marca" value="{{$reciboUpdate->marca}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Modelo <span>*</span></label>
                                        <input type="text" class="form-control" name="modelo" value="{{$reciboUpdate->modelo}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Imei <span>*</span></label>
                                        <input type="text" class="form-control" name="imei" value="{{$reciboUpdate->imei}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Codigo <span>*</span></label>
                                        <input type="text" class="form-control" name="codigo" value="{{$reciboUpdate->imei}}">
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
                                            <textarea class="form-control" name="daño" style="max-width:100%; min-width:100%; min-height:150px; max-height:150px">{{$reciboUpdate->daño}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Total</label>
                                <input type="number" class="form-control" id="total" name="total" nim="0" value="{{$reciboUpdate->total}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Abono</label>
                                <input type="number" class="form-control" id="abono" name="abono" min="0" value="{{$reciboUpdate->abono}}" >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Restante</label>
                                <input type="text" id="restante" class="form-control" id="restante" name="restante" value="{{$reciboUpdate->restante}}" readonly >
                            </div>
                        </div>
                        <div class="col-md-3" style="margin-top: 25px">
                            <button type="submit" class="btn btn-primary d-block mx-auto"  >Actualizar</button>
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