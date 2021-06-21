function detalles() {
	var producto = $("#producto").val();
	var stock = $("#stock").val();
	var subtotal = $("#subtotal").val();
	var ok = true;
	var msg = "\n";

	if (producto == "0" || producto == "") {
		ok = false;
		msg += " - Producto ";
	}

	if (subtotal == "0" || subtotal == "") {
		ok = false;
		msg += " - Existencia Actual";
	}

	if (stock == "0" || stock == "") {
		ok = false;
		msg += " - Nueva Existencia";
	}

	if (ok == false) {
		Swal.fire({
			title: 'Algun campo esta vacio',
			text: msg,
			type: 'info',
			showCancelButton: true,
			confirmButtonColor: '#27cb34',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Deseas Continuar?'
		}).then((result) => {
			if (result.value) {
				$.post('../Sales/Insert_Detalle_Sales', { op: 'insert_detalles', producto: producto, subtotal: subtotal, stock: stock }, function (data) {
					if (data == 1) {
                        if (result.value) {
                            location.reload();
                        }
					} else {
						Swal.fire(
							'Oops...',
							'No hemos podido encontrar tu usuario',
							'error'
						)
					}
				});
			}
		})
	} else {
		$.post('../Sales/Insert_Detalle_Sales', { op: 'insert_detalles', producto: producto, subtotal: subtotal, stock: stock }, function (data) {
			if (data == 1) {
                if (result.value) {
                    location.reload();
                }
            } else {
                Swal.fire(
                    'Oops...',
                    'No hemos podido encontrar tu usuario',
                    'error'
                )
            }
		});
	}
}