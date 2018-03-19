$(document).ready(function (){
	//Ocultamos los elementos para luego mostrarlo cuando le den click al label en la opcion de editar en los menus del rol admin
	$(".contenedor_valor_nombre").hide();
	$(".contenedor_valor_apellido").hide();
	$(".contenedor_valor_t_documento").hide();
	$(".contenedor_t_documento_disponible").hide();
	$(".contenedor_edad").hide();
	$(".contenedor_numero_documento").hide();
	$(".contenedor_telefono").hide();
	$(".contenedor_correo").hide();
	$(".contenedor_fecha").hide();
	$(".contenedor_estado").hide();
	$(".contenedor_rol_actual").hide();
	$(".contenedor_rol_disponible").hide();
	$(".contenedor_nombre_usuario").hide();
	$(".contenedor_password").hide();
	//Mensajes de ayuda para llenar algun campo
	$('#ayuda_interrogatorio').tooltip();
	$('#ayuda_general_busqueda_evaluador').tooltip();
	$('#ayuda_general_busqueda_conductor').tooltip();
	$('#ayuda_general_busqueda_administrador').tooltip();
	$('#ayuda_general_busqueda_rutas').tooltip();
	$('#ayuda_general_busqueda_empresas').tooltip();
	$('#ayuda_general_busqueda_vehiculo').tooltip();
	$('#ayuda_general_busqueda_t_documento').tooltip();
	$('#ayuda_general_busqueda_conductor_evaluador').tooltip();
	$('#ayuda_general_busqueda_rol').tooltip();
	$('#ayuda_general_busqueda_sintomas').tooltip();
	$('#ayuda_general_busqueda_signo').tooltip();
	$('#ayuda_general_busqueda_emocional').tooltip();
	$('#ayuda_general_busqueda_neurologico').tooltip();
	$('#ayuda_general_busqueda_sugerencia').tooltip();
	$('#ayuda_general_busqueda_evaluacion').tooltip();
	$('#ayuda_formulario_activacion').tooltip();
	$('#ayuda_tiempo_sueño').tooltip();
	$('#ayuda_orden_reposo').tooltip();
	$('#ayuda_sueño_profundo').tooltip();
	$('#ayuda_pulsaciones').tooltip();
	$('#ayuda_interrogatorio_descanso').tooltip();
	$('#ayuda_manual_evaluador').tooltip();
	$('#ayuda_camarote').tooltip();
	$('#ayuda_interrogatorio_conduciendo').tooltip();
	$('#ayuda_sintoma').tooltip();
	$('#ayuda_signo').tooltip();
	$('#ayuda_a_emocional').tooltip();
	$('#ayuda_a_neurologico').tooltip();
	$('#ayuda_tiempo_descanso').tooltip();
	$('#ayuda_nivel_fatiga_dia').tooltip();
	$('#ayuda_nivel_fatiga_general').tooltip();
	$('#ayuda_mostrar_pass').tooltip();
	$("#table_prueba").dataTable({
		"searching": false
	});

	/*evento para poder limpiar los campos de nombre ya pellido cuando se encuentre en la bd*/
	$('#button_clean_full_name').click(function() {
		$('#nombre').val('');
		$('#apellido').val('');
	});

	/**
	 * Funciones para poder mostrar el contendio del input contraseña
	 *
	 * @param none
	 * @return El contenido del input contraseña
	 */
	$("#show_pass").click(function () {
		$("#pass").removeAttr("type");
		$("#txtpass").removeAttr("type");
		$("#show_pass").addClass("fa-eye-slash").removeClass("fa-eye");
	});

	$("#show_pass").dblclick(function () {
		$("#pass").attr("type" , "password");
		$("#txtpass").attr("type" , "password");
		$("#show_pass").addClass("fa-eye").removeClass("fa-eye-slash");
	});
});

let trae_hora_sueno , traer_hora_descanso;
//Bandera para verificar que todos los campos del form de registro se envien correctamente , si es >= 1 hay algun error
let flag_validacion_info_register = 0;

$('select').select2();

/**
 * Funcion para mostrar la alerta de los reportes de los modulos
 *
 * @param event, menu , path
 * @return una alerta
 */
const alert_dinamic = (event , menu , path) => {
	event.preventDefault();
	swal({
		title: "Esta seguro de descargar el reporte de "+menu+"?",
		text: "Hay que recordar que este proceso puede demorar algunos segundos!",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "Si, Estoy Seguro!",
		cancelButtonText: "Cancelar",
		closeOnConfirm: false
	},
	function(isConfirm){
		if (isConfirm) {
			swal("Descargando!", "El reporte se descargara en segundos , por favor espere.", "success");
			window.location = path;
		}else {
			event.preventDefault();
		}
	});
}

/*Funcion con el tiempo con ajax*/
/*const alert_dinamic = (event , menu , path) => {
	let time1 = time;
	let time_full = time1 + '000';

	console.log("El valor recibido del tiempo es = "+time);

	event.preventDefault();
	swal({
		title: "Esta seguro de hacer el reporte de "+menu+"?",
		text: "Este proceso demorara algunos segundos!",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "Si",
		cancelButtonText: "No",
		showLoaderOnConfirm: true,
		closeOnConfirm: false
	},
	function(isConfirm){
		if (isConfirm) {
			setTimeout(function(){
				swal({
					title: "Descarga Completada!!!",
					type: "success",
					showConfirmButton: true
				});
			}, 2000);
			window.location = path;
		}else {
			event.preventDefault();
		}
	});
}*/

/**
 * Funcion para mostrar una alerta despues de hacer una registro
 *
 * @param menu , path , message
 * @return una alerta
 */
const alert_dinamic_create = (menu,path,Message = "del") => {
	swal({
		title: "Registro completado!",
		text: "Se ha hecho el registro "+Message+" "+menu+" Exitosamente.",
		type: "success"
	},
	function(isConfirm) {
		if (isConfirm) {
			window.location = path;
		}
	});
}

/**
 * Funcion para mostrar una alerta de error
 *
 * @param menu , path , message
 * @return una alerta
 */
const alert_dinamic_mistake = (menu,path,Message = "del") => {
	swal({
		title: "Lo sentimos ha ocurrido un Error!",
		text: "No se ha podido crear el registro "+Message+" "+menu+". Por favor intente de nuevo",
		type: "error"
	},
	function(isConfirm) {
		if (isConfirm) {
			window.location = path;
		}
	});
}

/**
 * Funcion para el saludo inicial del evaluador cuando inicia sesion
 *
 * @param none
 * @return una alerta
 */
const alert_dinamic_hi_evaluador = () => {
	let number_random = Math.round(Math.random()*4);
	let full_name_image = "saludo_"+number_random+".jpg";
	switch(number_random){
		case number_random:
			swal({
				title: "Bienvenido al Sistema!",
				text: " Gracias por ayudarnos a salvar vidas.",
				imageUrl: "images/icon_alert/Saludo/"+full_name_image,
				imageSize:"150x150"
			},
			function(isConfirm) {
				if (isConfirm) {
					window.location = "test.php";
				}
			});
		break;

		default:
			return alert_dinamic_outside_place("log.php");
		break;
	}
	/*swal({
		title: "Bienvenida Evaluador al Sistema!",
		text: " Gracias por ayudarnos a salvar vidas",
		imageUrl: "images/icon_alert/saludo.png",
		imageSize:"150x150"
	},
	function(isConfirm) {
		if (isConfirm) {
			window.location = "test.php";
		}
	});*/
}

/**
 * Funcion para mostrar una alerta de error en el login
 *
 * @param none
 * @return una alerta
 */
const alert_dinamic_error_login = () => {
	swal({
		title: "Acceso Denegado!",
		text: "Usuario o contraseña incorrecto , por favor verificar antes de ingresar a la plataforma",
		type: "error"
	},
	function(isConfirm) {
		if (isConfirm) {
			window.location = "log.php";
		}
	});
}

/**
 * Funcion que muestra una alerta cuando un usuario inactivo quiere hacer login
 *
 * @param none
 * @return una alerta
 */
const alert_dinamic_disabled_user = () => {
	swal({
		title: "Acceso Denegado!",
		text: "Su usuario ha sido desactivado por el Administrador , Por favor comuniquese con el para mayor informacion",
		type: "warning"
	},
	function(isConfirm) {
		if (isConfirm) {
			window.location = "log.php";
		}
	});
}

