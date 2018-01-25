<?php
	//Se saca el tiempo de recorrido de la ruta
	$tiempo_recorrido = $registro["Tiempo_Recorrido"];
	//Se saca solo en entero para saber que valor tiene en la hora
	$sacar_entero_hora = explode("h",$tiempo_recorrido);

	//en la primera posicion encontramos el enter de la hora , si es igual a cero significa que no tiene hora sino solamente minutos
	if ($sacar_entero_hora[0] == 0) {
		//Asignamos a la variable mostrar_tiempo_recorrido lo que tiene el arreglo en la posicion 2 que en este caso es la otra parte del tiempo de recorrido
		$mostrar_tiempo_recorrido = $sacar_entero_hora[1];
	//Si no es cero significa que tiene un valor en horas y se deja igual como esta
	}else {
		$mostrar_tiempo_recorrido = $tiempo_recorrido;
	}
?>