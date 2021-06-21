$('#producto').change(function () {
	$.post('../Sales/Ajax_precio', {
		producto: $('#producto').val(),

			beforeSend: function () {
				$('.precio').html("Espere un momento porfavor...");
			}
		},
		function (respuesta) {
			$('.precio').html(respuesta);
		});
});
