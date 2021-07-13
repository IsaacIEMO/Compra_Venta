$('#corte').change(function () {
	$.post('corte_atrasado', {
			corte: $('#corte').val(),
			reservation: $('#reservation').val(),

			beforeSend: function () {
				$('.detalles').html("Espere un momento porfavor...");
			}
		},
		function (respuesta) {
			$('.detalles').html(respuesta);
		});
});
