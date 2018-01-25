<?php
	/*Esto se hace porque hay una diferencia mayor de 5 horas cuando se hace una descarga del archivo en cuestion
	es por eso que se debe hacer un proceso antes para que salga el pdf con la hora exacta en que se descargo*/
	//Iniciamos sesion
	session_start();
	//Sacamos fecha actual
	$fecha = date("d-m-Y");
	//Sacamos la hora con la diferencia de 5 horas de mas por la funcion date
	$hora_funcion_date = date("H:i:s");
	//Lo dividimos con la funcion explode
	$sacar_hora = explode(":", $hora_funcion_date);
	//restamos la diferencia
	$hora_actual = $sacar_hora[0] - 5;
	//Si es mayor a 12 significa que debemos cambiar la hora por hora ordinario y no militar para que se entienda mejor
	if ($hora_actual > 12) {
		$hora_actual = $hora_actual - 12;
		$Hora = $hora_actual . ":" . $sacar_hora[1]." PM";
	}else {
		$Hora = $hora_actual . ":" . $sacar_hora[1]." AM";
	}


	$realizado_por = $_SESSION['name_user'];
?>