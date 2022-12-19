$(function () {
/*     function obtenVehiculos() {
        $.getJSON("/api/obtenVehiculosDetalle", function (result) {
            return result;
        })
    }
    obtenVehiculos(); */
    var table = $('#listaVehiculos').DataTable({
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
              targets: -1,
              data: null,
              defaultContent:
                '<button>Reserva</button>',
            },
        ]
    });

    $('#listaVehiculos tbody').on('click', 'button', function () {
        var data =table.row($(this).parents('tr')).data();
        $.ajax({
            url: "/api/addCita/"+data['id'],
            type: 'post',
            data : data,
        })
        alert(data['id']);

    });

    $('.tabla').css( 'display', 'block' );
})