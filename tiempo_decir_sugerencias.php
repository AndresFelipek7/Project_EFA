<?php
	include "methods_backend.php";

	//Sacamos el tiempo final cuando envia la evaluacion en minutos y segundos por parte de la funcion date en php
	$_SESSION['tiempo_final'] = date("i:s");
	$tiempo_inicio_sugerencia = $_GET["t"];
	$nivel_fatiga = $_GET["nf"];
	$tiempo_final_sugerencia = $_SESSION["tiempo_final"];

	//Sacamos solo los minutos de los tiempos con la funcion explode de cada tiempo para operar
	$sacar_minutos_tiempo_inicio = explode(":" , $tiempo_inicio_sugerencia);
	$sacar_minutos_tiempo_final = explode(":" , $tiempo_final_sugerencia);

	//Sacamos el tiempo que se demoro mencionando las sugerencias al conductor
	$diferencia_tiempos = $sacar_minutos_tiempo_final[0] - $sacar_minutos_tiempo_inicio[0];

	//Si son iguales significa que cuando llego a al zona de sugerencias solo se demoro segundos es decirle todo al conductor
	//El vector en la posicion cero es el primer valor del vector , es decir solo los minutos
	if ($sacar_minutos_tiempo_inicio[0] == $sacar_minutos_tiempo_final[0]) {
		alert_time_report("Se ha demorado solo segundo al decirle al conductor las recomendaciones para bajar el nivel de faitga , se manejara de forma interna por los administradores");
	}

	if ($nivel_fatiga == 1) {
		//este es el rango en minutos que debe demorarse el evaluador en decir las recomendaciones
		($diferencia_tiempos >= 1 && $diferencia_tiempos <= 2) ? alert_time_report("Se ha demorado el tiempo estimado en decir las recomendaciones al conductor por el nivel de fatiga Bajo , la probabilidad de fraude es poca") : alert_time_report("Se ha demorado muy poco con respecto al nivel de fatiga bajo , Hay que revisar el tiempo");
	}

	if ($nivel_fatiga == 2) {
		($diferencia_tiempos >= 4 && $diferencia_tiempos <= 7) ? alert_time_report("Se ha demorado el tiempo estimado en decir las recomendaciones al conductor por el nivel de fatiga Medio , la probabilidad de fraude es poca") : alert_time_report("Se ha demorado muy poco en decir las recomendaciones al conductor por tener nivel de fatiga Medio");
	}

	if ($nivel_fatiga == 3) {
		($diferencia_tiempos >= 9 && $diferencia_tiempos <= 15) ? alert_time_report("Se ha demorado el tiempo estimado en decir las recomendaciones al conductor por el nivel de fatiga Alto , la probabilidad de fraude es poca") : alert_time_report("Se ha demorado muy poco en decir las recomendaciones al conductor por presentar nivel de fatiga Alto");
	}

	if ($diferencia_tiempos >= 17) {
			alert_time_report("El Evaluador se ha demorado demasiado tiempo en decir las recomendaciones , es probable que se este haciendo de foam incorrecta , Hay que tomar medidas de forma interna");
	}
?>