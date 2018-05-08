<?php
	/*
		Por cada 4 Horas conduciendo constante se debe decansar 1 Horas
		Por cada Horas conduciendo se debe Descansar 15 minutos
		La variable time_sleep_driver el valor es en minutos del descanso del conductor
	*/
	$time_sleep_driver = 15;
	switch ($traer_Valores_interrogatorio[2]) {
		case $traer_Valores_interrogatorio[2]:
			for ($i=0; $i < $traer_Valores_interrogatorio[2] -1; $i++) {
				$recomendacion_Descansar_conducir = $time_sleep_driver + $time_sleep_driver;
				$i++;
			}

			$tiempo_Descansar_por_partes = $recomendacion_Descansar_conducir/3;
			alert_sleep_driver("success", "Tiempo Total de Descanso", "El conductor debe Descansar 15 Minutos por conducir $traer_Valores_interrogatorio[2]  Hora");

			if($tiempo_Descansar_por_partes >= 60 ) {
				$sacar_Minutos = $tiempo_Descansar_por_partes-60;
				if($sacar_Minutos !=0) {
					container_sleep_driver_all("1 Hora $sacar_Minutos Minutos");
				}else{
					container_sleep_driver_all("1 Hora");
				}
			}else{
				container_sleep_driver_all("$tiempo_Descansar_por_partes Minutos.");
			}

			break;
		default:
			alert_sleep_driver("danger", "Horas Conducidas", "El conductor No puede conducir el dia de hoy por pasar mas de 20 Horas conduciendo sin Descansar , La probabilidad de un accidente en las vias es un alto por falta de Descansar");
			break;
	}
?>