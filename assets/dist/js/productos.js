$('#producto').change(function () {
	$.post('../Sales/Ajax_producto', {
		producto: $('#producto').val(),

			beforeSend: function () {
				$('.stock_actual').html("Espere un momento porfavor...");
			}
		},
		function (respuesta) {
			$('.stock_actual').html(respuesta);
		});
});