/**
 * Funcion para mostrar una alerta en en caso default de un switch
 *
 * @param path
 * @return una alerta
 */
const alert_dinamic_outside_place = path => {
	swal({
		title: "Lo sentimos ha ocurrido un error Inesperado!",
		text: "Vuelva a cargar la pagina",
		type: "error"
	},
	function(isConfirm) {
		if (isConfirm) {
			window.location = path;
		}
	});
}

/**
 * Funcion para mostrar la alerta del reporte de evaluacion fatiga
 *
 * @param event,fecha_inicio_fecha_final,path,date_common
 * @return una alerta
 */
const alert_dinamic_reporte_test = (event,fecha_inicio,fecha_final,path,date_common) => {
	event.preventDefault();
	swal({
		title: "Esta seguro de descargar el reporte de Evaluacion de fatiga?",
		text: "Hay que recordar que este proceso puede demorar algunos segundos!",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "Si, Estoy Seguro!",
		cancelButtonText: "Cancelar",
		closeOnConfirm: false
	},
	function(isConfirm){
		if (isConfirm) {
			swal("Descargando!", "El reporte se descargara en segundos , por favor espere.", "success");
			window.location = path+"date_began="+fecha_inicio+"&"+"date_finish="+fecha_final+"&"+"date_common="+date_common;
		}else {
			event.preventDefault();
		}
	});
}

/**
 * Funcion para mostrar una alerta en la opcion editar registro
 *
 * @param menu_origen,path_destino,message
 * @return una alerta
 */
const alert_dinamic_edit = (menu_origen,path_destino,message='del') => {
	swal({
		title: "Registro Actualizado!",
		text: "Se ha Editado el registro "+message+" "+menu_origen+" Exitosamente.",
		type: "warning"
	},
	function(isConfirm) {
		if (isConfirm) {
			window.location = path_destino;
		}
	});
}

/**
 * Funcion para mostrar una alerta de error cuando se produce un error en la opcion editar registro
 *
 * @param menu,path_destino
 * @return una alerta
 */
const alert_dinamic_fail_edit = (menu , path_destino) => {
	swal({
		title: "Error Al Actualizar "+menu+"!",
		text: "Ha ocurrido un error inesperado , por favor recargue la pagina e intente de nuevo",
		type: "error"
	},
	function(isConfirm) {
		if (isConfirm) {
			window.location = path_destino;
		}
	});
}

/**
 * Funcion para mostrar una alerta de aviso al usuario
 *
 * @param message,path
 * @return una alerta
 */
const alert_dinamic_check_validator = (message,path) => {
	swal({
		title: "Advertencia!",
		text: message,
		type: "error"
	},
	function(isConfirm) {
		if (isConfirm) {
			window.location = path;
		}
	});
}

/**
 * Funcion para mostrar la informacion de algunas validaciones internas
 *
 * @param message,typeMessage
 * @return
 */
const alert_dinamic_info = (message,typeMessage) => {
	swal({
		title: "Informacion!",
		text: message,
		type: typeMessage
	})
}

/**
 * Funcion para mostrar la contraseña
 *
 * @param none
 * @return un boton(que va ha mostrar el contenido del password) y un icono de ayuda
 */
const show_input_pasword = () => {
	$("#show_pass").show();
	$("#ayuda_mostrar_pass").show();
}

/**
 * Funcion para validar la edad y la fecha de nacimiento ingresada en la opcion registro
 *
 * @param dateBorn,age
 * @return una alerta
 */
const check_date_born = (dateBorn,age) => {
	let only_Year = dateBorn.split("-");
	let object_date = new Date();
	let yearToday = object_date.getFullYear();
	let full_age = yearToday - only_Year[0];

	if (age != full_age) {
		$('#container_check_date_born').show();
		$('#container_check_date_born').html("<div class='alert alert-danger'> <span class='fa fa-minus-circle fa-2x'></span> <br><label> La fecha de nacimiento ingresada no es coherente con su edad. </label> </div>");
		flag_validacion_info_register = 1;

		document.getElementById('contenedor_habeas_data').style.display='none';
		document.getElementById('habeas').disabled=true;
		document.getElementById('boton_registrar').disabled=true;
		document.f_registro.habeas.checked=0;

		$("#label_habeas").text('Acepto las condiciones de uso');
		style_border_input('f_nacimiento' , 'rojo');
	}else {
		$('#container_check_date_born').hide();
		flag_validacion_info_register = 0;

		document.getElementById('contenedor_habeas_data').style.display='none';
		document.getElementById('container_extensiones_agree').style.display='none';
		document.getElementById('habeas').disabled=false;
		document.getElementById('boton_registrar').disabled=true;
		document.f_registro.habeas.checked=0;

		$("#label_habeas").text('Acepto las condiciones de uso');
		style_border_input('f_nacimiento' , 'verde');
	}
}

/**
 * Validar el peso del conductor que sea coherente
 *
 * @param value_weight
 * @return mensaje de error
 */
const check_weight_driver = value_weight => {
	if (value_weight >= 140) {
		$("#container_check_weight_driver").hide();
		alert_dinamic_check_validator('El peso del conductor no es valido porque es muy alto','Conductores.php');
		style_border_input('peso' , 'rojo');
	}else if(value_weight == 0 || value_weight == "") {
		$("#container_check_weight_driver").hide();
		alert_dinamic_check_validator('El peso del conductor no es valido.','Conductores.php');
		style_border_input('peso' , 'rojo');
	}else {
		style_border_input('peso' , 'verde');
		$("#container_check_weight_driver").show();
		$("#container_check_weight_driver").html("<h4><span class='label label-success'>El peso final es :  "+value_weight+" Kg."+"</span></h4><br>");
	}
}

/**
 * Funcion para validar el formato del tipo de sangre
 *
 * @param format_blood_driver
 * @return Alerta de error si no es un tipo de sangre existente
 */
const check_format_type_blood_driver = format_blood_driver => {
	if (format_blood_driver == "") {
		flag_validacion_info_register = 1;
		document.getElementById('contenedor_habeas_data').style.display='none';
		document.getElementById('habeas').disabled=true;
		document.getElementById('boton_registrar').disabled=true;
		document.f_registro.habeas.checked=0;

		$("#container_check_type_blood_driver").show();
		$('#container_full_type_blood_driver').hide();
		$("#label_habeas").text('Acepto las condiciones de uso');
		$('#container_check_type_blood_driver').html("<div class='alert alert-danger'> <span class='fa fa-minus-circle fa-2x'></span> <br><label>El campo esta vacio , es necesario llenarlo. </label> </div>");

		style_border_input('sanguineo' , 'rojo');
	}else if (format_blood_driver == "a" || format_blood_driver == "ab" || format_blood_driver == "b" || format_blood_driver == "o") {
		flag_validacion_info_register = 0;
		document.getElementById('contenedor_habeas_data').style.display='none';
		document.getElementById('habeas').disabled=false;
		document.f_registro.habeas.checked=0;

		$("#container_check_type_blood_driver").hide();
		$("#label_habeas").text('Acepto las condiciones de uso');
		style_border_input('sanguineo' , 'verde');
		return show_full_type_blood_driver()
	}else {
		flag_validacion_info_register = 1;
		document.getElementById('contenedor_habeas_data').style.display='none';
		document.getElementById('habeas').disabled=true;
		document.getElementById('boton_registrar').disabled=true;
		document.f_registro.habeas.checked=0;

		$("#container_check_type_blood_driver").show();
		$('#container_full_type_blood_driver').hide();
		$("#label_habeas").text('Acepto las condiciones de uso');
		$('#container_check_type_blood_driver').html("<div class='alert alert-danger'> <span class='fa fa-minus-circle fa-2x'></span> <br><label>El tipo de sangre ingresado no es Valido , solo son validos A , B , AB y O </label> </div>");
		style_border_input('sanguineo' , 'rojo');
	}
}

/**
 * Funcion para mostrar como queda el tipo de sangre completo al usuario
 *
 * @param none
 * @return la informacion del tipo de sangre completo EJM: o RH positivo
 */
