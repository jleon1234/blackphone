@extends('layouts.admin')

@section('title', 'Ver Recibo')

@section('content')

<div class="row">
    <div class="col-md-3">
        
        <a href="/exportarPDF/{{$recibo->id}}" class="btn btn-primary btn-block margin-bottom" id="imprimir">Imprimir</a>

        <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Datos del Telefono</h3>

            <div class="box-tools">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            </div>
        </div>
        <div class="box-body no-padding">
            <ul class="nav nav-pills nav-stacked">
                <li><a href="mailbox.html"><i class="fa fa-inbox"></i> Marca: {{$recibo->marca}}</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> Modelo: {{$recibo->modelo}}</a></li>
                <li><a href="#"><i class="fa fa-file-text-o"></i> Imei: {{$recibo->imei}}</a></li>
                <li><a href="#"><i class="fa fa-filter"></i> Codigo: {{$recibo->codigo}}</a></li>
                <li><a href="#"><i class="fa fa-trash-o"></i> Daño: {{$recibo->daño}}</a></li>
            </ul>
        </div>
        <!-- /.box-body -->
        </div>
        <!-- /. box -->
        <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Cliente</h3>

            <div class="box-tools">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            </div>
        </div>
        <div class="box-body no-padding">
            <ul class="nav nav-pills nav-stacked">
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> {{$recibo->client->nombre}} {{$recibo->client->apellido}}</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i>{{ $recibo->client->cedula }}</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-light-blue"></i> {{ $recibo->client->telefono }} </a></li>
            </ul>
        </div>
        <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
        <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Recibo - Imprimir</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding recibo-imprimir" id="recibo-imprimir">
            <div class="cabecera-recibo">
                <div class="info-local">
                    <h3>Black Phone</h3>
                    <p>Leon Ponce Jordy David</p>
                    <p>Miguel Riofrio N° 158-35 entre Bernardo Valdivieso Y Bolivar</p>
                    <p>Cel: 0969006228</p>
                </div>
                <div class="info-numero-recibo">
                    <p>Fecha: {{$recibo->created_at}}</p>
                    <p class="recibo-texto">Recibo N°</p>
                    <p class="recibo-numero">{{$recibo->numero_recibo}}</p>
                </div>
            </div>
            <h3 class="text-center">Contrato te Trabajo</h3>
            <div class="datos-cliente">
                <p><b>Datos del Cliente</b></p>
                <hr>
                <div class="datos">
                    <p> <span>Nombres:</span> {{$recibo->client->nombre}} {{$recibo->client->apellido}}</p>
                    <p><span>Direccion:</span> {{ $recibo->client->direccion }}</p>
                    <p><span>Telefono:</span> {{ $recibo->client->telefono }}</p>
                </div>
            </div>
            <div class="datos-equipo">
                <p><b>Datos del Equipo</b></p>
                <hr>
                <div class="datos">
                    <p class="datos-principal" ><span>Equipo:</span> {{$recibo->marca}} </p>
                    <p class="datos-principal" ><span>Modelo:</span> {{$recibo->modelo}} </p>
                    <p class="datos-principal" ><span>Imei:</span> {{$recibo->imei}} </p>
                </div>
                <p>Daño: {{ $recibo->daño }}</p>
            </div>
            <div class="detalle-pagos">
                <p><b>Detalles de Pago</b></p>
                <hr>
                <div class="datos">
                    <p class="datos-principal" ><span>Costo Total:</span> <br/> $ {{$recibo->total}} </p>
                    <p class="datos-principal" ><span>Abono:</span> <br/> $ {{$recibo->abono}} </p>
                    <p class="datos-principal texto-rojo"><span>Saldo a Pagar:</span> <br/> {{$recibo->restante}} </p>
                </div>
            </div>
            <div class="politicas">
                <small>* El local no se responsabiliza por la procedencia del equipo</small>
                <small>* Pasados los treinta dias de no ser retirado el equipo se cobrara recargo . Art. 296. Código del trabajo</small>
                <small>* Este el el único documento para retirar el equipo, no insista</small>
                <small>* Todo teléfono que este mojado, golpeado o con falla de software, el local no se responsabiliza por el equipo</small>
            </div>
            
        </div>
        <!-- /.box-body -->
        </div>
        <!-- /. box -->
    </div>
    <!-- /.col -->
</div>



@endsection