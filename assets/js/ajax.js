$(document).ready(function() {
    $('#example1').DataTable();
    $('.select2').select2();

    /* $("#cedula").keyup(function(){
        var buscador = $("#cedula").val();
        console.log(buscador);

        // peticion ajax
        $.ajax({
            type: "POST",
            url: "http://localhost/sistema_ventas/Factura/ventas",
            data: {buscador: buscador},
            success: function (response) {
                console.log(response);
            }
        });
    });*/
    

});