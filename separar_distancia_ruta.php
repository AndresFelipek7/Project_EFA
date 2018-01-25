<?php
	//Traemos el valor de distancia
	$distancia = $registro["distancia_km"];
	//sacamos solo la parte entera
	$partir_distancia = explode(" ",$distancia);

	//Si en la priemra posicion es igual a vacio significa que el primer caracter de la cedena es un espacio
	if ($partir_distancia[0] == "") {
		//Tomamos la segunda posicion del vector que tiene el numero entero
		$solo_numeros_distancia = $partir_distancia[1];
	}else{
		//Tomamos la primera posicion del vector que tiene el numero
		$solo_numeros_distancia = $partir_distancia[0];
	}
?>