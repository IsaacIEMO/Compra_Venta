$(function(){
    $("#frm_login").submit(function(ev){
        $("#alert").html("");
        $.ajax({
            url: 'index.php/Users/Insert_User',
            type: 'POST',
            data: $(this).serialize(),
            success: function(data){
                var json = JSON.parse(data);
                window.location.replace(json.url);
            },
            statusCode:{
                400: function (xhr) {
                    $("#nombre > input").removeClass('is-invalid');
                    $("#apellido > input").removeClass('is-invalid');
                    $("#user > input").removeClass('is-invalid');
                    $("#pass > input").removeClass('is-invalid');
                    $("#password > input").removeClass('is-invalid');
                    var json = JSON.parse(xhr.responseText);
                    if (json.nombre.length != 0) {
                        $("#nombre > div").html(json.nombre);
                        $("#nombre > input").addClass('is-invalid');
                    }
                    if (json.apellido.length != 0) {
                        $("#apellido > div").html(json.apellido);
                        $("#apellido > input").addClass('is-invalid');   
                    }
                    if (json.user.length != 0) {
                        $("#user > div").html(json.user);
                        $("#user > input").addClass('is-invalid');
                    }
                    if (json.pass.length != 0) {
                        $("#pass > div").html(json.pass);
                        $("#pass > input").addClass('is-invalid');   
                    }
                    if (json.password.length != 0) {
                        $("#password > div").html(json.password);
                        $("#password > input").addClass('is-invalid');   
                    }
                },
                401: function (xhr) {
                    var json = JSON.parse(xhr.responseText);
                    $("#alert").html('<div class="alert alert-danger" role="alert">'+ json.msg +'</div>');
                }
            }
        });
        ev.preventDefault();
    });
})(jQuery)