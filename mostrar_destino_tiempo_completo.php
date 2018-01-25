<?php
	/*En este bloque de cofigo que esta a continuacion lo que vamos hacer es poder llenar la cadena h
	que viene de la base de datos por la cadena horas y los mismo con min y que aparezca minutos
	para que se amas entendible por el usuario que vea la informacion*/

	//Si se encuentra vacio quiere decir que cuando se registro la ruta se fue con un espcio al inicio de la cadena
	if ($vector_tiempo[0] == "") {
		$unir_cadena_hora = $vector_tiempo[1] . " Horas";
		$unir_cadena_minuto = $vector_tiempo[3] . " Minutos";
		$tiempo_a_enviar =  $unir_cadena_hora ." ". $unir_cadena_minuto;
	}else {
		$unir_cadena_hora = $vector_tiempo[0] . " Horas";
		$unir_cadena_minuto = $vector_tiempo[2] . " Minutos";
		$tiempo_a_enviar =  $unir_cadena_hora ." ". $unir_cadena_minuto;
	}
?>