const show_full_type_blood_driver = () => {
	let type_blood_driver = document.getElementById("sanguineo").value;
	let upper_type_blood_driver = type_blood_driver.toUpperCase();
	let value_opcion = document.getElementById("opcion_positivo").checked;

	if (type_blood_driver == "") {
		$("#container_check_type_blood_driver").show();
		$('#container_full_type_blood_driver').hide();
		$('#container_check_type_blood_driver').html("<div class='alert alert-danger'> <span class='fa fa-minus-circle fa-2x'></span> <br><label>El campo esta vacio , es necesario llenarlo. </label> </div>");
		style_border_input('sanguineo' , 'rojo');
	}else if (type_blood_driver == "a" || type_blood_driver == "ab" || type_blood_driver == "b" || type_blood_driver == "o") {
		if (value_opcion == true) {
			$('#container_full_type_blood_driver').show();
			$('#container_full_type_blood_driver').html("<h4><span class='label label-success'>El tipo de Sangre es : "+upper_type_blood_driver+" Positivo."+"</span></h4><br>");
		}else {
			$('#container_full_type_blood_driver').show();
			$('#container_full_type_blood_driver').html("<h4><span class='label label-success'>El tipo de Sangre es : "+upper_type_blood_driver+" Negativo."+"</span></h4><br>");
		}
	}else {
		flag_validacion_info_register = 1;
		document.getElementById('contenedor_habeas_data').style.display='none';
		document.getElementById('habeas').disabled=true;
		document.getElementById('boton_registrar').disabled=true;
		document.f_registro.habeas.checked=0;

		$("#container_check_type_blood_driver").show();
		$('#container_full_type_blood_driver').hide();
		$("#label_habeas").text('Acepto las condiciones de uso');
		$('#container_check_type_blood_driver').html("<div class='alert alert-danger'> <span class='fa fa-minus-circle fa-2x'></span> <br><label>El tipo de sangre ingresado no es Valido , solo son validos A , B , AB y O </label> </div>");
		style_border_input('sanguineo' , 'rojo');
	}
}

/**
 * Funcion para mostrar una alerta despues de la activacion
 *
 * @param menu , path
 * @return una alerta
 */
const alert_dinamic_actived = (menu,path) => {
	swal({
		title: "Activacion Completado!",
		text: "Se ha hecho la Activacion del "+menu+" Exitosamente.",
		type: "success"
	},
	function(isConfirm) {
		if (isConfirm) {
			window.location = path;
		}
	});
}

/**
 * Funcion para mostrar una alerta de error cuando se hace una activacion
 *
 * @param menu , path
 * @return una alerta
 */
const alert_dinamic_actived_error = (menu,path) => {
	swal({
		title: "Problemas en la Activacion!",
		text: "Se ha producido un error inesperado en la activacion del "+menu+". Por favor intente de nuevo.",
		type: "error"
	},
	function(isConfirm) {
		if (isConfirm) {
			window.location = path;
		}
	});
}

/**
 * Funcion para hacer una busqueda indexada en una tabla
 *
 * @param idTable,input
 * @return el registro coincidente
 */
const doSearch = (idTable = "table",input = "input") => {
	let tableReg = document.getElementById(idTable);
	let searchText = document.getElementById(input).value.toLowerCase();
	let cellsOfRow="";
	let found=false;
	let compareWith="";

	// Recorremos todas las filas con contenido de la tabla
	for (var i = 1; i < tableReg.rows.length; i++)
	{
		cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
		found = false;
		// Recorremos todas las celdas
		for (var j = 0; j < cellsOfRow.length && !found; j++)
		{
			compareWith = cellsOfRow[j].innerHTML.toLowerCase();
			// Buscamos el texto en el contenido de la celda
			if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1))
			{
				found = true;
			}
		}
		if(found) {
			tableReg.rows[i].style.display = '';

		}else {
			// si no ha encontrado ninguna coincidencia, esconde la
			// fila de la tabla
			tableReg.rows[i].style.display = 'none';
		}
	}
}

/**
 * Funcion para mostrar el contenedor de otra actividad
 *
 * @param none
 * @return muestra el contenedor otra actividad
 */
const show_other_activity = () => {
	if (document.f_evaluacion.actividad.checked == true) {
		document.getElementById('contenedor_o_actividad').style.display='block';
	} else {
		document.getElementById('contenedor_o_actividad').style.display='none';
	}
}

/**
 * Funcion para verificar la cedula en la bd en la opcion registro
 *
 * @param none
 * @return imprime en pantalla el error si se encuentra
 */
const check_document_duplicate_evaluador = () => {
	traer_Numero_documento = document.getElementById("numero_documento").value;
	$("#check_document_bd").load("library/verificar_duplicidad/verificar_documento_evaluador.php",{valor_documento:traer_Numero_documento});
}

/**
 * Funcion para verificar en la bd el codigo de la ruta en la opcion registro
 *
 * @param find_form,id_ruta
 * @return un mensaje de encontrado si esta en la bd
 */
const check_duplicate_route = (find_form,id_ruta) => {
	if (find_form == "Registro Ruta") {
		traer_Codigo_ruta = document.getElementById("codigo_ruta").value;
		$("#container_code_route").load("library/verificar_duplicidad/verificar_codigo_ruta.php",{valor_codigo:traer_Codigo_ruta,desde:find_form});
	}else {
		traer_Codigo_ruta = document.getElementById("codigo_ruta_actualizar").value;
		$("#verificar_codigo_ruta_Actualizar").load("library/verificar_duplicidad/verificar_codigo_ruta.php",{valor_codigo:traer_Codigo_ruta,desde:find_form,idRuta:id_ruta});
	}
}

/**
 * Funcion para verificar el documento del admin en la bd
 *
 * @param none
 * @return devuleve un mensaje si existe en la bd
 */
const check_document_duplicate_admin = () => {
	traer_Numero_documento = document.getElementById("numero_documento").value;
	$("#check_document_bd").load("library/verificar_duplicidad/verificar_documento_administrador.php",{valor_documento:traer_Numero_documento});
}

/**
 * Funcion para validar el nombre de la empresa
 *
 * @param id_form
 * @return un mensaje de encontrado en la bd
 */
const check_name_enterprise = (id_form) => {
	traer_nombre_empresa = document.getElementById("nombre_empresa").value;
	$("#container_check_name_enterprise").load("library/verificar_duplicidad/verificar_nombre_empresa.php",{valor_nombre_empresa:traer_nombre_empresa,desde_form:id_form});
}

/**
 * Funcion para mostrar el contenedor de habeas data y habiliar el boton de registro
 *
 * @param none
 * @return habilita el boton de registr y muestra el contenedor de habeas data
 */
const show_habeas_data = () => {
	if (flag_validacion_info_register == 0) {
		if (document.f_registro.habeas_data.checked == true) {
			document.getElementById('contenedor_habeas_data').style.display='block';
			document.getElementById('boton_registrar').disabled=false;
			$("#label_habeas").text('Rechazo las condiciones de uso');
		} else {
			document.getElementById('contenedor_habeas_data').style.display='none';
			document.getElementById('boton_registrar').disabled=true;
			$("#label_habeas").text('Acepto las condiciones de uso');
		}
	}
}

/**
 * Fucnion para mostrar el contenedor de tiempo recorrido dependiendo el caso
 *
 * @param none
 * @return nos muestra un contenedor
 */
const show_container_time_route = () => {
	opcion_tiempo = document.getElementById("seleccion_opcion_tiempo").value;
	$("#container_time_route").load("library/mostrar_tiempo_recorrido_ruta.php",{valor_opcion:opcion_tiempo});
}

/**
 * Funcion para verificar la cedula del conductor en la bd en la opcion registro
 *
 * @param none
 * @return un mensaje de error si se encuentra la cedula en la bd
 */
const check_document_duplicate_driver = () => {
	let traer_Numero_documento_conductor = document.getElementById("documento_conductor").value;
	$("#check_document_bd").load("library/verificar_duplicidad/verificar_documento_conductor.php",{valor_documento_conductor:traer_Numero_documento_conductor});
}

/**
 * Funcion para verificar el nombre de la ruta en la bd
 *
 * @param find_form
 * @return un mensaje si existe en la bd
 */
const check_name_route = (find_form) => {
	if (find_form == "Registro Ruta") {
		traer_Nombre_ruta = document.getElementById("nombre_ruta").value;
		$("#container_check_name").load("library/verificar_duplicidad/verificar_nombre_ruta.php",{valor_nombre_ruta:traer_Nombre_ruta,desde:find_form});
	}else {
		traer_Nombre_ruta = document.getElementById("codigo_ruta_a").value;
		$("#verificar_nombre_ruta_Actualizar").load("library/verificar_duplicidad/verificar_nombre_ruta.php",{valor_nombre_ruta:traer_Nombre_ruta,desde:find_form});
	}
}

