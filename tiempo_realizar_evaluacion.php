<?php
	//Sacamos el tiempo final cuando envia la evaluacion en minutos y segundos por parte de la funcion date en php
	$_SESSION['tiempo_final'] = date("i:s");
	//Sacamos el tiempo de inicio y el tiempo final de la realizacion de la evaluacion
	$tiempo_inicio_evaluacion = $_SESSION["tiempo_inicio"];
	$tiempo_final_evaluacion = $_SESSION["tiempo_final"];

	//Sacamos solo los minutos de los tiempos con la funcion explode de cada tiempo para operar
	$sacar_minutos_tiempo_inicio = explode(":" , $tiempo_inicio_evaluacion);
	$sacar_minutos_tiempo_final = explode(":" , $tiempo_final_evaluacion);

	//Sacamos el tiempo que se demoro haciendo la evaluacion
	$diferencia_tiempos = $sacar_minutos_tiempo_final[0] - $sacar_minutos_tiempo_inicio[0];

	/*if ($diferencia_tiempos >= 5 && $diferencia_tiempos <= 8) {
		alert_dinamic_time_doing_test("La evaluacion se realizo en el tiempo estimado , la probabilidad de fraude es poca", "success");
	}else if($diferencia_tiempos > 9){
		alert_dinamic_time_doing_test("La evaluacion supero el tiempo estimado , es posible que la informacion ingresada sea falsa", "warning");
	}else {
		alert_dinamic_time_doing_test("El evaluador Hizo la Evaluacion Muy rapido , es posible que este llenando los campos de forma incorrecta , por favor verificar ese procedimiento", "error");
	}*/
?>