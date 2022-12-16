$(function () {
    function obtenVehiculos() {
        $.getJSON("/api/obtenVehiculosDetalle", function (result) {
            return result;
        })
    }
    obtenVehiculos();
    $('#listaVehiculos').DataTable({
        "autoWidth": true,
        "info": false,
        "searching": false,
        "paging": false,
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "/api/obtenVehiculosDetalle",
            "dataSrc": "v"
        },
        columns: [
            { data: "matricula" },
            { data: "marca" },
            { data: "modelo" },
            { data: "caballos" },
            { data: "kilometros" },
            { data: "precio" },
            {
              data: null,
              defaultContent:
                '<a href="#" class="edit">Reservar</a> ',
            },
        ]
    });

    $('.tabla').css( 'display', 'block' );
    $('#listaVehiculos').columns.adjust().draw();
})