/**
 * Funcion para verificar el nit de la empresa en la opcion registro
 *
 * @param none
 * @return un mensaje de encontrado el nit en la bd
 */
const check_nit = () => {
	traer_Nit_empresa = document.getElementById("nit").value;
	$("#container_check_nit").load("library/verificar_duplicidad/verificar_nit_empresa.php",{valor_nit_empresa:traer_Nit_empresa});
}

/**
 * Funcion para verificar la placa del vehiculo en la bd
 *
 * @param none
 * @return un mensaje de coincidencia en la bd
 */
const check_placa_car = () => {
	traer_Placa = document.getElementById("placa").value;
	$("#container_check_placa").load("library/verificar_duplicidad/verificar_placa.php",{valor_placa:traer_Placa});
}

/**
 * Funcion para verificar la cantidad de digitos del modelo del vehiculo
 *
 * @param modelo
 * @return un mensaje de error si el año no es correcto con respecto a los digitos
 */
const check_age_car = (modelo) => {
	let total_digitos = modelo.length;

	if (total_digitos > 4 || total_digitos < 4) {
		alert_dinamic_check_validator("La cantidad de digitos del Modelo no es correcto", "vehiculos.php");
		style_border_input("modelo",'rojo');
	}else {
		style_border_input("modelo",'verde');
	}
}

/**
 * Funcion para verificar la fecha tecnicomecanica del vehiculo con respecto al año del modelo
 *
 * @param age_modelo,age_test
 * @return una alerta de fecha inchoherente
 */
const check_date_test_car = (age_modelo,age_test) => {
	let only_year_date_test_car = age_test.split("-");

	if (only_year_date_test_car < age_modelo) {
		alert_dinamic_check_validator("La fecha de la revision tecnicomecanica no es coherente con el año del modelo del vehiculo.", "vehiculos.php")
		style_border_input("fecha_revision","rojo");
	} else {
		style_border_input("fecha_revision","verde");
	}
}

/**
 * Funcion para verificar el numero interno del vehiculo en la bd
 *
 * @param none
 * @return un mensaje de coincidencia en la bd
 */
const check_number_inside_car = () => {
	traer_numero_interno = document.getElementById("numero_interno").value;
	$("#check_number_inside").load("library/verificar_duplicidad/verificar_numero_interno.php",{valor_numero:traer_numero_interno});
}

/**
 * Funcion para verificar el nombre del tipo docuento en la bd
 *
 * @param none
 * @return un mensaje de encontrado en la bd
 */
const check_type_document = () => {
	traer_Nombre_t_Documento = document.getElementById("nombre_t_documento").value;
	$("#container_check_type_document").load("library/verificar_duplicidad/verificar_tipo_documento.php",{valor_t_documento:traer_Nombre_t_Documento});
}

/**
 * Funcion para verificar el nombre del rol en la opcion registro
 *
 * @param none
 * @return un mensaje de coincidencia en la bd
 */
const check_name_rol = () => {
	traer_Nombre_rol = document.getElementById("nombre_rol").value;
	$("#container_check_name_rol").load("library/verificar_duplicidad/verificar_rol.php",{valor_rol:traer_Nombre_rol});
}

/**
 * Funcion para validar el nombre del sintoma
 *
 * @param none
 * @return mensaje de error por coincidencia en la bd
 */
const check_name_sintoma = () => {
	traer_Nombre_sintoma = document.getElementById("nombre_sintoma").value;
	$("#container_name_sintoma").load("library/verificar_duplicidad/verificar_sintoma.php",{valor_sintoma:traer_Nombre_sintoma});
}

/**
 * Funcion para verificar el nombre del signo
 *
 * @param none
 * @return un mensaje de coincidencia de la bd
 */
const check_name_signo = () =>{
	traer_Nombre_signo = document.getElementById("nombre_signo").value;
	$("#container_name_signo").load("library/verificar_duplicidad/verificar_signo.php",{valor_signo:traer_Nombre_signo});
}

/**
 * Funcion para verificar el nombre de la alteracion emocional
 *
 * @param none
 * @return un mensaje de coincidencia de la bd
 */
const check_name_emocional = () => {
	traer_Nombre_emocional = document.getElementById("nombre_emocional").value;
	$("#container_name_emocional").load("library/verificar_duplicidad/verificar_emocional.php",{valor_emocional:traer_Nombre_emocional});
}

/**
 * Funcion para verificar el nombre de la alteracon neurologica
 *
 * @param none
 * @return un mensaje de conincidencia de la bd
 */
const check_name_neurologico = () => {
	traer_Nombre_neurologico = document.getElementById("nombre_neurologico").value;
	$("#container_name_neurologico").load("library/verificar_duplicidad/verificar_neurologico.php",{valor_neurologico:traer_Nombre_neurologico});
}

/**
 * Funcion para mostrar contenedor de otras opciones de sintomas , signos y las dos alteraciones
 *
 * @param nameInput , nameContainer
 * @return mostrar un contenedor
 */
const show_others_options = (nameInput,nameContainer) => {
	let input = document.getElementById(nameInput).checked;
	return (input) ? document.getElementById(nameContainer).style.display='block' : document.getElementById(nameContainer).style.display='none';
}

/**
 * Funcion para verificar que las horas de los tres campos del menu interrogatorio no se pase de 24 horas del dia
 *
 * @param none
 * @return un mensaje de error si se pasa de 24 horas
 */
const check_hour_all_destiny = () => {
	let horas_descanso = parseInt(document.getElementById("hora_descanso").value);
	let horas_camarote = parseInt(document.getElementById("hora_camarote").value);
	let horas_conduciendo = parseInt(document.getElementById("hora_conduciendo").value);
	let horas_otra_actividad = parseInt(document.getElementById("otra_actividad").value);
	let suma_permitida = horas_descanso + horas_camarote + horas_conduciendo + horas_otra_actividad;

	if(suma_permitida > 24) {
		alert_dinamic_check_validator("Lo sentimos , las horas ingresadas son incorrectas , por que se pasa de las 24 horas que tiene un dia.", "Evaluacion.php");
	}
}

/**
 * Funcion para seleccionar todo los checkbox del form evaluacion fatiga
 *
 * @param none
 * @return activa todo los checkbox
 */
const select_all_checkbox = ()=> {
	for (i=0;i<document.f_evaluacion.elements.length;i++){
		if(document.f_evaluacion.elements[i].type == "checkbox")
			document.f_evaluacion.elements[i].checked=1;
	}

	document.getElementById('contenedor_o_sintoma').style.display='block';
	document.getElementById('contenedor_alteracines_emocionales').style.display='block';
	document.getElementById('contenedor_alteraciones_neurologicas').style.display='block';
}

/**
 * Funcion para desmarcar todo los checkbox del form evaluacion
 *
 * @param none
 * @return una accion
 */
const desmarcar_todo_checkbox = () =>{
	for (i=0;i<document.f_evaluacion.elements.length;i++){
		if(document.f_evaluacion.elements[i].type == "checkbox")
			document.f_evaluacion.elements[i].checked=0;
	}

	document.getElementById('contenedor_o_sintoma').style.display='none';
	document.getElementById('contenedor_alteracines_emocionales').style.display='none';
	document.getElementById('contenedor_alteraciones_neurologicas').style.display='none';
}

/**
 * Funcion para permitir solo numeros en un input
 *
 * @param e,desde
 * @return impide el ingreso de letras u otros caracteres diferentes a numeros
 */
const justNumbers = (e,desde) => {
	let keynum = window.event ? window.event.keyCode : e.which;

	if (desde == "Rutas" || desde == "Administrador" || desde == "Conductores" || desde == "Evaluadores" || desde == "Vehiculo" || desde == "form_evaluacion") {
		//Solo se permite el caracter de borrar , el 8 es el valor en la tabla Asscii
		if ((keynum == 8))
			return true;
		return /\d/.test(String.fromCharCode(keynum));
	}else if(desde == "Empresa"){
		//Se permite el caracter de borrar y el guion
		if ((keynum == 8) || (keynum == 45))
			return true;
		return /\d/.test(String.fromCharCode(keynum));
	}else {
		//Se permite el caracter de borrar y el punto
		if ((keynum == 8) || (keynum == 46))
			return true;
		return /\d/.test(String.fromCharCode(keynum));
	}
}

