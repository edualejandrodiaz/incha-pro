$(document).ready(function () {
    $("#carouselbeneficios").owlCarousel({
        items: 5,
        margin: 10,
        loop: true,
        autoWidth: true,
        autoplay: true,
        autoplayTimeout: 3500,
        autoplayHoverPause: true
    });
    $("#carouselproductos").owlCarousel({
        items: 5,
        margin: 10,
        loop: true,
        autoWidth: true,
        autoplay: true,
        autoplayTimeout: 3500,
        autoplayHoverPause: true
    });
    $("#carouselhomeslide").owlCarousel({
        items: 1,
        margin: 10,
        loop: true,
        // autoWidth:true,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true
    });
    $("#carouselhomemovile").owlCarousel({
        items: 1,
        margin: 10,
        loop: true,
        // autoWidth:true,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true
    });

    $(".chkCategory").change(function () {
        $('#product_div').html('<div id=\'cover-spin\'></div>');
        $("#fmrCategories").submit();

    });

    //formato rut en login
    $('#modalLRInput10').Rut();

    //formato rut en editar usuario
    $('#rut').Rut();

    $("#profile-form").validate({
        rules: {
            'rut': "required",
            'email': "required",
            'fono': "required"
        },
        errorElement: "div",
        submitHandler: function (form) {

            

            var urlForm = $(form).attr('action');
            var formData = $(form).serialize();

            $("#submitGuardar").attr('disabled', 'disabled');
            $("#submitCerrar").attr('disabled', 'disabled');
            $("#rut").attr('disabled', 'disabled');
            $("#email").attr('disabled', 'disabled');
            $("#fono").attr('disabled', 'disabled');

            $.ajax({
                type: "POST",
                url: urlForm,
                data: formData,
                success: function (msg) {
                    console.log("TCL: msg", msg);

                    $("#editperfil").modal('hide');

                    $("#submitGuardar").attr('disabled', false);
                    $("#submitCerrar").attr('disabled', false);
                    $("#rut").attr('disabled', false);
                    $("#email").attr('disabled', false);
                    $("#fono").attr('disabled', false);

                    if (msg.result == 'success') {
                             
                        $("#mensaje-resultado").text("Datos actualizados con éxito");

                    } else {
                        $("#mensaje-resultado").text("No se pudo realizar la acción");
                    }

                    $("#mensajeModal").modal('show');
                    
                }
            });
        }


    });
    /*
    $.validator.addMethod("rut", function(value, element) {
        return this.optional(element) || $.Rut.validar(value);
      }, "Rut no válido.");
      */

    $("#modal-login-form").validate({
        rules: {
            'password': "required"/*,
            'rut' : { 'required':'true', 'rut':'true'}*/
        },
        errorElement: "div",
        submitHandler: function (form) {
            $("#submitLogin").attr('disabled', 'disabled');
            var urlForm = $(form).attr('action');
            var formData = $(form).serialize();
            $.ajax({
                type: "POST",
                url: urlForm,
                data: formData,
                success: function (msg) {
                    console.log("TCL: msg", msg)
                    if (msg.result == 'success') {
                        document.location.href = "/perfil";
                    } else {
                        $("#msgLogin").html(msg.result);
                        $("#msgLogin").show();
                        $("#submitLogin").prop("disabled", false);
                    }
                }
            });
        }
    });

    //$('#modalLRInput10').rut({placeholder:false});
    //form-control form-control-sm validate
    //form-control form-control-sm validate

    //Pruebas
    $("#modal-login-form-cat").validate({
        
        submitHandler: function (form) {
            $("#submitLoginCat").attr('disabled', 'disabled');
            var urlForm = $(form).attr('action');
            var formData = $(form).serialize();
            $.ajax({
                type: "POST",
                url: urlForm,
                data: formData,
                success: function (msg) {
                    console.log("TCL: msg", msg)
                    if (msg.result == 'success') {
                        document.location.href = "/perfil";
                    } else {
                        $("#msgLogin").html(msg.result);
                        $("#msgLogin").show();
                        $("#submitLoginCat").prop("disabled", false);
                    }
                }
            });
        }
    });


});

var montoGF = null;
function setvaluegf(valgf, ptosgf, tobj) {

    if ($(tobj).hasClass("mlist")) {
        $(".mlist").css("background-color", "#fff");
        $(".mlist").css("color", "#000");

        $("#sel_" + valgf).css("background-color", "#492c71");
        $("#sel_" + valgf).css("color", "#fff");

        $("#montoCanje").html(addCommas(ptosgf) + " Puntos");
        $("#montoGF").html("$" + addCommas(valgf));
        montoGF = valgf;

    }

}