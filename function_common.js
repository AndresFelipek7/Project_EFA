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

let traer_hora_sueño , traer_hora_descanso;
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
				title: "Bienvenido Evaluador al Sistema !",
				text: " Gracias por ayudarnos a salvar vidas",
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

/*********************************************************************************/
/*********************************************************************************/
/*********************************************************************************/

//Inicializar el plugin datepicker de jquery en todos los ids datepicker del input tipo date
/*$(function () {
	$.datepicker.setDefaults($.datepicker.regional["es"]);
	$("#datepicker").datepicker({
		firstDay: 1
	});
});*/

//Ayudas de todos los menus
$(document).on('ready',function(){
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
	$('#usuario_contraseña_conductor').tooltip();
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
});

//Funcion Dosearch general cuando solo hay una tabla en la pagina o una sola busqueda en ella
function doSearch(){

	var tableReg = document.getElementById('table');
	var searchText = document.getElementById('input').value.toLowerCase();
	var cellsOfRow="";
	var found=false;
	var compareWith="";

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
		if(found)
		{
			tableReg.rows[i].style.display = '';

		} else {
			// si no ha encontrado ninguna coincidencia, esconde la
			// fila de la tabla
			tableReg.rows[i].style.display = 'none';
		}
	}
}

//Funcion Dosearch para el menu sugerencia signo
function doSearch_Signo(){
	var tableReg = document.getElementById('table2');
	var searchText = document.getElementById('input2').value.toLowerCase();
	var cellsOfRow="";
	var found=false;
	var compareWith="";

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
		if(found)
		{
			tableReg.rows[i].style.display = '';
		} else {
			// si no ha encontrado ninguna coincidencia, esconde la
			// fila de la tabla
			tableReg.rows[i].style.display = 'none';
		}
	}
}

//Funcion Dosearch para el menu sugerencia Alteraciones Emocionales
function doSearch_Emocional(){
	var tableReg = document.getElementById('table3');
	var searchText = document.getElementById('input3').value.toLowerCase();
	var cellsOfRow="";
	var found=false;
	var compareWith="";

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
		if(found)
		{
			tableReg.rows[i].style.display = '';
		} else {
			// si no ha encontrado ninguna coincidencia, esconde la
			// fila de la tabla
			tableReg.rows[i].style.display = 'none';
		}
	}
}

