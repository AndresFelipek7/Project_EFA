<?php
	//Sacamos el valor del tiempo de recorrido con los numeros enteros y las cadenas de indicacion que son la h y el min
	$tiempo_recorrido = $registro["Tiempo_Recorrido"];
	//Rompemos la cadena por un espacio
	$sacar_tiempo_sin_cadena = explode(" ",$tiempo_recorrido);

	//Si el primer campo es vacio significa que el primer caracter es un espacio , este espacio se produce cuando se hace una insercion masiva desde la bd directamente
	if ($sacar_tiempo_sin_cadena[0] == "") {
		//Si lo que se caturo esta en el rango de 4 y 5 con el primer espacio se debe sacar el entero de la hora y los minutos en 0 porque no existe
		if (strlen($registro["Tiempo_Recorrido"]) >= 4 && strlen($registro["Tiempo_Recorrido"]) <= 5) {
			$solo_entero_hora_tiempo_recorrido = explode("h",$registro["Tiempo_Recorrido"]);
			$solo_entero_hora_tiempo_recorrido_sin_espacio = trim($solo_entero_hora_tiempo_recorrido[0]);
			$solo_entero_minutos_tiempo_recorrido = "0";
			$solo_entero_minuto_tiempo_recorrido_sin_espacio = trim($solo_entero_minutos_tiempo_recorrido[0]);
		//Si esta en el rango partimos los minutos para sacar el entero y las horas en 0 porque no existe
		}else if (strlen($registro["Tiempo_Recorrido"]) >= 6 && strlen($registro["Tiempo_Recorrido"]) <= 7) {
			$solo_entero_hora_tiempo_recorrido = "0";
			$solo_entero_hora_tiempo_recorrido_sin_espacio = trim($solo_entero_hora_tiempo_recorrido[0]);
			$solo_entero_minutos_tiempo_recorrido = explode("min",$registro["Tiempo_Recorrido"]);
			$solo_entero_minuto_tiempo_recorrido_sin_espacio = trim($solo_entero_minutos_tiempo_recorrido[0]);
		//Si es esta opcion significa que debe de tener las 2 horas y minutos , se debe partir las dos
		}else {
			/*Poder partir las horas y los minutos del tiempo de recorrido para poder ingresarlos en los input correspondientes*/
			$solo_entero_hora_tiempo_recorrido = explode("h",$registro["Tiempo_Recorrido"]);
			$solo_entero_hora_tiempo_recorrido_sin_espacio = trim($solo_entero_hora_tiempo_recorrido[0]);
			$solo_entero_minutos_tiempo_recorrido = explode("min",$solo_entero_hora_tiempo_recorrido[1]);
			$solo_entero_minuto_tiempo_recorrido_sin_espacio = trim($solo_entero_minutos_tiempo_recorrido[0]);
		}
	}else {
		/*Con la funcion strlen lo que hacemos es contar los caracteres que tiene incluyenlo el espacio en blanco*/
		//Cuando hay horas y minutos
		if (strlen($registro["Tiempo_Recorrido"]) >= 10 && strlen($registro["Tiempo_Recorrido"]) <= 11) {
			/*Poder partir las horas y los minutos del tiempo de recorrido para poder ingresarlos en los input correspondientes*/
			$solo_entero_hora_tiempo_recorrido = explode("h",$registro["Tiempo_Recorrido"]);
			$solo_entero_hora_tiempo_recorrido_sin_espacio = trim($solo_entero_hora_tiempo_recorrido[0]);
			$solo_entero_minutos_tiempo_recorrido = explode("min",$solo_entero_hora_tiempo_recorrido[1]);
			$solo_entero_minuto_tiempo_recorrido_sin_espacio = trim($solo_entero_minutos_tiempo_recorrido[0]);
		//Cuando hay solo horas
		}else if(strlen($registro["Tiempo_Recorrido"]) >= 3 && strlen($registro["Tiempo_Recorrido"]) <= 4){
			$solo_entero_hora_tiempo_recorrido = explode("h",$registro["Tiempo_Recorrido"]);
			$solo_entero_hora_tiempo_recorrido_sin_espacio = trim($solo_entero_hora_tiempo_recorrido[0]);
			$solo_entero_minutos_tiempo_recorrido = "0";
			$solo_entero_minuto_tiempo_recorrido_sin_espacio = trim($solo_entero_minutos_tiempo_recorrido[0]);
		//Cuando hay solo minutos
		}else {
			$solo_entero_hora_tiempo_recorrido = "0";
			$solo_entero_hora_tiempo_recorrido_sin_espacio = trim($solo_entero_hora_tiempo_recorrido[0]);
			$solo_entero_minutos_tiempo_recorrido = explode("min",$registro["Tiempo_Recorrido"]);
			$solo_entero_minuto_tiempo_recorrido_sin_espacio = trim($solo_entero_minutos_tiempo_recorrido[0]);
		}
	}
?>