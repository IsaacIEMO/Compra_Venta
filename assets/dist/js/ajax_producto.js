$('#producto').change(function () {
	$.post('Store/Ajax_producto', {
			producto: $('#producto').val(),

			beforeSend: function () {
				$('.detalles').html("Espere un momento porfavor...");
			}
		},
		function (respuesta) {
			$('.detalles').html(respuesta);
		});
});
