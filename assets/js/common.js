function InitCommon(){
  $.ajaxSetup({
    type:  "post",
    cache:  false,
    dataType: "json",    
    error:  displayAjaxError
  });
 }
	function displayAjaxError(request, errorType, errorThrown) {
		

		try {
			
			if (request.statusText == 'Not Found'){
				alert ("ERROR!!! -> Servicio Ajax no econtrado (Error 404)");
			}
			
			if (errorType == 'timeout') {
				alert ("ERROR!!! -> Tiempo de espera agotado para esta solicitud");
			}
			
			if (request.statusText == 'Internal Server Error'){
				alert ("ERROR!!! -> Error interno del servidor");
				alert (request.responseText);
			}
			
			if (errorType == 'parsererror') {
				alert ("ERROR!!! -> Error en la estructura de datos retornada por el servidor 'JSON'");
				alert (request.responseText);
			}
		}
		catch (e){
		}
	}




function fnGoTo(URL){
	window.location = Front_URL + URL;
}

function Form2Array(strForm){	
	var arrData = new Array();
	
	$("input[type=text], input[type=hidden], input[type=password], input[type=checkbox]:checked, input[type=radio]:checked, select, textarea", $('#'+strForm)).each(function() {
		if ( $(this).attr('name') ) {
			console.log($(this).attr('value'));
			arrData.push({'name': $(this).attr('name'), 'value':$(this).val()});
		}
	});

	return arrData;
	
}

function notifacion(tipo,mensaje){
	
	notyfy({
			text: "mensaje",
			type: tipo,
			dismissQueue: true,
			layout: "top",
			buttons: ( tipo != 'confirm') ? false : [{
				addClass: 'btn btn-success btn-small btn-icon glyphicons ok_2',
				text: '<i></i> Ok',
				onClick: function ($notyfy) {
					$notyfy.close();
					notyfy({
						force: true,
						text: 'You clicked "<strong>Ok</strong>" button',
						type: 'success',
						layout: "top"
					});
				}
			}, {
				addClass: 'btn btn-danger btn-small btn-icon glyphicons remove_2',
				text: '<i></i> Cancel',
				onClick: function ($notyfy) {
					$notyfy.close();
					notyfy({
						force: true,
						text: '<strong>You clicked "Cancel" button<strong>',
						type: 'error',
						layout: "top"
					});
				}
			}]
		});
}
