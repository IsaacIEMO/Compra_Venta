$('#produc').change(function () {
	$.post('Sales/Ajax_producto', {
			produc: $('#produc').val(),

			beforeSend: function () {
				$('.stock_actual').html("Espere un momento porfavor...");
			}
		},
		function (respuesta) {
			$('.stock_actual').html(respuesta);
		});
});