/**
 * Funcion para validar que solo ingresen numeros y el caracter borrar
 *
 * @param e
 * @return nos impide el ingreso de cadenas
 */
const justNumbersTime = (e) => {
	let keynum = window.event ? window.event.keyCode : e.which;
	//Solo se permite el caracter de borrar , el 8 es el valor en la tabla Asscii
	if ((keynum == 8))
		return true;
	return /\d/.test(String.fromCharCode(keynum));
}

/**
 * Funcion para impedir el ingreso de numeros en un input
 *
 * @param e
 * @return impide el ingreso de numeros u tros caracteres en el input
 */
const onlyWords = (e,desde = "") => {
	key = e.keyCode || e.which;
	tecla = String.fromCharCode(key).toLowerCase();
	letras = " abcdefghijklmnñopqrstuvwxyz";
	letras_tipo_sangre_conductor = "abo";
	//El 8 es el codigo de la tabla ascii de eliminar un caracter BS
	especiales = "8";

	tecla_especial = false
	if(key == especiales){
		tecla_especial = true;
	}

	if (desde == "type_blood_drive") {
		if(letras_tipo_sangre_conductor.indexOf(tecla)==-1 && !tecla_especial){
			return false;
		}
	}else if(letras.indexOf(tecla)==-1 && !tecla_especial){
		return false;
	}
}

/**
 * Funcion para verificar la altura del conductor en la opcion registro
 *
 * @param height_first,height_second
 * @return un mnesaje de error si no es cohenrente la altura ingresada
 */
const check_height_drive = (height_first = "" , height_second = "") => {
	if (height_first != "" && height_second != "") {
		let result = height_first > 2 ? 'La primera parte de la altura no es valida.' : '';
		let result2 = height_second > 99 ? 'La Segunda parte de la altura no es valida.' : '';

		if (result != "" || result2 != "") {
			$("#container_check_height").show();
			$("#container_check_height").html("<div class='alert alert-danger'> <span class='fa fa-minus-circle fa-2x'></span> <br><label> "+result+"<br>"+result2+" </label> </div>");
			flag_validacion_info_register = 1;
			document.getElementById('contenedor_habeas_data').style.display='none';
			document.getElementById('habeas').disabled=true;
			document.getElementById('boton_registrar').disabled=true;

			document.f_registro.habeas.checked=0;
			$("#label_habeas").text('Acepto las condiciones de uso');
		}else {
			$("#container_check_height").hide();
			flag_validacion_info_register = 0;
			document.getElementById('contenedor_habeas_data').style.display='none';
			document.getElementById('habeas').disabled=false;
			document.getElementById('boton_registrar').disabled=true;

			document.f_registro.habeas.checked=0;

			let value_id = result == "" ? 'altura_segunda_parte' : 'altura_primera_parte';
			style_border_input(value_id , 'verde');
			$("#label_habeas").text('Acepto las condiciones de uso');
		}

		//Asignar el color al borde del input
		if (result == "" && result2 != "") {
			style_border_input('altura_segunda_parte' , 'rojo');
			style_border_input('altura_primera_parte' , 'verde');
			$("#result_final_height_drive").hide();
		}else if(result != "" && result2 == "") {
			style_border_input('altura_primera_parte' , 'rojo');
			style_border_input('altura_segunda_parte' , 'verde');
			$("#result_final_height_drive").hide();
		}else if(result != "" && result2 != "") {
			style_border_input('altura_primera_parte' , 'rojo');
			style_border_input('altura_segunda_parte' , 'rojo');
			$("#result_final_height_drive").hide();
		}else {
			style_border_input('altura_primera_parte' , 'verde');
			style_border_input('altura_segunda_parte' , 'verde');
			$("#result_final_height_drive").show();
			$("#result_final_height_drive").html("<h4><span class='label label-success'>La altura Final es : "+height_first+" m"+" "+height_second+" cm."+"</span></h4><br>");
		}
	}else if(height_first == "" && height_second != "") {
		flag_validacion_info_register = 1;
		style_border_input('altura_segunda_parte' , 'verde');
		style_border_input('altura_primera_parte' , 'rojo');

		document.getElementById('contenedor_habeas_data').style.display='none';
		document.getElementById('habeas').disabled=true;
		document.getElementById('boton_registrar').disabled=true;
		document.f_registro.habeas.checked=0;

		$("#label_habeas").text('Acepto las condiciones de uso');
		$("#result_final_height_drive").hide();
	}else if(height_second == "" && height_first != ""){
		flag_validacion_info_register = 1;
		style_border_input('altura_primera_parte' , 'verde');
		style_border_input('altura_segunda_parte' , 'rojo');

		document.getElementById('contenedor_habeas_data').style.display='none';
		document.getElementById('habeas').disabled=true;
		document.getElementById('boton_registrar').disabled=true;
		document.f_registro.habeas.checked=0;

		$("#label_habeas").text('Acepto las condiciones de uso');
		$("#result_final_height_drive").hide();
	}else {
		flag_validacion_info_register = 1;
		style_border_input('altura_primera_parte' , 'rojo');
		style_border_input('altura_segunda_parte' , 'rojo');

		document.getElementById('contenedor_habeas_data').style.display='none';
		document.getElementById('habeas').disabled=true;
		document.getElementById('boton_registrar').disabled=true;
		document.f_registro.habeas.checked=0;

		$("#result_final_height_drive").hide();
		$("#label_habeas").text('Acepto las condiciones de uso');
	}
}

/**
 * Funcion para impedir que en el campo hora supere las 24 horas
 *
 * @param time,path,idInput
 * @return una alerta para avisar
 */
const stop_value_hour_more_12 = (time,path,idInput) =>{
	let length_time = time.length;

	if (time > 12 || time == 0) {
		alert_dinamic_check_validator("La hora ingresada es incorrecta porque supera las 12 horas o es igual a 0.", path);
		style_border_input(idInput,"rojo");
	}else {
		style_border_input(idInput,"verde");
	}

	(length_time > 2) ? alert_dinamic_check_validator("El formato de la hora ingresada es incorrecta.", path) : '';
}

/**
 * Funcion para validar que en el campo minutos no pase de 60
 *
 * @param path,idInput
 * @return Aviso de que el campo minuto no puede ser mayor a 60
 */
const stop_value_minutes_more_60 = (time,path,id_input) => {
	let length_time = time.length;

	if (time > 60 || time == 0) {
		alert_dinamic_check_validator("Los minutos ingresados no puede superar los 60 minutos o ser igual a 0.", path);
		style_border_input(id_input,"rojo");
	}else {
		style_border_input(id_input,"verde");
	}

	(length_time > 2) ? alert_dinamic_check_validator("El formato de los Minutos ingresados es incorrecta.", path) : '';
}

/**
 * Funcion traer distancia y tiempo de la lista desplejable destino en el menu interrogatorio
 *
 * @param none
 * @return nos devuelve una lista dinamica
 */
const get_distance_time = () => {
	let traer_valor_id = document.getElementById("ruta").value;

	if(traer_valor_id == 0) {
		alert_dinamic_check_validator("En el menu interrogatorio no se ha seleccionado el destino.", "evaluacion.php");
	}else{
		$(document).ready(function(){
			let id_destino = traer_valor_id;
			$("#container_distance_time").load("library/destino_tiempo.php",{valor_combo:id_destino});
		});
	}
}

/**
 * Funcion para verificar que las horas de descanso no pase de 24 horas
 *
 * @param none
 * @return un mensaje de error cuando se pasa de 24 horas
 */
const check_hour_break = () => {
	trae_hora_sueno = parseInt(document.getElementById("sueño_efectivo_previo").value);

	if(trae_hora_sueno == 0) {
		alert_dinamic_check_validator("Tiene que ingresar una hora correcta , por favor vuelva a llenar el campo de Tiempo de sueño", "evaluacion.php");
	}else if(trae_hora_sueno >= 24) {
		alert_dinamic_check_validator("La hora ingresada de Tiempo de Sueño no pueden ser superior a 24 Horas", "Evaluacion.php");
	}
	return check_hour_all_break();
}

