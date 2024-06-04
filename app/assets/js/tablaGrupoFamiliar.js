$(document).ready(function () {

    $.post("includes/grupo_function.php", {
        eliminarDetalles: $('#idGrupoFamiliar').val()
    });

    $.post("includes/grupo_function.php", {
        asd: $('#idGrupoFamiliar').val()
    }, function (result) {
        $('#idUlt').html(result);
    });
    console.log($('#idGrupoFamiliar').val());


    var idGrupoFamiliar, opcion;
    idGrupoFamiliar = $('#idGrupoFamiliar').val();
    opcion = 4;

    tablaGrupoFamiliar = $('#tablaGrupoFamiliar').DataTable({
        "destroy": true,
        "ajax": {
            "url": "models/grupoFamiliarTabla_model.php",
            "method": "POST",
            "data": {
                opcion: opcion,
                idGrupoFamiliar: idGrupoFamiliar
            }, //envio opcion 4 para que haga un SELECT
            "dataSrc": ""
        },
        "columns": [{
                "data": "id",
                "visible": false,
                "searchable": false
            },
            {
                "data": "idPersona",
                "visible": false,
                "searchable": false
            },
            {
                "data": "nombre"
            },
            {
                "data": "dni"
            },
            {
                "defaultContent": "<div class='text-center'><div class='btn-group'><button type='button' class='btn btn-danger btn-sm btnBorrarDetalleGrupo'><i class='fas fa-trash-alt'></i></button></div></div>"
            }
        ],
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
        },
        "scrollY": "520px",
        "scrollCollapse": true,
        "paging": false,
        "info": false,
        "lengthChange": false,
        "searching": false,
        "ordering": false
    });


    var fila; //obtengo la fila, para editar o eliminar

    //submit para el Alta y Actualización de Compra
    /* $('#formCompra').submit(function (e) {
        e.preventDefault(); //no dejar que recargue la pág
        if (idMovimiento == 0) {
            opcion = 1; //INSERT
        } else {
            opcion = 2; //UPDATE
        }

        fecha = $.trim($('#fecha').val());
        idProveedor = $.trim($('#idProveedoor').val());
        formaPago = $.trim($('#formaPago').val());
        totalCompra = $.trim($('#totalCompra').val());
        if (costoTotal == "") costoTotal = 0;
        $.ajax({
            url: "models/comprasTabla_model.php",
            type: "POST",
            datatype: "json",
            data: {
                idDetalleMov: idDetalleMov,
                idCompra: idCompra,
                fechaCompra: fechaCompra,
                costoTotal: costoTotal,
                opcion: opcion
            },
            success: function (data) {
                window.location = "index.php?accion=Compras";
            }
        });


    }); */


    //submit para el Alta y Actualización de Detalles
    $('#formDetalleGrupo').submit(function (e) {
        e.preventDefault(); //no dejar que recargue la pág
        idGrupoFamiliar = $.trim($('#idGrupoFamiliar').val());
        dni = $.trim($('#dni').val());
        $.ajax({
            url: "models/grupoFamiliarTabla_model.php",
            type: "POST",
            datatype: "json",
            data: {
                idGrupoFamiliar: idGrupoFamiliar,
                dni: dni,
                opcion: opcion
            },
            success: function (data) {
                tablaGrupoFamiliar.ajax.reload(null, false);
            }
        });
        $('#modalCRUDDetalleGrupo').modal('hide');
    });

    //para limpiar los campos antes de dar de Alta un Proveedor
    $('#nuevoDetalleGrupo').click(function () {
        opcion = 1; //alta
        idGrupoFamiliar = null;
        $("#formDetalleGrupo").trigger("reset");
        $('#idPersona').val('').editableSelect('filter');
        $("#dni").val('');
        $(".modal-header").css("background-color", "#698caf");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Añadir Personas");
        $('#modalCRUDDetalleGrupo').modal('show');

    });




    //Borrar Detalle

    $(document).on("click", ".btnBorrarDetalleGrupo", function () {
        opcion = 3; //eliminar
        fila = $(this).closest("tr");
        var data = $('#tablaGrupoFamiliar').DataTable().row(fila).data();
        idgrupochad = parseInt(data['id']);
        nombre = data['nombre'];
        var respuesta = confirm("¿Está seguro que desea quitar a " + nombre + " del grupo familiar?");
        if (respuesta) {
            $.ajax({
                url: "models/grupoFamiliarTabla_model.php",
                type: "POST",
                datatype: "json",
                data: {
                    opcion: 3,
                    idgrupochad: idgrupochad
                },
                success: function () {
                    tablaGrupoFamiliar.row(fila).remove().draw();
                }
            });
        }
    });



    //CARGO LOS CAMPOS CON LOS DATOS DE LA COMPRA A EDITAR

    $('#idPersona').focusout(function () {
        $.post("includes/grupo_function.php", {
                persona: $('#idPersona').val()
            },
            function (result) {
                $('#dni').val(result);
            })
    });

    $('#dni').focusout(function () {
        $.post("includes/grupo_function.php", {
                dni: $('#dni').val()
            },
            function (result) {
                $('#idPersona').val(result);
            })
    });

});