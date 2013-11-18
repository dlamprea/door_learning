function InitCommon(){
		
	$.ui.dialog.prototype.options.resizable = false;
	$.ui.dialog.prototype.options.modal = true;
	$.ui.dialog.prototype.options.autoOpen = false;
	$.ui.dialog.prototype.options.closeOnEscape = false;
	
	$.alerts.bgiframe = true;
	
	$.ajaxSetup({
		type:	"post",
		cache:	false,
		dataType: "json",
		beforeSend: AjaxLoadingShow,
		error:	displayAjaxError
	});
	
	$(document).ajaxStop(AjaxLoadingHide);
	
	var HTMLdivLoading = '<div id="ajaxLoading" title="Procesando..."><img src="' + Base_URL + 'resources/images/AjaxLoading.gif"  /></div>';
	
	$("body").append(HTMLdivLoading);

	$("#ajaxLoading").dialog({
		minHeight:72,
		maxHeight:72,
		height:72,
		width:248
	});
	
	$('#ajaxLoading').prev('.ui-dialog-titlebar').find('.ui-dialog-titlebar-close').css({display:'none'});
	
	$(".dateISO").datepicker({
		showOn: 'button',
		dateFormat: 'yy-mm-dd',
		changeMonth: true,
		changeYear: true,
		yearRange: '1950:2020'
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

	AjaxLoadingHide();

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

function AjaxLoadingShow(){
	$("#ajaxLoading").dialog('open');
}

function AjaxLoadingHide(){
	$("#ajaxLoading").dialog('close');
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