//Funcion Dosearch para el menu sugerencia Alteraciones Neurologica
function doSearch_Neurologica(){
	var tableReg = document.getElementById('table4');
	var searchText = document.getElementById('input4').value.toLowerCase();
	var cellsOfRow="";
	var found=false;
	var compareWith="";

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
		if(found)
		{
			tableReg.rows[i].style.display = '';
		} else {
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

//Esta funcion es para mostrar el parrafo del habeas data y habilitar el boton de registrar Adminisrador
function mostrar_habeas_administrador() {
	/*Este condicional es para cuando el documento que se ingreso se encuentre en la bd se mantenga el boton de registrar
	deshabilitado haci el check del habeas data se seleccione no se habilite este boton porque el docuemnto ingresado
	no es valido*/
	/*La variable bandera tiene su valor en el arhivo verificar_documento_administrador.php
	ademas  de ser una variable global de JS en este archivo en la linea 17*/
	//Esta variable es para que el documento que se quiere registrar sea nuevo
	if(bandera == 1) {
		if (document.f_registro_administrador.habeas_data.checked == true) {
			document.getElementById('contenedor_habeas_data').style.display='block';
			/*Habilitar el boton de registrar cuando el check este seleccioando o checked*/
			document.getElementById('boton_registrar').disabled=true;
			$("#label_habeas").text('Rechazo las condiciones de uso');
			//por el contrario, si no esta seleccionada
		} else {
			document.getElementById('contenedor_habeas_data').style.display='none';
			/*Deshabilitar el boton cuando el check no esta seleccioando*/
			document.getElementById('boton_registrar').disabled=true;
			$("#label_habeas").text('Acepto las condiciones de uso');
		}
		/*La variable bandera_foto es para verificar que la extension del archivo cargado sea el correcto y no otro*/
	}else if(bandera_foto == 1){
		if (document.f_registro_administrador.habeas_data.checked == true) {
			document.getElementById('contenedor_habeas_data').style.display='block';
			//Si el formato de la foto no es y el check de habeas data esta seleccionado deshabiliteme el boton de registrar hasta que sea una archivo correcto
			document.getElementById('boton_registrar').disabled=true;
			$("#label_habeas").text('Rechazo las condiciones de uso');
			//por el contrario, si no esta seleccionada el habeas data
		}else {
			document.getElementById('contenedor_habeas_data').style.display='none';
			//Habilitar el boton de registrar cuando este seleccionado el check de habeas data
			document.getElementById('boton_registrar').disabled=false;
			$("#label_habeas").text('Acepto las condiciones de uso');
		}
	//Condicional para saber si el numero de telefono tiene los digitos que debe 7 para fijo o 10 para celular
}else if(bandera_telefono == 1) {
	if (document.f_registro_administrador.habeas_data.checked == true) {
		document.getElementById('contenedor_habeas_data').style.display='block';
		/*Habilitar el boton de registrar cuando el check este seleccioando o checked*/
		document.getElementById('boton_registrar').disabled=true;
		$("#label_habeas").text('Rechazo las condiciones de uso');
			//por el contrario, si no esta seleccionada
		}else {
			document.getElementById('contenedor_habeas_data').style.display='none';
			/*Deshabilitar el boton cuando el check no esta seleccioando*/
			document.getElementById('boton_registrar').disabled=true;
			$("#label_habeas").text('Acepto las condiciones de uso');
		}
	//Condicional para verificar el formato del correo ingresado si hay alguno ingresado que se encuentre bien antes de enviar
}else if(bandera_correo == 1) {
	if (document.f_registro_administrador.habeas_data.checked == true) {
		document.getElementById('contenedor_habeas_data').style.display='block';
		/*Habilitar el boton de registrar cuando el check este seleccioando o checked*/
		document.getElementById('boton_registrar').disabled=true;
		$("#label_habeas").text('Rechazo las condiciones de uso');
			//por el contrario, si no esta seleccionada
		}else {
			/*Deshabilitar el boton cuando el check no esta seleccioando*/
			document.getElementById('boton_registrar').disabled=true;
		}
	//Condicional para verificar que la edad ingresada sea correcta
}else if(bandera_edad == 1) {
	if (document.f_registro_administrador.habeas_data.checked == true) {
		document.getElementById('contenedor_habeas_data').style.display='block';
		/*Habilitar el boton de registrar cuando el check este seleccioando o checked*/
		document.getElementById('boton_registrar').disabled=true;
		$("#label_habeas").text('Rechazo las condiciones de uso');
			//por el contrario, si no esta seleccionada
		}else {
			/*Deshabilitar el boton cuando el check no esta seleccioando*/
			document.getElementById('boton_registrar').disabled=true;
			$("#label_habeas").text('Acepto las condiciones de uso');
		}
	}
	else {
		if(document.f_registro_administrador.habeas_data.checked == true) {
			document.getElementById('contenedor_habeas_data').style.display='block';
			/*Habilitar el boton de registrar cuando el check este seleccioando o checked*/
			document.getElementById('boton_registrar').disabled=false;
			$("#label_habeas").text('Rechazo las condiciones de uso');
			//por el contrario, si no esta seleccionada
		}else {
			document.getElementById('contenedor_habeas_data').style.display='none';
			/*Deshabilitar el boton cuando el check no esta seleccioando*/
			document.getElementById('boton_registrar').disabled=true;
			$("#label_habeas").text('Acepto las condiciones de uso');
		}
	}
}

/*Funcon que nos permite mostrar el contenedor del tiempo recorrido del menu rutas en la opcion de editar depenciendo de las opciones*/
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

//Funcion mostrar otros sintomas
function mostrar_otros_sintomas() {
	//Si la opcion con id Conocido_1 (dentro del documento > formulario con name fcontacto >     y a la vez dentro del array de Conocido) esta activada
	if (document.f_evaluacion.otro_sintoma.checked == true) {
	//muestra (cambiando la propiedad display del estilo) el div con id 'desdeotro'
	document.getElementById('contenedor_o_sintoma').style.display='block';
	//por el contrario, si no esta seleccionada
} else {
	//oculta el div con id 'desdeotro'
	document.getElementById('contenedor_o_sintoma').style.display='none';
}
}

//Funcion mostrar otras alteraciones emocionales
function mostrar_otra_alteraciones_emocionales() {
	//Si la opcion con id Conocido_1 (dentro del documento > formulario con name fcontacto >     y a la vez dentro del array de Conocido) esta activada
	if (document.f_evaluacion.otra_a_emocional.checked == true) {
	//muestra (cambiando la propiedad display del estilo) el div con id 'desdeotro'
	document.getElementById('contenedor_alteracines_emocionales').style.display='block';
	//por el contrario, si no esta seleccionada
} else {
	//oculta el div con id 'desdeotro'
	document.getElementById('contenedor_alteracines_emocionales').style.display='none';
}
}

//Funcion mostrar otras alteracione sneurologicas
function mostrar_otra_alteraciones_neurologicas() {

	if (document.f_evaluacion.otra_a_neurologica.checked == true) {
	//muestra (cambiando la propiedad display del estilo) el div con id 'desdeotro'
	document.getElementById('contenedor_alteraciones_neurologicas').style.display='block';
	//por el contrario, si no esta seleccionada
} else {
	//oculta el div con id 'desdeotro'
	document.getElementById('contenedor_alteraciones_neurologicas').style.display='none';
}
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

//Funcion seleccionar todos los checkbox
function seleccionar_todo_checkbox(){
	for (i=0;i<document.f_evaluacion.elements.length;i++){
		if(document.f_evaluacion.elements[i].type == "checkbox")
			document.f_evaluacion.elements[i].checked=1;
	}

	//Mostrar los contenedores de otro sintoma y de las 2 alteraciones cuando se activa todas las casillas
	document.getElementById('contenedor_o_sintoma').style.display='block';
	document.getElementById('contenedor_alteracines_emocionales').style.display='block';
	document.getElementById('contenedor_alteraciones_neurologicas').style.display='block';
}

//Funcion desmarcar todos los checkbox
function desmarcar_todo_checkbox() {
	for (i=0;i<document.f_evaluacion.elements.length;i++){
		if(document.f_evaluacion.elements[i].type == "checkbox")
			document.f_evaluacion.elements[i].checked=0;
	}

	//Ocultar los contenedores si antes estaban activos
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
	if (desde == "Rutas" || desde == "Administrador" || desde == "Conductores" || desde == "Evaluadores" || desde == "Vehiculo") {
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

/*Esta es la funcion para impedir el ingreso de caracteris diferentes a numeros en el archivo de ajax llamado mostrar_tiempo_recorrido*/
function justNumbersTime(e) {
	var keynum = window.event ? window.event.keyCode : e.which;
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
 * @param time
 * @return una alerta para avisar
 */
const stop_value_hour_more_24 = (time) =>{
	if (time > 24) {
		alert_dinamic_check_validator("La hora ingresada no puede superar las 24 horas", "rutas.php");
		style_border_input("tiempo_recorrido_hora","rojo");
	}else {
		document.getElementById('registrar_ruta').disabled=false;
		style_border_input("tiempo_recorrido_hora","verde");
	}
}

/**
 * Funcion para validar que en el campo minutos no pase de 60
 *
 * @param none
 * @return Aviso de que el campo minuto no puede ser mayor a 60
 */
const stop_value_minutes_more_60 = () => {
	var valor_minutos = document.getElementById("tiempo_recorrido_minutos").value;

	if (valor_minutos > 60) {
		alert_dinamic_check_validator("Los minutos ingresados no puede superar los 60 minutos.", "rutas.php");
		style_border_input("tiempo_recorrido_minutos","rojo");
	}else {
		document.getElementById('registrar_ruta').disabled=false;
		style_border_input("tiempo_recorrido_minutos","verde");
	}
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

//Horas permitidas para el campo tiempo de sueño en el menu interrogatorio
function horas_permitidas_sueño() {
	traer_hora_sueño = parseInt(document.getElementById("sueño_efectivo_previo").value);
	if(traer_hora_sueño == 0) {
		alert("Tiene que ingresar una hora correcta , por favor vuelva a llenar el campo de Tiempo de sueño");
		window.location="Evaluacion.php";
	}else if(traer_hora_sueño >= 24) {
		alert("La hora ingresada de Tiempo de Sueño no pueden ser igual o superior a 24 Horas");
		window.location="Evaluacion.php";
	}
	return horas_permitidas_dos_campos();
}

//Horas permitidas para el campo tiempo de descanso en el menu interrogatorio
function horas_permitidas_descanso() {
	traer_hora_descanso = parseInt(document.getElementById("tiempo_descanso").value);
	if(traer_hora_descanso == 0) {
		alert("Tiene que ingresar una hora correcta , por favor vuelva a llenar el campo de horas descanso");
		window.location="Evaluacion.php";
	}else if(traer_hora_descanso >= 24) {
		alert("La hora ingresada de Tiempo de Descanso no pueden ser igual o superior a 24 Horas");
		window.location = "Evaluacion.php";
	}
	return horas_permitidas_dos_campos();
}

//esta funcion es la suma del campo de sueño y tiempo de descanso en el menu interrogarotio para hacer la evaluacion de fatiga
function horas_permitidas_dos_campos() {
	var suma_horas_permitidas = traer_hora_sueño + traer_hora_descanso;

	if(suma_horas_permitidas >= 24) {
		alert("La hora ingresada en el campo Tiempo Sueño y tiempo descanso supera las 24 horas que tiene el dia por defecto , pro favor verificar la informacion antes de ingresarla");
		window.location = "Evaluacion.php";
	}
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

//funcion para impedri el ingreso de un valor de unas pulsaciones que son incorrectas asia la Base de datos
function limite_pulsaciones_permitido() {
	//Capturamos el valor de pulsaciones y lo asigamos a la varibale valor_pulsaciones
	var valor_pulsaciones = document.getElementById("pulsaciones").value;

	if(valor_pulsaciones == 0) {
		alert("Las pulsaciones ingresadas no son validas , por favor ingresarlo nuevamente");
		document.getElementById('enviar_evaluacion').disabled=true;
	}else if(valor_pulsaciones >= 150) {
		alert("Las pulsaciones que presenta el conductor superaron el valor del limite con respecto a la edad que tiene , por favor vuelva a tomar el pulso , si es correcto llame al medico inmediatamente o vuelva hacer la medicion para verificar el valor");
		window.location = "Evaluacion.php";
	}else{
		document.getElementById('enviar_evaluacion').disabled=false;
	}
}

//Funcion para poder guardar con Ajax las notas despues de que salga del textarea que lo contiene
function guardar_notas_admin() {
	var traer_Notas_admin = document.getElementById("nota_admin").value

	$("#contenedor_respuesta_nota").load("registro_nota_admin.php",{valor_nota_admin:traer_Notas_admin});
}

/**
 * Funcion para verificar la extension de la imagen cargada
 *
 * @param photo
 * @return un mensaje de error si la extension de la imagen no es permitida
 */
const check_photo = (photo) => {
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
}

//Funcion para verificar el contenido del archivo que se cargo
//Ademas tenemos dos parametros que vienen del formuario cuando se activa el evento que corre esta funcion
function comprueba_extension_pantallazo_fit(formulario , archivo) {
	//Se crea un areglo con las extensiones permitidas
	extensiones_permitidas = new Array(".png", ".jpg", ".jpeg");
	//recupero la extensión de este nombre de archivo
	extension = (archivo.substring(archivo.lastIndexOf("."))).toLowerCase();
	//compruebo si la extensión está entre las permitidas
	permitida = false;

	//Utilizamos un ciclo para recorrer el vector con la extension del archivo cargado si lo encontramos
	//Si se encuentra a la varibal permitidas le damos a un valor de true
	for (var i = 0; i < extensiones_permitidas.length; i++) {
		if (extensiones_permitidas[i] == extension) {
			//Cambiamos el valor de la variable permitido a tru porque encontramos la coincidencia entre extensiones
			permitida = true;
			//Rompemos el ciclo paraque continue con la funcion
			break;
		}
	}

	//Condicional para saber si es diferente la extension del archivo cargado con el vector de extensiones permitidas
	if (!permitida) {
		alert("Comprueba la extensión del archivo a subir. \nSólo se pueden subir el archivo con extension: " + extensiones_permitidas.join());
		//Enviamos un mensaje al contenedor extensiones_permitidas para que muestre un mensaje con html
		$('#extensiones_permitidas').html("<div class='alert alert-danger'> <span class='fa fa-minus-circle fa-2x'></span> <br><label> El archivo cargado no es Valido </label> </div>");
		//Para desactivar el bton de enviar evaluacion cuando el archivo cargado es incorrecto o la extension no es valida
		document.getElementById('enviar_evaluacion').disabled=true;
	}else {
		$('#extensiones_permitidas').html("<div class='alert alert-success'> <span class='fa fa-check-circle fa-2x'></span><br> <label> El archivo Cargado es Correcto </label> </div>");
		//Para habiliatr el boton de enviar evaluacion si esta deshabilitado
		document.getElementById('enviar_evaluacion').disabled=false;
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

//Validar la edad del conductor cuando se esta registrando para que este activo en el sistema
//Recibe el parametro de edad que viene del formulario en conductores.php cuando se envia el evento se envia el valor del parametro
function comprobar_edad_valida_conductor_por_evaluador(edad) {
	if(edad >= 90) {
		alert("La edad que ingreso no es valida , por favor verificarlo para que se puede hacer el proceso correctamente!");
		//Redireccion de la pagina
		window.location = "test.php";
	}

	$("#verificar_edad").load("library/verificar_duplicidad/edad/verificar_edad_conductor.php",{valor_edad:edad});
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

//funcion para verificar la cantidad de digitos del campo telefono
//Ademas se recibe un parametro llamado numero_telefono_conductor que es enviado desde el formulario cuando se activo el evento que ejecuto esta funcion
function validar_telefono_conductor_admin(numero_telefono_conductor) {
	//Sacamos los digitos del numero de telefono con el metodo lenght
	var valor_digitos = numero_telefono_conductor.length;
	//Condicional para verificar que tenga 7 digitos para fijo o 10 para numero celular
	if(valor_digitos == 7 || valor_digitos == 10) {
		$('#verificar_telefono').html("<div class='alert alert-success'> <span class='fa fa-check-circle fa-2x'></span><br> <label> El telefono es Valido </label> </div>");
		//Utilizamos esta variable para decir que el formato del numero ingresado es correcto
		bandera_telefono = 0;
		//Es para ocultar el check de habeas para que lo vuelva a seleccionar y no puede registrarse porque el valor del telefono no es correcto
		document.getElementById('contenedor_habeas_data_conductor').style.display='none';
		//Deshabilitar el check
		document.f_registro.habeas.checked=0 ;
		//Deshabilitar el boton de registrar
		document.getElementById('boton_registrar').disabled=true;
		style_border_input("telefono" , "verde");
		$("#label_habeas").text('Acepto las condiciones de uso');
	}else{
		$('#verificar_telefono').html("<div class='alert alert-danger'><span class='fa fa-minus-circle fa-2x'></span><br> <label> El telefono ingresado es incorrecto </label> </div>");
		//Utilizamos esta variable para decir que el formato del numero de telefono ingresado es incorrecto y debe cambiarse para poder registrase correctamente
		bandera_telefono = 1;
		//Es para ocultar el check de habeas para que lo vuelva a seleccionar y no puede registrarse porque el valor del telefono no es correcto
		document.getElementById('contenedor_habeas_data_conductor').style.display='none';
		//Deshabilitar el check
		document.f_registro.habeas.checked=0 ;
		//Deshabilitar el boton de registrar
		document.getElementById('boton_registrar').disabled=true;
		style_border_input("telefono" , "rojo");
		$("#label_habeas").text('Acepto las condiciones de uso');
	}
}

//funcion para verificar la cantidad de digitos del campo telefono
//Ademas se recibe un parametro llamado numero_telefono_conductor que es enviado desde el formulario cuando se activo el evento que ejecuto esta funcion
function validar_telefono_conductor_actualizacion(numero_telefono_conductor) {
	//Sacamos los digitos del numero de telefono con el metodo lenght
	var valor_digitos = numero_telefono_conductor.length;
	//Condicional para verificar que tenga 7 digitos para fijo o 10 para numero celular
	if(valor_digitos == 7 || valor_digitos == 10) {
		$('#verificar_telefono_conductor').html("<div class='alert alert-success'> <span class='fa fa-check-circle fa-2x'></span><br> <label> El telefono es Valido </label> </div>");
		document.getElementById("a_conductor").disabled = false;
	}else{
		$('#verificar_telefono_conductor').html("<div class='alert alert-danger'><span class='fa fa-minus-circle fa-2x'></span><br> <label> El telefono ingresado es incorrecto </label> </div>");
		document.getElementById("a_conductor").disabled = true;
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

//Funcion para validar que el numero documento del conductor cuando se va a registrar cumpla con la cantidad de digitos correta
//Ademas recibe un parametro llamado numero_documento_conductor que es enviado desde el formulario donde se activo el evento que lanzo la funcion
function validar_digitos_documento_conductor(numero_documento_conductor) {
	//Sacmaos los digitos del parametro numero_documento_evaluador con el metodo length
	var digitos_documento_conductor = numero_documento_conductor.length;

	//Condicional para saber si cumple con el formato comun , 8 son los digitos para las cedulas antiguas, 10 para las nuevas cedulas y 11 para las tarjetas de identidad y 7 para cedulas antiguas
	//las dos comparaciones tiene que ser verdaderas para que se cumpla el condicional y se valla por el lado verdadero
	if(digitos_documento_conductor != 8 && digitos_documento_conductor != 10  && digitos_documento_conductor != 11 && digitos_documento_conductor != 7) {
		alert("El documento Ingresado es incorrecto porque no cumple con el formato adecuado , por favor verificarlo antes de registrar el Conductor al sistema");
		window.location = "Conductores.php";
	}
}

//Funcion para validar que el numero documento del conductor cuando se va a registrar cumpla con la cantidad de digitos correta
//Ademas recibe un parametro llamado numero_documento_conductor que es enviado desde el formulario donde se activo el evento que lanzo la funcion
function validar_digitos_documento_conductor_por_evaluador(numero_documento_conductor) {
	//Sacmaos los digitos del parametro numero_documento_evaluador con el metodo length
	var digitos_documento_conductor = numero_documento_conductor.length;

	//Condicional para saber si cumple con el formato comun , 8 son los digitos para las cedulas antiguas, 10 para las nuevas cedulas y 11 para las tarjetas de identidad y 7 para cedulas antiguas
	//las dos comparaciones tiene que ser verdaderas para que se cumpla el condicional y se valla por el lado verdadero
	if(digitos_documento_conductor != 8 && digitos_documento_conductor != 10  && digitos_documento_conductor != 11 && digitos_documento_conductor != 7) {
		alert("El documento Ingresado es incorrecto porque no cumple con el formato adecuado , por favor verificarlo antes de registrar el Conductor al sistema");
		window.location = "test.php";
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

//funcion para solo recibir fotos con respecto a su extension en el campo file del menu evaluadores cuando se registra
/*Ademas tiene dos parametros que se envian con el evento en el formulario del archivo evaluadores.php en el boton de Actualizar
con el evento onclick de Javascript*/
function check_photo_actualizacion(formulario , archivo) {
	//Se crea un areglo con las extensiones permitidas
	extensiones_permitidas = new Array(".png", ".jpg", ".jpeg");
	//recupero la extensión de este nombre de archivo
	extension = (archivo.substring(archivo.lastIndexOf("."))).toLowerCase();
	//compruebo si la extensión está entre las permitidas
	permitida = false;

	//Utilizamos un ciclo para recorrer el vector con la extension del archivo cargado si lo encontramos
	//Si se encuentra a la varibal permitidas le damos a un valor de true
	for (var i = 0; i < extensiones_permitidas.length; i++) {
		if (extensiones_permitidas[i] == extension) {
			//Cambiamos el valor de la variable permitido a tru porque encontramos la coincidencia entre extensiones
			permitida = true;
			//Rompemos el ciclo paraque continue con la funcion
			break;
		}
	}

	//Condicional para saber si es diferente la extension del archivo cargado con el vector de extensiones permitidas
	if (!permitida) {
		alert("Comprueba la extensión del archivo a subir. \nSólo se pueden subir el archivo con extension: " + extensiones_permitidas.join());
		//Enviamos un mensaje al contenedor extensiones_permitidas para que muestre un mensaje con html
		$('#extensiones_permitidas').html("<div class='alert alert-danger'> <span class='fa fa-minus-circle fa-2x'></span> <br><label> El archivo cargado no es Valido </label> </div>");
		//Bandera foto es para deshabilitar el boton de registrar hasta que coloque una foto con extension valida
		//Como sabemos que el archivo cargado no es valido lo que hacemos es deshabilitar el boton de actualizar hasta que lo corroga y coloque un archivo correcto
		document.getElementById('a_evaluador').disabled = true;
	}else {
		$('#extensiones_permitidas').html("<div class='alert alert-success'> <span class='fa fa-check-circle fa-2x'></span><br> <label> El archivo Cargado es Correcto </label> </div>");
		//Si el boton de actualizar s encuentra deshabilitado porque colocaron un archivo incorrecto y luego colocaron uno valido lo que hacemos es habilitarlo para que pueda actualizar
		document.getElementById('a_evaluador').disabled = false;
	}
}

//funcion para solo recibir fotos con respecto a su extension en el campo file del menu evaluadores cuando se registra
/*Ademas tiene dos parametros que se envian con el evento en el formulario del archivo evaluadores.php en el boton de Actualizar
con el evento onclick de Javascript*/
function comprueba_extension_foto_conductor_actualizacion(formulario , archivo) {
	//Se crea un areglo con las extensiones permitidas
	extensiones_permitidas = new Array(".png", ".jpg", ".jpeg");
	//recupero la extensión de este nombre de archivo
	extension = (archivo.substring(archivo.lastIndexOf("."))).toLowerCase();
	//compruebo si la extensión está entre las permitidas
	permitida = false;

	//Utilizamos un ciclo para recorrer el vector con la extension del archivo cargado si lo encontramos
	//Si se encuentra a la varibal permitidas le damos a un valor de true
	for (var i = 0; i < extensiones_permitidas.length; i++) {
		if (extensiones_permitidas[i] == extension) {
			//Cambiamos el valor de la variable permitido a tru porque encontramos la coincidencia entre extensiones
			permitida = true;
			//Rompemos el ciclo paraque continue con la funcion
			break;
		}
	}

	//Condicional para saber si es diferente la extension del archivo cargado con el vector de extensiones permitidas
	if (!permitida) {
		alert("Comprueba la extensión del archivo a subir. \nSólo se pueden subir el archivo con extension: " + extensiones_permitidas.join());
		//Enviamos un mensaje al contenedor extensiones_permitidas para que muestre un mensaje con html
		$('#extensiones_permitidas').html("<div class='alert alert-danger'> <span class='fa fa-minus-circle fa-2x'></span> <br><label> El archivo cargado no es Valido </label> </div>");
		//Bandera foto es para deshabilitar el boton de registrar hasta que coloque una foto con extension valida
		//Como sabemos que el archivo cargado no es valido lo que hacemos es deshabilitar el boton de actualizar hasta que lo corroga y coloque un archivo correcto
		document.getElementById('a_conductor').disabled = true;
	}else {
		$('#extensiones_permitidas').html("<div class='alert alert-success'> <span class='fa fa-check-circle fa-2x'></span><br> <label> El archivo Cargado es Correcto </label> </div>");
		//Si el boton de actualizar s encuentra deshabilitado porque colocaron un archivo incorrecto y luego colocaron uno valido lo que hacemos es habilitarlo para que pueda actualizar
		document.getElementById('a_conductor').disabled = false;
	}
}

//Funcion para verificar en la opcion de actualizar en el menu del evaluador el telefono que tenga los digitos correctos
function check_number_phone_actualizacion(numero_telefono) {
	//Sacamos los digitos del numero de telefono con el metodo lenght
	var valor_digitos = numero_telefono.length;
	console.log("los digitos del numero cargado es = "+valor_digitos);
	//Condicional para verificar que tenga 7 digitos para fijo o 10 para numero celular
	if(valor_digitos == 7 || valor_digitos == 10) {
		$('#contenedor_validador_telefono').html("<div class='alert alert-success'> <span class='fa fa-check-circle fa-2x'></span><br> <label> El telefono es Valido </label> </div>");
		document.getElementById("a_evaluador").disabled = false;
	}else{
		$('#contenedor_validador_telefono').html("<div class='alert alert-danger'><span class='fa fa-minus-circle fa-2x'></span><br> <label> El telefono ingresado es incorrecto </label> </div>");
		document.getElementById("a_evaluador").disabled = true;
	}
}

//Funcion para poder mostrar el formulario de activacion del administrador cuando hay un administrador inactivo
function mostrar_observaciones_activacion_administrador(nombre_completo,id_dato) {
	//Buscamos el contenedor_activacion donde va aparecer el formulario creado desde js que se envia a Html
	var div = document.getElementById("contenedor_activacion_administrador");
	//Como esta compuesto el formulario de activacion
	div.innerHTML = "<form action='activar_administrador.php' class='border_outside' method='post' id='content_form_actived_admin'> <center> <h3>Activacion de <strong>"+nombre_completo+"</strong></h3> <br> <input type='text' name='id_dato' value="+id_dato+" hidden> <textarea name='observaciones_activacion' placeholder='Ingresar las Observaciones de Activacion' cols='50' rows='5' onkeypress='return onlyWords(event)' required></textarea><br> <button type='submit' class='btn btn-success glyphicon glyphicon-saved'> Activar</button> </center> </form>";
	document.getElementById('ocultar_form_activacion_administrador').style.display='block';
	document.getElementById('all_download_actived_log').style.display='none';
}

//Funcion para verificar en la opcion de actualizar foto solo ingreso archivos validos y no otra cosa diferente
//Se recibe dos parametros que son formulario , archivo que son enviados cuando la funcion se activa desde el formulario de html
function comprueba_extension_foto_administrador_actualizacion(formulario , archivo) {
	//Se crea un areglo con las extensiones permitidas
	extensiones_permitidas = new Array(".png", ".jpg", ".jpeg");
	//recupero la extensión de este nombre de archivo
	extension = (archivo.substring(archivo.lastIndexOf("."))).toLowerCase();
	//compruebo si la extensión está entre las permitidas
	permitida = false;

	//Utilizamos un ciclo para recorrer el vector con la extension del archivo cargado si lo encontramos
	//Si se encuentra a la varibal permitidas le damos a un valor de true
	for (var i = 0; i < extensiones_permitidas.length; i++) {
		if (extensiones_permitidas[i] == extension) {
			//Cambiamos el valor de la variable permitido a tru porque encontramos la coincidencia entre extensiones
			permitida = true;
			//Rompemos el ciclo paraque continue con la funcion
			break;
		}
	}

	//Condicional para saber si es diferente la extension del archivo cargado con el vector de extensiones permitidas
	if (!permitida) {
		alert("Comprueba la extensión del archivo a subir. \nSólo se pueden subir el archivo con extension: " + extensiones_permitidas.join());
		//Enviamos un mensaje al contenedor extensiones_permitidas para que muestre un mensaje con html
		$('#extensiones_permitidas_administrador').html("<div class='alert alert-danger'> <span class='fa fa-minus-circle fa-2x'></span> <br><label> El archivo cargado no es Valido </label> </div>");
		//Bandera foto es para deshabilitar el boton de registrar hasta que coloque una foto con extension valida
		//Como sabemos que el archivo cargado no es valido lo que hacemos es deshabilitar el boton de actualizar hasta que lo corroga y coloque un archivo correcto
		document.getElementById('a_administrador').disabled = true;
	}else {
		$('#extensiones_permitidas_administrador').html("<div class='alert alert-success'> <span class='fa fa-check-circle fa-2x'></span><br> <label> El archivo Cargado es Correcto </label> </div>");
		//Si el boton de actualizar s encuentra deshabilitado porque colocaron un archivo incorrecto y luego colocaron uno valido lo que hacemos es habilitarlo para que pueda actualizar
		document.getElementById('a_administrador').disabled = false;
	}
}

//funcion para verificar los digitos del documento si se actualiza
function validar_digitos_documento_administrador(numero_documento_administrador) {
	//Sacmaos los digitos del parametro numero_documento_evaluador con el metodo length
	var digitos_documento_administrador = numero_documento_administrador.length;

	//Condicional para saber si cumple con el formato comun , 8 son los digitos para las cedulas antiguas, 10 para las nuevas cedulas y 11 para las tarjetas de identidad y 7 para cedulas antiguas
	//las dos comparaciones tiene que ser verdaderas para que se cumpla el condicional y se valla por el lado verdadero
	if(digitos_documento_administrador != 8 && digitos_documento_administrador != 10  && digitos_documento_administrador != 11 && digitos_documento_administrador != 7) {
		alert("El documento Ingresado es incorrecto porque no cumple con el formato adecuado , por favor verificarlo antes de Actualizar el Administrador al sistema");
		window.location = "administrador.php";
	}
}

function validar_telefono_administrador_actualizacion(numero_telefono_administrador) {
	//Sacamos los digitos del numero de telefono con el metodo lenght
	var valor_digitos = numero_telefono_administrador.length;
	//Condicional para verificar que tenga 7 digitos para fijo o 10 para numero celular
	if(valor_digitos == 7 || valor_digitos == 10) {
		$('#verificar_telefono_administrador').html("<div class='alert alert-success'> <span class='fa fa-check-circle fa-2x'></span><br> <label> El telefono es Valido </label> </div>");
		document.getElementById("a_administrador").disabled = false;
	}else{
		$('#verificar_telefono_administrador').html("<div class='alert alert-danger'><span class='fa fa-minus-circle fa-2x'></span><br> <label> El telefono ingresado es incorrecto </label> </div>");
		document.getElementById("a_administrador").disabled = true;
	}
}

/*Funcion para saber la cantidad de digitos que tiene el campo documento en el rol evaluador cuando se va ha editar la informacion del conductor
ademas recibe un parametro llamado numero_documento_evaluador que viene del formulario de actualizar la informacion del conductor*/
function validar_digitos_documento_rol_evaluador(numero_documento_evaluador) {
	//Sacmaos los digitos del parametro numero_documento_evaluador con el metodo length
	var digit_document = numero_documento_evaluador.length;

	//Condicional para saber si cumple con el formato comun , 8 son los digitos para las cedulas antiguas, 10para las nuevas cedulas y 11 para las tarjetas de identidad
	//las dos comparaciones tiene que ser verdaderas para que se cumpla el condicional y se valla por el lado verdadero
	if(digit_document != 8 && digit_document != 10  && digit_document != 11 && digit_document != 7) {
		alert("El documento Ingresado es incorrecto porque no cumple con el formato adecuado , por favor verificarlo antes de hacer su proceso");
		window.location = "test.php";
	}
}

//Funcion para saber si la edad ingresada cuando se actualiza la info del conductr por parte del evaluador sea coherente
//Ademas que recibe un parametro llamado edad que viene el formulario cuando se actaliza el conductor
function comprobar_edad_valida_rol_evaluador(edad) {
	if(edad >= 90) {
		alert("La edad que ingreso no es valida , por favor verificarlo antes de hacer su proceso!");
		window.location = "test.php";
	}
}

//Funcion para verificar los digitos del telefono cuando se actualiza la info del conductor por parte del evaluador
//Ademas tenemos un parametro llamdo numero_telefono que viene del formulario de actualizacion
function validar_telefono_rol_evaluador(numero_telefono) {
	//Sacamos los digitos del numero de telefono con el metodo lenght
	var valor_digitos = numero_telefono.length;
	//Condicional para verificar que tenga 7 digitos para fijo o 10 para numero celular
	if(valor_digitos == 7 || valor_digitos == 10) {
		$('#verificar_telefono').html("<div class='alert alert-success'> <span class='fa fa-check-circle fa-2x'></span><br> <label> El telefono es Valido </label> </div>");
		document.getElementById('actualizar_conductor').disabled=false;
	}else{
		$('#verificar_telefono').html("<div class='alert alert-danger'><span class='fa fa-minus-circle fa-2x'></span><br> <label> El telefono ingresado es incorrecto </label> </div>");
		document.getElementById('actualizar_conductor').disabled=true;
	}
}

//Funcion que me permite verificar la extension del archivo cuando se carga si es valido o no
//Ademas de recibir 2 parametros que se envian cuando la funcion se activa
function comprueba_extension_foto_rol_evaluador(formulario , archivo) {
	//Se crea un areglo con las extensiones permitidas
	extensiones_permitidas = new Array(".png", ".jpg", ".jpeg");
	//recupero la extensión de este nombre de archivo
	extension = (archivo.substring(archivo.lastIndexOf("."))).toLowerCase();
	//compruebo si la extensión está entre las permitidas
	permitida = false;

	//Utilizamos un ciclo para recorrer el vector con la extension del archivo cargado si lo encontramos
	//Si se encuentra a la varibal permitidas le damos a un valor de true
	for (var i = 0; i < extensiones_permitidas.length; i++) {
		if (extensiones_permitidas[i] == extension) {
			//Cambiamos el valor de la variable permitido a tru porque encontramos la coincidencia entre extensiones
			permitida = true;
			//Rompemos el ciclo paraque continue con la funcion
			break;
		}
	}

	//Condicional para saber si es diferente la extension del archivo cargado con el vector de extensiones permitidas
	if (!permitida) {
		alert("Comprueba la extensión del archivo a subir. \nSólo se pueden subir el archivo con extension: " + extensiones_permitidas.join());
		//Enviamos un mensaje al contenedor extensiones_permitidas para que muestre un mensaje con html
		$('#extensiones_permitidas_evaluador').html("<div class='alert alert-danger'> <span class='fa fa-minus-circle fa-2x'></span> <br><label> El archivo cargado no es Valido </label> </div>");
		//Deshabilitamos en boton cuando la extension no es correcta
		document.getElementById('actualizar_conductor').disabled=true;
	}else {
		$('#extensiones_permitidas_evaluador').html("<div class='alert alert-success'> <span class='fa fa-check-circle fa-2x'></span><br> <label> El archivo Cargado es Correcto </label> </div>");
		//Habilitamos el boton cuando la extension es correcta
		document.getElementById('actualizar_conductor').disabled=false;
	}
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
	switch(id_input)
	{
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


function validar_correo_evaluador_editar(valor_correo) {
	if (/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(valor_correo)){
		$('#contenedor_validar_correo_evaluador_editar').html("<div class='alert alert-success'> <span class='fa fa-check-circle fa-2x'></span><br> <label> El formato del correo ingresado es Valido </label> </div>");
		document.getElementById('actualizar_conductor').disabled=false;
	}else {
		$('#contenedor_validar_correo_evaluador_editar').html("<div class='alert alert-danger'> <span class='fa fa-minus-circle fa-2x'></span> <br><label> La dirección de email es incorrecta!. </label> </div>");
		document.getElementById('actualizar_conductor').disabled=true;
	}
}

//Funcion para colocar el validador del correo en la opcion de ediatr del evaluador , para que solo permita correos validos
//Ademas recibe un parametro que es valor_correo que viene cuando se activa el evento que lanza la funcion
function validar_correo_actualizar(valor_correo) {
	//Condicional que mira si el correo ingresado cumple con la expresion regular de la parte de abajo
	if (/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(valor_correo)){
		console.log("Hemos entrado en la opcion Verdadera");
		//Mostramos en el contenedor contenedor_validar_correo la informacion cuando el correo ingresado es incorrecto
		$('#contenedor_validar_correo').html("<div class='alert alert-success'> <span class='fa fa-check-circle fa-2x'></span><br> <label> El formato del correo ingresado es Valido </label> </div>");
		document.getElementById('a_evaluador').disabled=false;
	}else {
		//Mostramos en el contenedor contenedor_validar_correo la informacion cuando es correcto el correo ingresado
		$('#contenedor_validar_correo').html("<div class='alert alert-danger'> <span class='fa fa-minus-circle fa-2x'></span> <br><label> La dirección de email es incorrecta!. </label> </div>");
		document.getElementById('a_evaluador').disabled=true;
	}
}

//Funcion para validar el correo que ingresan cuando se actualiza un registro en el menu conductores , ademas que recibe un parametro que se envia desde el furmulario
function validar_correo_conductor_actualizar(valor_correo_conductor_actualizar) {
	//Condicional que mira si el correo ingresado cumple con la expresion regular de la parte de abajo
	if (/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(valor_correo_conductor_actualizar)){
		$('#contenedor_correo_actualizar').html("<div class='alert alert-success'> <span class='fa fa-check-circle fa-2x'></span><br> <label> El formato del correo ingresado es Valido </label> </div>");
		document.getElementById('a_conductor').disabled=false;
	}else {
		$('#contenedor_correo_actualizar').html("<div class='alert alert-danger'> <span class='fa fa-minus-circle fa-2x'></span> <br><label> La dirección de email es incorrecta!. </label> </div>");
		document.getElementById('a_conductor').disabled=true;
	}
}

//Funcion para evitar que la pagina quede abierta
function redireccionarPagina() {
	window.location = "Log.php";
}

/*Esta funcion mide el tiempo en milisegundos , es decir , 1 segundo es 1000 milisegundos
Para nuestro caso 10 minutos son 600.000 milisegundoslo redireccionara al inicio de la plataforma
La funcion se coloco como maximo en una sola pagina de 20 minutos que en milisgundos seria 1'200.000 milisegundos
*/
setTimeout("redireccionarPagina()", 1200000);

/**
 * Funcion para verificar el nombre completo de alguien en la bd en la opcion registro
 *
 * @param nombre,apellido,menu_origen,opcion
 * @return
 */
const check_full_name = (nombre = null, apellido = null,menu_origen , opcion) =>{
	$("#container_check_full_name").load("library/verificar_duplicidad/verificar_nombre_completo.php",{valor_nombre:nombre,valor_apellido:apellido,valor_menu:menu_origen,valor_opcion:opcion});
}

/*funcion para validar el valor ingresado en horas y minutos del rol admin modulo rutas opcion editar*/
function validar_digitos_tiempo_recorrido(desde,valor_hora,valor_minuto) {
	if (desde == 'campo_hora') {
		if (valor_hora > 24) {
			alert('El valor de la hora ingresado es incorrecto porque supera las 24 horas del dia.');
			window.location = "rutas.php";
		}
	}else {
		if (valor_minuto > 60) {
			alert('El valor de los Minutos ingresado es incorrecto porque supera los 60 Minutos.');
			window.location = "rutas.php";
		}
	}
}

/*funcion en el rol admin , modulo rutas , opcion editar campo tiempo recorrido para seleccionar si horas o minutos*/
function enabled_disabled_check(desde) {
	if (desde == 'campo_hora') {
		var clase_tiempo_hora = $("#tiempo_hora").attr('class');
		if (clase_tiempo_hora == "form-control checked_hora") {
			document.getElementById('tiempo_hora').disabled=false;
			$("#tiempo_hora").removeClass('checked_hora');
			$("#tiempo_hora").attr('value','');
			$("#texto_adicional_tiempo_hora").text('Activar');
			return impedir_sin_valores_tiempo_recorrido();
		}else {
			document.getElementById('tiempo_hora').disabled=true;
			$("#tiempo_hora").addClass('checked_hora');
			$("#tiempo_hora").attr('value','0');
			$("#texto_adicional_tiempo_hora").text('Desactivar');
			return impedir_sin_valores_tiempo_recorrido();
		}
	}else {
		var clases_tiempo_minuto = $("#tiempo_minuto").attr('class');
		if (clases_tiempo_minuto == "form-control checked_hora") {
			document.getElementById('tiempo_minuto').disabled=false;
			$("#tiempo_minuto").removeClass('checked_hora');
			$("#tiempo_minuto").attr('value','');
			$("#texto_adicional_tiempo_minuto").text('Activar');
			return impedir_sin_valores_tiempo_recorrido();
		}else {
			document.getElementById('tiempo_minuto').disabled=true;
			$("#tiempo_minuto").addClass('checked_hora');
			$("#tiempo_minuto").attr('value','0');
			$("#texto_adicional_tiempo_minuto").text('Desactivar');
			return impedir_sin_valores_tiempo_recorrido();
		}
	}
}

function impedir_sin_valores_tiempo_recorrido() {
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
	console.log("Hemos entrado a la funcion!!!!");
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

//Esta funcion es para activar el boton de envio siempre y cuando las el formulario no se envie vacio a la bd
/*function verificar_estado(boton) {
	//Capturar los valores en el menu interrogarotio y haciendo asignaciones para hacer los condicionales
	var id_ruta = document.getElementById('ruta').value;
	var hora_descanso = document.getElementById('hora_descanso').value;
	var conduciendo = document.getElementById('hora_conduciendo').value;
	var sueño_efectivo = document.getElementById('sueño_efectivo_previo').value;
	var tiempo_descanso = document.getElementById('tiempo_descanso').value;
	var sueño_profundo_manilla = document.getElementById('sueño_profundo').value;

	//Comparaciones de cada opcion de todos los menus
	if(id_ruta != 0) {
		if(hora_descanso != 0) {
			if(conduciendo != 0) {
				if(sueño_efectivo != ""){
					if(tiempo_descanso != "") {
						boton.disabled=false;
						if(sueño_profundo_manilla != "") {
							//Aqui no esta cogiendo este menu porque  la variable se encuentra indefinida
							boton.disabled=false;
						}else{
							boton.disabled=true;
						}
					}else{
						boton.disabled=true;
					}
				}else {
					boton.disabled=true;
				}
			}else{
				boton.disabled=true;
			}
		}else{
			boton.disabled=true;
		}
	}else{
		boton.disabled=true;
	}
}*/

//Codigo Que falta por Procesar

//Cuando es un checkkbox para el progress bar
	/*$('input').on('click', function(){
		var valeur = 0;
		$('input:checked').each(function(){
			if ( $(this).attr('id') > valeur ){
				valeur =  $(this).attr('id');
			}else if( $(this).attr('value') > valeur ) {
				valeur =  $(this).attr('value');
			}
		});
		$('.progress-bar').css('width', valeur+'%').attr('aria-valuenow', valeur);
	});

	//Cuando se selecciona una lista desplejable para llenar el progress bar
	$('select').on('click', function(){
		var valeur = 0;
		//Cuando es una lista desplejable
		$('select').each(function(){
			if ( $(this).attr('value') > valeur ){
				valeur =  $(this).attr('value');
			}
		});
		$('.progress-bar').css('width', valeur+'%').attr('aria-valuenow', valeur);
	});*/


/*function verificar_estado(campo , boton) {
	if (campo.value != "" ){
		boton.disabled=false;
	} else {
		boton.disabled=true;
	}
}*/