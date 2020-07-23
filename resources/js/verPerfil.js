var urlM = $("#urlRM").val();
var idU = $("#idU").val();
var tabla = "";
urlM += "/" + idU;
function botones() {
    $('.is-danger').click(function () {
        $("#eliminar").addClass('is-active');
        var token = $("meta[name='csrf-token']").attr("content");
        var idP = $(this).attr('id');
        var urlPD = $("#urlPD").val();
        urlPD += "/" + idP;
        params = {"id": idP, "_token": token};
        $.ajax({
            type: "delete",
            url: urlPD,
            data: params,
            success: function () {
                $("#eliminar").removeClass('is-active');
                mostrar();
            }
        });
    });
}
function mostrar() {
    $("#loader").addClass('is-active');
    var urlVer = $("#urlVer").val();
    $.ajax({
        type: "get",
        url: urlM,
        success: function (response) {
            if (tabla !== "") {
                tabla.destroy();
            }
            var json = JSON.parse(response);
            var publicaciones = json.publicaciones;
            $("#contenido").html("");
            publicaciones.forEach(function (data) {
                if (data.descripcion !== null) {
                    $("#contenido").append("<tr><td>" + data.tituloSNFormato + "</td><td>" + data.descripcion + "</td>" +
                        "<td><button type='button' aria-label='Eliminar.' id='" + data.id + "' class='button is-danger is-light is-small is-outlined'>" +
                        "<i class='fas fa-trash-alt'></i></button>" +
                        "<a href='" + urlVer + "/" + data.id + "' aria-label='Editar.' target='_blank' type='button' id='" + data.id + "' class='button is-info is-light is-small is-outlined'>" +
                        "<i class='fas fa-eye'></i></a></td></tr>");
                } else {
                    $("#contenido").append("<tr><td>" + data.tituloSNFormato + "</td><td>Sin Descripcion.</td>" +
                        "<td><button type='button' aria-label='Eliminar.' id='" + data.id + "' class='button is-danger is-light is-small is-outlined'>" +
                        "<i class='fas fa-trash-alt'></i></button>" +
                        "<a href='" + urlVer + "/" + data.id + "' aria-label='Editar.' target='_blank' type='button' id='" + data.id + "' class='button is-info is-light is-small is-outlined'>" +
                        "<i class='fas fa-eye'></i></a></td></tr>");
                }
            });
            tabla = $('#tabla').DataTable({
                "language": {
                    "search": "Buscar:",
                    "lengthMenu": "Mostrar _MENU_ registros por pagina",
                    "info": "Pagina _PAGE_ de _PAGES_",
                    "zeroRecords": "Aun no realizas ninguna publicacion."
                }
            });
            botones();
            $("#loader").removeClass('is-active');
        }
    });
}
mostrar();
