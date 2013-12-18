datos = [];
/* ==========================================================
 * FLAT KIT v2.0.0
 * form_validator.js
 * 
 * http://www.mosaicpro.biz
 * Copyright MosaicPro
 *
 * Built exclusively for sale @Envato Marketplaces
 * ========================================================== */ 

$.validator.setDefaults(
{	
	showErrors: function(map, list) 
	{
		this.currentElements.parents('label:first, div:first').find('.has-error').remove();
        this.currentElements.parents('.form-group:first').removeClass('has-error');
        
        $.each(list, function(index, error) 
        {
                var ee = $(error.element);
                var eep = ee.parents('label:first').length ? ee.parents('label:first') : ee.parents('div:first');
                
                ee.parents('.form-group:first').addClass('has-error');
                eep.find('.has-error').remove();
                eep.append('<p class="has-error help-block">' + error.message + '</p>');
        });
		//refreshScrollers();
	}
});

$(function()
{
	// validate signup form on keyup and submit
	$("#crearUsuario").validate({
		rules: {
			firstname: "required",
			lastname: "required",
			username: {
				required: true,
				minlength: 2
			},
			idenficacion: {
				required: true,
				number: true
			},
			phone: {
				required: true,
				number: true
			},
			celphone: {
				required: true,
				number: true
			},
			birthday: "required",
			password: {
				required: true,
				minlength: 5
			},

			confirm_password: {
				required: true,
				minlength: 5,
				equalTo: "#password"
			},
			email: {
				required: true,
				email: true
			},
			topic: {
				required: "#newsletter:checked",
				minlength: 2
			},
			agree: "required"
		},
		messages: {
			firstname: "Por for ingrese su nombre",
			lastname: "Por favor ingrese su apellido",	
			birthday: "Por favor ingrese una fecha de nacimiento",	
			idenficacion: {
				required: "Ingrese una idenficación",
				number: "Ingrese sólo números"
			},
			phone: {
				required: "Ingrese un número de telefono",
				number: "Ingrese sólo números"
			},	
			celphone: {
				required: "Ingrese un número de celular",
				number: "Ingrese sólo números"
			},	
			password: {
				required: "Ingrese un password",
				minlength: "Tú password debe tener almenos 5 caracteres"
			},
			confirm_password: {
				required: "Ingrese un password",
				minlength: "Tú password debe tener almenos 5 caracteres",
				equalTo: "Por favor ingrese el mismo password"
			},
			email: "Ingrese una direccion de email valida",			
		}
	});


	$('.listWrapper li').click(function(){      		
        user_id= $(this).attr('id');

      $.ajax({
		url: 'get_user_id',
		data: {user_id: user_id},
		type: "POST",
		dataType: "json",
		success: function(objResp){					
			if(objResp==null) { return }
			
			if(objResp.Res=="success"){
				console.log(commonPath);
				notifacion(objResp.Res,objResp.Msg);
				$('.first_name').html(objResp.Data.first_name);
				$('.profile_image').html('<img class="profile_image" src="'+baseurl+'upload/'+objResp.Data.image+'" alt="Profile" />');
				$('.profile_email').html(objResp.Data.email);
				$('.profile_phone').html(objResp.Data.phone);
				$('.profile_mobile_phone').html(objResp.Data.mobile_phone);
			}
			
			if(objResp.Res=="error"){				
				 notyfy(
						{
						text: objResp.Msg,
						type: objResp.Res // alert|error|success|information|warning|primary|confirm
				});
		}

		}

	});

	})
});