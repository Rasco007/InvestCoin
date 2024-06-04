$(document).ready(function () {
    $('#guardarOrden').click(function () {
        inversion = $('#inversion').val()
        orden1 = $('#orden1').val()
        fechamin1 = $('#fechamin1').val()
        valorbtcmin1 = $('#valorbtcmin1').val()
        tradebtc1 = $('#tradebtc1').val()
        fechamax1 = $('#fechamax1').val()
        valorBTCmax1 = $('#valorBTCmax1').val()
        outusd1 = $('#outusd1').val()
        gananciabruta1 = $('#gananciabruta1').val()
        retab1 = $('#retab1').val()
        comision1 = $('#comision1').val()
        recupero1 = $('#recupero1').val()
        estado1 = $('#estado1').val()
        orden2 = $('#orden2').val()
        fechamin2 = $('#fechamin2').val()
        valorbtcmin2 = $('#valorbtcmin2').val()
        tradebtc2 = $('#tradebtc2').val()
        fechamax2 = $('#fechamax2').val()
        valorBTCmax2 = $('#valorBTCmax2').val()
        outusd2 = $('#outusd2').val()
        gananciabruta2 = $('#gananciabruta2').val()
        retab2 = $('#retab2').val()
        comision2 = $('#comision2').val()
        recupero2 = $('#recupero2').val()
        estado2 = $('#estado2').val()
        orden3 = $('#orden3').val()
        fechamin3 = $('#fechamin3').val()
        valorbtcmin3 = $('#valorbtcmin3').val()
        tradebtc3 = $('#tradebtc3').val()
        fechamax3 = $('#fechamax3').val()
        valorBTCmax3 = $('#valorBTCmax3').val()
        outusd3 = $('#outusd3').val()
        gananciabruta3 = $('#gananciabruta3').val()
        retab3 = $('#retab3').val()
        comision3 = $('#comision3').val()
        recupero3 = $('#recupero3').val()
        estado3 = $('#estado3').val()
        orden4 = $('#orden4').val()
        fechamin4 = $('#fechamin4').val()
        valorbtcmin4 = $('#valorbtcmin4').val()
        tradebtc4 = $('#tradebtc4').val()
        fechamax4 = $('#fechamax4').val()
        valorBTCmax4 = $('#valorBTCmax4').val()
        outusd4 = $('#outusd4').val()
        gananciabruta4 = $('#gananciabruta4').val()
        retab4 = $('#retab4').val()
        comision4 = $('#comision4').val()
        recupero4 = $('#recupero4').val()
        estado4 = $('#estado4').val()


        $.post('models/ordenModel.php', {
                inversion,
                orden1,
                fechamin1,
                valorbtcmin1,
                tradebtc1,
                fechamax1,
                valorBTCmax1,
                outusd1,
                gananciabruta1,
                retab1,
                comision1,
                recupero1,
                estado1,
                orden2,
                valorbtcmin2,
                tradebtc2,
                valorBTCmax2,
                outusd2,
                gananciabruta2,
                retab2,
                comision2,
                recupero2,
                estado2,
                orden3,
                valorbtcmin3,
                tradebtc3,
                valorBTCmax3,
                outusd3,
                gananciabruta3,
                retab3,
                comision3,
                recupero3,
                estado3,
                orden4,
                valorbtcmin4,
                tradebtc4,
                valorBTCmax4,
                outusd4,
                gananciabruta4,
                retab4,
                comision4,
                recupero4,
                estado4
            },
            function (result) {
                if (result == 1) {
                    Swal.fire({
                        type: "success",
                        title: 'OK!',
                        text: 'Orden cargada correctamente.'
                    })
                } else {
                    Swal.fire({
                        type: "error",
                        title: 'Atención',
                        text: 'Hubo un problema al cargar la orden.'
                    })
                }
            })
    })
})