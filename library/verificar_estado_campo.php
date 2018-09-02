<?php
	/*
		Este archivo se creeo para notificarle al usuario cuando no se ha ingresado algo en los campos que
		mencionamos en la parte de abajo ,anteriormente aparecia en blanco y eso generaba confusion al usuario
	*/
	//Este condicional es para cuando no ingresan ningun Sintoma cuando se hizo la evaluacion
	if($registro["ids_sintomas"] == 0) {
		$valor_total_sintomas = "No se ingreso Ningun Sintoma";
	}else {
		$valor_total_sintomas = "lleno";
	}

	//Condicional para saber si han ingresado otro sintoma
	if($registro["cual_otro_sintoma"] == "" || $registro["cual_otro_sintoma"] == "<br>") {
		$otro_sintoma = "No se ingreso otro Sintoma";
	}else {
		$otro_sintoma = "lleno";
	}

	//Condicional para saber si han ingresado Alteraciones Emocionales
	if ($registro["ids_a_emocional"] == 0) {
		$valor_total_emocional = "No se ha ingresado Ninguna Alteracion Emocional";
	}else {
		$valor_total_emocional = "lleno";
	}

	//condicional para saber si han ingresado otra alteracion emocional
	if ($registro["cual_otro_emocional"] == "" || $registro["cual_otro_emocional"] == "<br>") {
		$otra_emocional = "No se ingreso Otra alteracion Emocional";
	}else {
		$otra_emocional = "lleno";
	}

	//Condicional para saber si hay tiempo en la opcion de cmaarote
	if ($registro["horas_camarote"] == 0) {
		$camarote = "El destino no necesitaba la opcion de Camarote";
	}else {
		$camarote = $registro["horas_camarote"]." Horas";
	}

	//Condicional para saber si ha llenado las horas de otra actividad
	if ($registro["horas_otra_actividad"] == 0) {
		$otra_actividad = "No hay informacion de otra Actividad";
	}else {
		$otra_actividad = $registro["horas_otra_actividad"]." Horas";
	}

	//Condicional para saber si hay otras actividades hechas por el usuario
	if ($registro["cual_actividad"] == "") {
		$cual_actividad = "No tenemos otras actividades hechas por el conductor";
	}else {
		$cual_actividad = $registro["cual_actividad"];
	}

	//condiconal para saber si hay informacion del copiloto
	if ($registro["info_copiloto"] == "") {
		$info_copiloto = "No hay Copiloto en ese viaje";
	}else {
		$info_copiloto = $registro["info_copiloto"];
	}

	//condiconal para saber si hay origen copiloto
	if ($registro["origen_copiloto"] == "") {
		$origen_copiloto = "No hay copiloto en el viaje";
	}else {
		$origen_copiloto = $registro["origen_copiloto"];
	}

	//Condicional para saber si ingresan pulso del conductor
	if ($registro["pulsaciones_conductor"] == "") {
		$valor_pulsaciones = "No se ingreso el pulso del conductor";
	}else {
		$valor_pulsaciones = $registro["pulsaciones_conductor"]." Pulsaciones/Minuto";
	}

?>