/**
 * Funcion para verificar el campo tiempo de descanso y tiempo de sueño
 *
 * @param none
 * @return un mensaje de error cuando se pasa de 24 horas
 */
const check_hour_all_break = () => {
	let traer_hora_descanso = parseInt(document.getElementById("tiempo_descanso").value);
	let suma_horas_permitidas = trae_hora_sueno + traer_hora_descanso;

	(suma_horas_permitidas >= 24) ? alert_dinamic_check_validator("La hora ingresada en el campo Tiempo Sueño y tiempo descanso supera las 24 horas que tiene el dia.", "Evaluacion.php") : "";
}

/**
 * Funcion para ocultar los campos creados por la lista dinamica destino
 *
 * @param none
 * @return oculta los campos que se crearon
 */
const hide_new_input_destiny = () => {
	document.getElementById('contenedor_o_actividad').style.display='none';
	document.getElementById('contenedor_destino_Ajax').style.display='none';
	document.getElementById('camarote').style.display='none';
}

/**
 * Funcion para verificar el ritmo cardiaco que seha permitido
 *
 * @param none
 * @return un mensaje de error
 */
const limit_pulsation_hearth = () => {
	let valor_pulsaciones = document.getElementById("pulsaciones").value;

	if(valor_pulsaciones == 0) {
		alert_dinamic_check_validator("Las pulsaciones ingresadas no son validas , por favor ingreselas nuevamente", "evaluacion.php");
	}else if(valor_pulsaciones >= 150) {
		alert_dinamic_check_validator("Las pulsaciones que presenta el conductor superaron el valor del limite con respecto a la edad que tiene , por favor vuelva a tomar el pulso , si es correcto llame al medico inmediatamente o vuelva hacer la medicion para verificar el valor", "evaluacion.php")
	}
}

/**
 * Funcion para guardar las anotaciones del admin
 *
 * @param none
 * @return guarda en la bd
 */
const save_notes_admin = () => {
	let traer_Notas_admin = document.getElementById("nota_admin").value;
	$("#container_response_note").load("registro_nota_admin.php",{valor_nota_admin:traer_Notas_admin});
}

/**
 * Funcion para verificar la extension de la imagen cargada
 *
 * @param photo,nameMenu
 * @return un mensaje de error si la extension de la imagen no es permitida
 */
const check_photo = (photo,nameMenu = "") => {
	extensiones_permitidas = new Array(".png", ".jpg", ".jpeg");
	//recupero la extensión de este nombre de photo
	extension = (photo.substring(photo.lastIndexOf("."))).toLowerCase();
	permitida = false;

	let extensiones_permitidas_string = extensiones_permitidas.toString();
	let show_extensiones_enable = extensiones_permitidas_string.split(",.");

	//Utilizamos un ciclo para recorrer el vector con la extension del photo cargado si lo encontramos , Si se encuentra a la variable permitidas le damos a un valor de true
	for (var i = 0; i < extensiones_permitidas.length; i++) {
		if (extensiones_permitidas[i] == extension) {
			permitida = true;
			break;
		}
	}

	if(nameMenu == "") {
		if (!permitida) {
			flag_validacion_info_register = 1;

			document.getElementById('contenedor_habeas_data').style.display='none';
			document.getElementById('habeas').disabled=true;
			document.getElementById('boton_registrar').disabled=true;
			document.f_registro.habeas.checked=0;

			$("#label_habeas").text('Acepto las condiciones de uso');
			$('#container_extensiones_agree').show();
			$('#container_extensiones_agree').html("<div class='alert alert-danger'> <span class='fa fa-minus-circle fa-2x'></span> <br><label> El archivo cargado no es Valido. <br> las Extensiones Permitidas son : "+show_extensiones_enable+" </label> </div>");
		}else {
			flag_validacion_info_register = 0;

			document.getElementById('contenedor_habeas_data').style.display='none';
			document.getElementById('habeas').disabled=false;
			document.getElementById('boton_registrar').disabled=true;
			document.f_registro.habeas.checked=0;

			$("#label_habeas").text('Acepto las condiciones de uso');
			$('#container_extensiones_agree').hide();
		}
	}else {
		if (!permitida) {
			document.getElementById('enviar_evaluacion').disabled=true;
			$('#container_extensiones_agree').show();
			$('#container_extensiones_agree').html("<div class='alert alert-danger'> <span class='fa fa-minus-circle fa-2x'></span> <br><label> El archivo cargado no es Valido. <br> las Extensiones Permitidas son : "+show_extensiones_enable+" </label> </div>");
		}else {
			document.getElementById('enviar_evaluacion').disabled=false;
			$('#container_extensiones_agree').hide();
		}
	}

}

/**
 * Funcion para verificar la edad ingresada en la opcion registro
 *
 * @param age,path
 * @return un mensaje de error
 */
const check_age = (age, path) => {
	if(age >= 100 || age == 0) {
		alert_dinamic_check_validator('La edad que ingreso no es valida , por favor verificarlo antes de hacer el registro!', path);
	}

	$("#container_check_age").load("library/verificar_duplicidad/verificar_edad.php",{valor_edad:age,menu:path});
}

/**
 * Funcion para verificar que los digitos del telefono sean correctos
 *
 * @param number_photo,menu
 * @return un mensaje de error
 */
const check_number_phone = (number_phone,menu) => {
	let count_number_phone = number_phone.length;
	//7 digitos para numero fijo y 10 digitos para celular
	if(count_number_phone == 7 || count_number_phone == 10) {
		flag_validacion_info_register = 0;
		document.getElementById('container_check_number_phone').style.display='none';
		document.getElementById('contenedor_habeas_data').style.display='none';
		document.getElementById('habeas').disabled=false;
		document.getElementById('boton_registrar').disabled=true;

		document.f_registro.habeas.checked=0;

		style_border_input('telefono' , 'verde');
		$("#label_habeas").text('Acepto las condiciones de uso');
	}else{
		flag_validacion_info_register = 1;
		$('#container_check_number_phone').html("<div class='alert alert-danger'><span class='fa fa-minus-circle fa-2x'></span><br> <label> El telefono ingresado es incorrecto , Verifique la cantidad de Digitos </label> </div>");
		$("#label_habeas").text('Acepto las condiciones de uso');

		document.getElementById('container_check_number_phone').style.display='block';
		document.getElementById('contenedor_habeas_data').style.display='none';
		document.getElementById('habeas').disabled=true;
		document.getElementById('boton_registrar').disabled=true;

		if (menu == "Evaluadores") {
			document.f_registro.habeas.checked=0;
		}
		style_border_input('telefono' , 'rojo');
	}
}

/**
 * Funcion que nos permite verificar la cantidad de digitos de una cedula en la opcion registro
 *
 * @param number_document,path
 * @return un mensaje de error
 */
const check_digit_document = (number_document,path) => {
	var digit_document = number_document.length;

	//Condicional para saber si cumple con el formato comun , 8 son los digitos para las cedulas antiguas, 10para las nuevas cedulas y 11 para las tarjetas de identidad
	if(digit_document != 8 && digit_document != 10  && digit_document != 11 && digit_document != 7) {
		return alert_dinamic_check_validator('El documento Ingresado es incorrecto porque no cumple con la cantidad de digitos necesaria.', path);
	}
}

/**
 * Funcion para mostrar el panel de activacion del evaluador
 *
 * @param full_name,id,from
 * @return Un panel con un formulario
 */
const show_container_description_actived = (full_name,id,from) => {
	let div = document.getElementById("container_actived");
	div.innerHTML = "<div id='content_form_activated' class='border_outside'><form action="+from+" method='post'> <center> <h3>Activacion de  <strong>"+full_name+"</strong></h3> <br> <input type='text' name='id_dato' value="+id+" hidden> <textarea name='observaciones_activacion' placeholder='Ingresar las Observaciones de Activacion' cols='50' rows='5' onkeypress='return onlyWords(event)' required></textarea><br><br> <button type='submit' class='btn btn-success glyphicon glyphicon-saved btn-lg' id='activar_evaluador'></button> </center> </form></div>";
	document.getElementById('ocultar_form_activacion').style.display='block';
	document.getElementById('all_download_actived_log').style.display='none';
}

/**
 * Funcion para ocultar el formulario de activacion
 *
 * @param none
 * @return oculta elementos en el DOM
 */
