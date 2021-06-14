(function($){
    $("#frm_login").submit(function(ev){
        $("#alert").html("");
        $.ajax({
            url: 'index.php/Login/Validation',
            type: 'POST',
            data: $(this).serialize(),
            success: function(data){
                var json = JSON.parse(data);
                //console.log(json);
                window.location.replace(json.url);
            },
            statusCode:{
                400: function (xhr) {
                    $("#username > input").removeClass('is-invalid');
                    $("#password > input").removeClass('is-invalid');
                    var json = JSON.parse(xhr.responseText);
                    if (json.username.length != 0) {
                        $("#username > div").html(json.username);
                        $("#username > input").addClass('is-invalid');
                    }
                    if (json.password.length != 0) {
                        $("#password > div").html(json.password);
                        $("#password > input").addClass('is-invalid');
                        
                    }
                },
                401: function (xhr) {
                    var json = JSON.parse(xhr.responseText);
                    //console.log(json);
                    $("#alert").html('<div class="alert alert-danger" role="alert">'+ json.msg +'</div>');
                }
            }
        });
        ev.preventDefault();
    });
})(jQuery)