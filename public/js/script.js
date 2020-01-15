$(document).ready(function(){
    //Recibos
    $('#total').change(modificarRestante);
    $('#abono').change(modificarRestante);
    
    function modificarRestante(){
        let total = $('#total').val();
        let abono = $('#abono').val();
        let restante = parseFloat(total) - parseFloat(abono);
        if(restante < 0 ){
            alert('El restante no puede ser negativo');
        }else{
            let html=`${restante.toFixed(2)}`;
            $('#restante').val(html);
        }
        
    }
    $('#tableClients').DataTable();
    $('#tableRecibos').DataTable();


    // Venta 
    let precioVenta = $('#precioVenta');
    let cantidadVenta = $('#cantidadVenta');
    precioVenta.change(totalVenta);
    cantidadVenta.change(totalVenta);
    function totalVenta(){
        let precio = precioVenta.val();
        let cantidad = cantidadVenta.val();
        if(precio === ''){
            precio = 0;
        }
        if(cantidad === ''){
            cantidad = 0;
        }
        let total = parseFloat(precio) * parseFloat(cantidad);
        $('#totalVenta').val(total);
        
    }
    

});