const hidden_form_actived = () => {
	document.getElementById('content_form_activated').style.display='none';
	document.getElementById('ocultar_form_activacion').style.display='none';
	document.getElementById('all_download_actived_log').style.display='inline-block';
}

/**
 * Funcion para verificar el formato del email en la opcion registro
 *
 * @param address_email
 * @return un mensaje de error si el formato del email es incorrecto
 */
const check_email = address_email => {
	if(address_email == "") {
		flag_validacion_info_register = 0;
		document.getElementById('contenedor_habeas_data').style.display='none';
		document.getElementById('container_check_email').style.display='none';
		document.f_registro.habeas.checked=0;
		document.getElementById('habeas').disabled=false;
		document.getElementById('boton_registrar').disabled=true;

		style_border_input("email","verde");
		$("#label_habeas").text('Acepto las condiciones de uso');
	}else if (/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(address_email)){
		flag_validacion_info_register = 0;

		document.getElementById('contenedor_habeas_data').style.display='none';
		document.getElementById('container_check_email').style.display='none';
		document.f_registro.habeas.checked=0;
		document.getElementById('habeas').disabled=false;
		document.getElementById('boton_registrar').disabled=true;

		style_border_input("email","verde");
		$("#label_habeas").text('Acepto las condiciones de uso');
	}else {
		flag_validacion_info_register = 1;
		$('#container_check_email').html("<div class='alert alert-danger'> <span class='fa fa-minus-circle fa-2x'></span> <br><label> La dirección de email es incorrecta!. </label> </div>");

		document.getElementById('contenedor_habeas_data').style.display='none';
		document.f_registro.habeas.checked=0;
		document.getElementById('container_check_email').style.display='block';
		document.getElementById('habeas').disabled=true;
		document.getElementById('boton_registrar').disabled=true;
		style_border_input("email","Rojo");

		$("#label_habeas").text('Acepto las condiciones de uso');
	}
}

/**
 * Funcion para colorear el borde del input dependiendo si es correcto en verdo o error en rojo
 *
 * @param id_input,valor
 * @return un color en el borde del input
 */
const style_border_input = (id_input , valor) => {
	switch(id_input) {
		case 'nombre_apellido':
			if (valor == "verde") {
				$('#nombre').css('border' , '1px solid green');
				$('#apellido').css('border' , '1px solid green');
			}else {
				$('#nombre').css('border' , '1px solid red');
				$('#apellido').css('border' , '1px solid red');
			}
		break;

		case id_input:
			$resultado = (valor == "verde") ? $('#'+id_input).css('border' , '1px solid green') : $('#'+id_input).css('border' , '1px solid red');
			return $resultado;
		break;
		default:
			alert_dinamic_outside_place('log.php');
	}
}

/**
 * Funcion para redireccionar despues de cierto tiempo de inactividad
 *
 * @param none
 * @return redireccion
 */
const redirectPage = () => {
	window.location = "Log.php";
}

/*Esta funcion mide el tiempo en milisegundos , es decir , 1 segundo es 1000 milisegundos
Para nuestro caso 10 minutos son 600.000 milisegundoslo redireccionara al inicio de la plataforma
La funcion se coloco como maximo en una sola pagina de 20 minutos que en milisgundos seria 1'200.000 milisegundos
*/
setTimeout("redirectPage()", 1200000);

/**
 * Funcion para verificar el nombre completo de alguien en la bd en la opcion registro
 *
 * @param nombre,apellido,menu_origen,opcion
 * @return
 */
const check_full_name = (nombre = null, apellido = null,menu_origen , opcion) =>{
	$("#container_check_full_name").load("library/verificar_duplicidad/verificar_nombre_completo.php",{valor_nombre:nombre,valor_apellido:apellido,valor_menu:menu_origen,valor_opcion:opcion});
}

/**
 * funcion en el rol admin , modulo rutas , opcion editar campo tiempo recorrido para seleccionar si horas o minutos
 *
 * @param desde
 * @return muestra contenido
 */
const enabled_disabled_check = (desde) => {
	if (desde == 'campo_hora') {
		let clase_tiempo_hora = $("#tiempo_hora").attr('class');
		if (clase_tiempo_hora == "form-control checked_hora") {
			document.getElementById('tiempo_hora').disabled=false;
			$("#tiempo_hora").removeClass('checked_hora');
			$("#tiempo_hora").attr('value','');
			$("#texto_adicional_tiempo_hora").text('Activar');
			return stop_empty_time_destiny();
		}else {
			document.getElementById('tiempo_hora').disabled=true;
			$("#tiempo_hora").addClass('checked_hora');
			$("#tiempo_hora").attr('value','0');
			$("#texto_adicional_tiempo_hora").text('Desactivar');
			return stop_empty_time_destiny();
		}
	}else {
		var clases_tiempo_minuto = $("#tiempo_minuto").attr('class');
		if (clases_tiempo_minuto == "form-control checked_hora") {
			document.getElementById('tiempo_minuto').disabled=false;
			$("#tiempo_minuto").removeClass('checked_hora');
			$("#tiempo_minuto").attr('value','');
			$("#texto_adicional_tiempo_minuto").text('Activar');
			return stop_empty_time_destiny();
		}else {
			document.getElementById('tiempo_minuto').disabled=true;
			$("#tiempo_minuto").addClass('checked_hora');
			$("#tiempo_minuto").attr('value','0');
			$("#texto_adicional_tiempo_minuto").text('Desactivar');
			return stop_empty_time_destiny();
		}
	}
}

/**
 * Funcion para verificar que el campo tiempo recorrido modulo rutas rol admin no este vacio
 *
 * @param none
 * @return una alerta
 */
const stop_empty_time_destiny =() => {
	valor_hora = document.getElementById("tiempo_hora").value;
	valor_minuto = document.getElementById("tiempo_minuto").value;

	if (valor_hora == 0 && valor_minuto == 0) {
		$('#contenedor_validar_tiempo_recorrido').show();
		$('#contenedor_validar_tiempo_recorrido').html("<div class='alert alert-danger'> <span class='fa fa-minus-circle fa-2x'></span> <br><label> Se debe de ingresar el tiempo de Recorrido de la ruta. </label> </div>");
		document.getElementById('actualizar_registro_ruta').disabled=true;
	}else {
		$('#contenedor_validar_tiempo_recorrido').hide();
		document.getElementById('actualizar_registro_ruta').disabled=false;
	}
}

/**
 * Funcion para mostrar el boton que limpia los input de nombre y apellido cuando esta repetido
 *
 * @param none
 * @return muestra el boton en pantalla
 */
const show_button_clear_inputs = () => {
	$("#button_clean_full_name").show();
}

/**
 * Funcion para ocultar el boton de limpiar el nombre completo cuando esta en la bd en la opcion registro
 *
 * @param none
 * @return oculta el boton
 */
const hide_button_clear_inputs = () => {
	$("#button_clean_full_name").hide();
}

/**
 * funcion para validar el username en la bd en la opcion registro
 *
 * @param username,menu
 * @return mensaje de error si se encontro en la bd
 */
const check_username = (username,menu) =>{
	$("#container_check_username").load("library/verificar_duplicidad/verificar_nombre_usuario.php",{user_name:username,desde_form:menu});
}

/**
 * funcion para validar la contraseña en la bd en la opcion registro
 *
 * @param password,menu
 * @return un mensaje de error si lo encontro en la bd
 */
const check_password = (password,menu) => {
	$("#container_check_password").load("library/verificar_duplicidad/verificar_password.php",{pass:password,desde_form:menu});
}

/**
 * Funcion para mostrar dinamico el select sueño_profundo
 *
 * @param idInput,idHour,idMinutes,idBothTime
 * @return un input dependiendo el caso
 */
const show_container_checked = (idInput,idHour,idMinutes,idBothTime) => {
	let option_checked = document.getElementById(idInput).value;

	switch(option_checked){
		case "hora":
			document.getElementById(idHour).style.display = "block";
			$("#solo_hora_sueno").attr('required','required');
			document.getElementById(idMinutes).style.display = "none";
			document.getElementById(idBothTime).style.display = "none";
		break;
		case "minutos":
			document.getElementById(idMinutes).style.display = "block";
			$("#solo_minutos").attr('required','required');
			document.getElementById(idHour).style.display = "none";
			document.getElementById(idBothTime).style.display = "none";
		break;
		case "ambos":
			document.getElementById(idBothTime).style.display = "block";
			$("#solo_hora_sueno_both").attr('required','required');
			$("#solo_minutos_both").attr('required','required');
			document.getElementById(idHour).style.display = "none";
			document.getElementById(idMinutes).style.display = "none";
		break;

		default:
			alert_dinamic_outside_place('evaluacion.php');
		break;
	}
}

