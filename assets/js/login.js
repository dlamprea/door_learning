$(document).ready(Init);

function Init() {
	
	InitCommon();
	
	$('#username').keyup(function(e) {
		if(e.keyCode == 13) {
			$('#password').focus();
		}
	});
	
	$('#password').keyup(function(e) {
		if(e.keyCode == 13) {
			doLogin();
		}
	});

	$("#btnLogin").click(doLogin);
	
}

function doLogin(){
	
	var UsrName = $("#username").val();
	var PssWrd = $("#password").val();

	if ( UsrName=="" || PssWrd=="" ){
		alert("Debe especificar Usuario y Clave","Error");
		return;
	}
	
	var arrData = $("#frmLogin").serializeArray();
	
	$.ajax({
		url:	Front_URL + "index.php/login/doLogin",
		data:	arrData,
		success: function(objResp){
		
			if ( objResp==null ){ return; }
		
			if ( objResp.Res == "OK" ){
				window.location.reload();
			}
			
			if ( objResp.Res == "ERR" ) {
				alert(objResp.Msg,"Error");
			}
			
		}
		
	});

}
