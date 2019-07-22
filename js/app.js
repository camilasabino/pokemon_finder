
/* ----- JavaScript ---------------------------------------------------- */

$(document).ready(function () {

    $('.col-cargando').hide();

    $(".form-buscar").submit(function (e) {

        $('.col-cargando').show();
        $('.col-resultados').hide();
        $('.contador').text('0 resultado(s)');

        $.ajax({
            type: "GET",
            url: "../index.php",
            data: $(".form-buscar").serialize()
        });
    });

});