const show_all_time_sleep = (option_profundo,option_ligero) => {
	let combinaciones = option_profundo+"-"+option_ligero;
	let hour_profundo,minutes_profundo,hour_ligero,minutes_ligero,all_time_hour,all_time_minutes,all_time_both,change_word;

	switch(combinaciones) {
		case 'hora-hora':
			hour_profundo = document.getElementById("solo_hora_sueno").value;
			hour_ligero = document.getElementById("solo_hora_sueno_ligero").value;
			all_time_both = parseInt(hour_profundo) + parseInt(hour_ligero);
			$("#content_all_time_both_sleep").show().html("<br><hr><br><div class='panel panel-success'><div class='panel-heading'><h3 class='panel-title'>Tiempo Total de Sueño</h3></div><div class='panel-body'>"+all_time_both+" Horas.</div></div>");
			/*console.log("El tiempo total de hora y hora es = "+all_time_both);*/
		break;
		case 'minutos-minutos':
			minutes_profundo = document.getElementById("solo_minutos").value;
			minutes_ligero = document.getElementById("solo_minutos_ligero").value;
			all_time_both = parseInt(minutes_profundo) + parseInt(minutes_ligero);

			if (all_time_both > 60 && all_time_both < 120) {
				add_time_hour = Math.floor((all_time_both*1)/60);
				all_time_hour = add_time_hour;
				sub_time_minutes = (add_time_hour*60)/1;
				all_time_both = all_time_both - sub_time_minutes;
				return $("#content_all_time_both_sleep").show().html("<br><hr><br><div class='panel panel-success'><div class='panel-heading'><h3 class='panel-title'>Tiempo Total de Sueño</h3></div><div class='panel-body'>"+all_time_hour+" Hora "+ all_time_both+" Minutos.</div></div>");
			}else if(all_time_both == 60) {
				return $("#content_all_time_both_sleep").show().html("<br><hr><br><div class='panel panel-success'><div class='panel-heading'><h3 class='panel-title'>Tiempo Total de Sueño</h3></div><div class='panel-body'> 1 Hora.</div></div>");
			}else if(all_time_both == 120) {
				return $("#content_all_time_both_sleep").show().html("<br><hr><br><div class='panel panel-success'><div class='panel-heading'><h3 class='panel-title'>Tiempo Total de Sueño</h3></div><div class='panel-body'> 2 Horas.</div></div>");
			}

			$("#content_all_time_both_sleep").show().html("<br><hr><br><div class='panel panel-success'><div class='panel-heading'><h3 class='panel-title'>Tiempo Total de Sueño</h3></div><div class='panel-body'>"+all_time_both+" Minutos.</div></div>");
		break;
		case 'ambos-ambos':
			/*Aqui Falta Testear las diferentes opciones*/
			hour_profundo = document.getElementById("solo_hora_sueno_both").value;
			minutes_profundo = document.getElementById("solo_minutos_both").value;
			hour_ligero = document.getElementById("solo_hora_sueno_both_ligero").value;
			minutes_ligero = document.getElementById("solo_minutos_both_ligero").value;
			all_time_hour = parseInt(hour_profundo) + parseInt(hour_ligero);
			all_time_minutes = parseInt(minutes_profundo) + parseInt(minutes_ligero);

			if (all_time_minutes >= 60) {
				add_time_hour = Math.floor((all_time_minutes*1)/60);
				sub_time_minutes = (add_time_hour*60)/1;
				all_time_hour = all_time_hour + add_time_hour;
				all_time_minutes = all_time_minutes - sub_time_minutes;
				return $("#content_all_time_both_sleep").show().html("<br><hr><br><div class='panel panel-success'><div class='panel-heading'><h3 class='panel-title'>Tiempo Total de Sueño</h3></div><div class='panel-body'>"+all_time_hour+" Hora "+ all_time_minutes+" Minutos.</div></div>");
			}

			return $("#content_all_time_both_sleep").show().html("<br><hr><br><div class='panel panel-success'><div class='panel-heading'><h3 class='panel-title'>Tiempo Total de Sueño</h3></div><div class='panel-body'>"+all_time_hour+" Hora "+ all_time_minutes+" Minutos.</div></div>");
		break;
		case 'hora-minutos':
			hour_profundo = document.getElementById("solo_hora_sueno").value;
			minutes_ligero = document.getElementById("solo_minutos_ligero").value;
			if (minutes_ligero >= 60) {
				hour_profundo = parseInt(hour_profundo) + 1;
				return console.log("El iempo total en h-m = "+hour_profundo);
			}
			/*console.log("El tiempo total en la hora es = "+hour_profundo+" Y en minutos es = "+minutes_ligero);*/
		break;
		case 'minutos-hora':
			minutes_profundo = document.getElementById("solo_minutos").value;
			hour_ligero = document.getElementById("solo_hora_sueno_ligero").value;
			if (minutes_profundo >= 60) {
				hour_ligero = parseInt(hour_ligero) + 1;
				return console.log("El tiempo total en m-h es = "+hour_ligero);
			}
			/*console.log("El tiempo total en la hora es = "+hour_ligero+" Y en minutos es = "+minutes_profundo);*/
		break;
		case 'ambos-minutos':
			hour_profundo = document.getElementById("solo_hora_sueno_both").value;
			minutes_profundo = document.getElementById("solo_minutos_both").value;
			minutes_ligero = document.getElementById("solo_minutos_ligero").value;
			all_time_minutes = parseInt(minutes_profundo) + parseInt(minutes_ligero);

			if (all_time_minutes >= 60) {
				add_time_hour = Math.floor((all_time_minutes*1)/60);
				sub_time_minutes = (add_time_hour*60)/1;
				hour_profundo = parseInt(hour_profundo) + add_time_hour;
				all_time_minutes = all_time_minutes - sub_time_minutes;
			}

			/*console.log("total en horas es = "+hour_profundo+" Y en minutos es = "+all_time_minutes);*/
		break;
		case 'minutos-ambos':
			minutes_profundo = document.getElementById("solo_minutos").value;
			hour_ligero = document.getElementById("solo_hora_sueno_both_ligero").value;
			minutes_ligero = document.getElementById("solo_minutos_both_ligero").value;
			all_time_minutes = parseInt(minutes_profundo) + parseInt(minutes_ligero);

			if (all_time_minutes >= 60) {
				add_time_hour = Math.floor((all_time_minutes*1)/60);
				sub_time_minutes = (add_time_hour*60)/1;
				hour_ligero = parseInt(hour_ligero) + add_time_hour;
				all_time_minutes = all_time_minutes - sub_time_minutes;
			}

			/*console.log("total en horas es = "+hour_ligero+" Y en minutos es = "+all_time_minutes);*/
		break;
		case 'ambos-hora':
			hour_profundo = document.getElementById("solo_hora_sueno_both").value;
			minutes_profundo = document.getElementById("solo_minutos_both").value;
			hour_ligero = document.getElementById("solo_hora_sueno_ligero").value;
			all_time_hour = parseInt(hour_profundo) + parseInt(hour_ligero);
			if (minutes_profundo >= 60) {
				all_time_hour = parseInt(all_time_hour) + 1;
				return console.log("El tiempo total en a-h es = "+all_time_hour);
			}
			/*console.log("total en horas es = "+all_time_hour+" Y en minutos es = "+minutes_profundo);*/
		break;
		case 'hora-ambos':
			hour_profundo = document.getElementById("solo_hora_sueno").value;
			hour_ligero = document.getElementById("solo_hora_sueno_both_ligero").value;
			minutes_ligero = document.getElementById("solo_minutos_both_ligero").value;
			all_time_hour = parseInt(hour_profundo) + parseInt(hour_ligero);

			if (minutes_ligero >= 60) {
				all_time_hour = parseInt(all_time_hour) + 1;
				return console.log("El tiempo total en h-a es = "+all_time_hour);
			}
			/*console.log("total en horas es = "+all_time_hour+" Y en minutos es = "+minutes_ligero);*/
		break;
		default:
			alert_dinamic_outside_place('evaluacion.php');
	}
}