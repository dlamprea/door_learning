function InitCommon(){
		

	
	$.ajaxSetup({
		type:	"post",
		cache:	false,
		dataType: "json",		
		error:	displayAjaxError
	});
		
	try {	
	
		$(".numerico").numeric();
		
	} catch(e){ }
	
	try {	// Si no esta cargado el plugin MaskedInput para los text de Fechas y Horas, genera un error.
		$.mask.definitions['M']='[01]';
		$.mask.definitions['H']='[012]';
		$.mask.definitions['D']='[0123]';
		$.mask.definitions['N']='[012345]';
		$.mask.definitions['n']='[0123456789]';
		
		$(".dateISO").mask("Hnnn-Mn-Dn");
		$(".timeISO").mask("Hn:Nn");
		
	} catch(e){ }

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

