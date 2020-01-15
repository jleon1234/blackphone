<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Factura</title>
  </head>
  <body>
    <div class="container" style="width:900px; height=auto; margin:0 auto; border: 1px solid #000; padding: 10px 20px;">
      <div class="cabecera-recibo">
           <div class="info-local" style="width: 700px;float: left;">
               <h2>Black Phone</h2>
               <p>Leon Ponce Jordy David</p>
               <p>Miguel Riofrio N° 158-35 entre Bernardo Valdivieso Y Bolivar</p>
               <p>Cel: 0969006228</p>
           </div>
           <div class="info-numero-recibo" style="width: 200px; float: right;">
               <p>Fecha: {{$created_at}}</p>
               <p class="recibo-texto" style="border:1px solid #e1e1e1;padding: 10px;margin:0;width: 100px;text-align: center;">Recibo N°</p>
               <p class="recibo-numero" style="border:1px solid #e1e1e1;padding: 10px;margin: 0;;width: 100px;text-align: center;">{{$numero_recibo}}</p>
           </div>
        </div>
        <div style="clear: both" ></div>
        <h3 class="text-center">Contrato te Trabajo</h3>
        <div class="datos-cliente">
            <p><b>Datos del Cliente</b></p>
            <hr>
            <div class="datos">
                <p style="width: 50%;float: left;"> <span>Nombres:</span> {{$client->nombre}} {{$client->apellido}}</p>
                <p style="width: 50%;float: left;"><span>Direccion:</span> {{ $client->direccion }}</p>
                
            </div>
            <div style="clear: both" ></div>
            <div class="datos" style="margin-top:10px">
                <p style="width: 50%;float: left;"><span>Telefono:</span> {{ $client->telefono }}</p>
                <p style="width: 50%;float: left;"><span>Email:</span> email</p>
                
            </div>
        </div>
        <div style="clear: both" ></div>
        <div class="datos-equipo">
            <p><b>Datos del Equipo</b></p>
            <hr>
            <div class="datos">
                <p class="datos-principal" style="float: left;width: 50%" ><span>Equipo:</span> {{$marca}} </p>
                <p class="datos-principal" style="float: left;width: 50%"><span>Modelo:</span> {{$modelo}} </p>
            </div>
            <div style="clear: both" ></div>
            <div class="datos" style="margin:10px">
                <p class="datos-principal" style="float: left;width: 30%"><span>Imei:</span> {{$imei}} </p>
            </div>
            <div style="clear: both" ></div>
            <p style="margin-top: 10px">Daño: {{ $daño }}</p>
            
        </div>
        <div class="detalle-pagos" >
            <p style="margin-top:15px" ><b>Detalles de Pago</b></p>
            <hr>
            <div class="datos" style="width: 100%; margin: 15px 0">
                <p class="datos-principal" style="float: left;width: 30%"><span>Costo Total:</span>  $ {{$total}} </p>
                <p class="datos-principal" style="float: left;width: 30%"><span>Abono:</span>  $ {{$abono}} </p>
                <p class="datos-principal texto-rojo" style="float: left;width: 30%;color:red"><span style="color:#000">Saldo a Pagar:</span>  $ {{$restante}} </p>
            </div>
        </div>
        <div style="clear: both" ></div>
        <div class="politicas" style="border: 1px solid #e1e1e1; padding: 10px; margin-top:10px">
            <p><small>* El local no se responsabiliza por la procedencia del equipo</small></p>
            <p><small>* Pasados los treinta dias de no ser retirado el equipo se cobrara recargo . Art. 296. Código del trabajo</small></p>
            <p><small>* Este el el único documento para retirar el equipo, no insista</small></p>
            <p><small>* Todo teléfono que este mojado, golpeado o con falla de software, el local no se responsabiliza por el equipo</small></p>
        </div>
    </div>
  </body>
</html>
