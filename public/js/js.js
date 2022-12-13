$(function () {
    function obtenVehiculos() {
        $.getJSON("/api/obtenVehiculosDetalle", function (result) {
            return result;
        })
    }
    
    debugger
    $('#listaVehiculos').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "/api/obtenVehiculosDetalle"
    });
})