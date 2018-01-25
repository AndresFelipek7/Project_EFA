<?php
	//Sacamos el tiempo final cuando envia la evaluacion en minutos y segundos por parte de la funcion date en php
	$_SESSION['tiempo_final'] = date("i:s");
	//Sacamos el tiempo de inicio y el tiempo final despues de que ha dicho las sugerencias para bajar el nivel de fatiga
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
		echo "<script>
				alert('Se ha demorado solo segundo al decirle al conductor las recomendaciones para bajar el nivel de faitga , se manejara de forma interna por los administradores');
				window.location = 'test.php';
			</script>";
	}
	
	//si el nivel de fatiga es 1 significa que es nivel bajo de fatiga
	if ($nivel_fatiga == 1) {
		//este es el rango en minutos que debe demorarse el evaluador en decir las recomendaciones
		if ($diferencia_tiempos >= 1 && $diferencia_tiempos <= 2) {
			echo "<script>
				alert('Se ha demorado el tiempo estimado en decir las recomendaciones al conductor por el nivel de fatiga Bajo , la probabilidad de fraude es poca');
				window.location = 'test.php';
			</script>";
		}else {
			echo "<script>
				alert('Se ha demorado muy poco con respecto al nivel de fatiga bajo , Hay que revisar el tiempo');
				window.location = 'test.php';
			</script>";
		}
	}
	
	//si es valor 2 significa que tiene nivel medio de fatiga
	if ($nivel_fatiga == 2) {
		//este es el rango de tiempo que se debe demorar el evaluador en decir las recomendaciones al conductor
		if ($diferencia_tiempos >= 4 && $diferencia_tiempos <= 7) {
			echo "<script>
				alert('Se ha demorado el tiempo estimado en decir las recomendaciones al conductor por el nivel de fatiga Medio , la probabilidad de fraude es poca');
				window.location = 'test.php';
			</script>";
		}else {
			echo "<script>
				alert('Se ha demorado muy poco en decir las recomendaciones al conductor por tener nivel de fatiga Medio');
				window.location = 'test.php';
			</script>";
		}
	}

	//Si es 3 significa que tiene nivel alto de fatiga
	if ($nivel_fatiga == 3) {
		//Este es el rango en que se debe demorar para decir las recomendaciones al conductor por parte del evaluador
		if ($diferencia_tiempos >= 9 && $diferencia_tiempos <= 15) {
			echo "<script>
				alert('Se ha demorado el tiempo estimado en decir las recomendaciones al conductor por el nivel de fatiga Alto , la probabilidad de fraude es poca');
				window.location = 'test.php';
			</script>";
		}else {
			echo "<script>
				alert('Se ha demorado muy poco en decir las recomendaciones al conductor por presentar nivel de fatiga Alto');
				window.location = 'test.php';
			</script>";
		}
	}

	//Si por alguna razon se demora mas del tiempo permitido se activa este condicional
	if ($diferencia_tiempos >= 17) {
		echo "<script>
				alert('El Evaluador se ha demorado demasiado tiempo en decir las recomendaciones , es probable que se este haciendo de foam incorrecta , Hay que tomar medidas de forma interna');
				window.location = 'test.php';
			</script>";
	}
?>