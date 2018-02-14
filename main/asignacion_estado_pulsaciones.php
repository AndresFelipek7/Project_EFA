<?php
	include "../methods_backend.php";

	/*$traer_Valor_Pulsaciones_ingresadas = $_POST["pulsaciones"];
	$edad_Conductor = $_SESSION["edad"];*/
	$traer_Valor_Pulsaciones_ingresadas = 10;
	$edad_Conductor = 23;

	if($edad_Conductor >= 20 && $edad_Conductor <=29) {
		if($traer_Valor_Pulsaciones_ingresadas < 60) {
			panel_info_pulsaciones("warning", "heart", "El conductor Presenta Bradicardia , Por favor consulte al medico por tener las pulsaciones bajas");
		}else if($traer_Valor_Pulsaciones_ingresadas >= 62 && $traer_Valor_Pulsaciones_ingresadas <= 68) {
			panel_info_pulsaciones("success", "heart", "El conductor presenta buenas Pulsaciones");
		}else if($traer_Valor_Pulsaciones_ingresadas >= 70 && $traer_Valor_Pulsaciones_ingresadas <= 84) {
			panel_info_pulsaciones("success", "heart", "El conductor presenta una pulsaciones normales para la edad que tiene");
		}else if($traer_Valor_Pulsaciones_ingresadas >= 86) {
			panel_info_pulsaciones("danger", "heartbeat", "<label> El conductor presenta Taticardia por tener las pulsaciones altas, Por favor hacer las siguientes recomendaciones </label> <p> Recomendacion 1: Mantenerse relajado y tranquilo por 10 Minutos , luego de este tiempo tomar de nuevo el pulso </p><br> <p> Recomendacion 2 : Si tiene Hipertension por favor tomar su medicamente en los tiempo correctos antes de salir de viaje </p><br> <p> Recomendacion 3 : Si persiste las pulsaciones alta despues de hacer las recomendaciones anteriores visite al medico Inmediatamente </p>");
			include "activar_menus_por_pulsaciones.php";
		}
	}else if($edad_Conductor >= 30 && $edad_Conductor <=39) {
		if($traer_Valor_Pulsaciones_ingresadas < 62) {
			panel_info_pulsaciones("warning", "heart-o", "El conductor Presenta Bradicardia , Por favor consulte al medico por tener las pulsaciones bajas");
		}else if($traer_Valor_Pulsaciones_ingresadas >= 64 && $traer_Valor_Pulsaciones_ingresadas <= 70) {
			panel_info_pulsaciones("success", "heart", "El conductor presenta buenas Pulsaciones");
		}else if($traer_Valor_Pulsaciones_ingresadas >= 72 && $traer_Valor_Pulsaciones_ingresadas <= 84) {
			panel_info_pulsaciones("success", "heart", "El conductor presenta una pulsaciones normales para la edad que tiene");
		}else if($traer_Valor_Pulsaciones_ingresadas >= 86) {
			panel_info_pulsaciones("danger", "heartbeat", "<label> El conductor presenta Taticardia por tener las pulsaciones altas, Por favor hacer las siguientes recomendaciones </label> <p> Recomendacion 1: Mantenerse relajado y tranquilo por 10 Minutos , luego de este tiempo tomar de nuevo el pulso </p><br> <p> Recomendacion 2 : Si tiene Hipertension por favor tomar su medicamente en los tiempo correctos antes de salir de viaje </p><br> <p> Recomendacion 3 : Si persiste las pulsaciones alta despues de hacer las recomendaciones anteriores visite al medico Inmediatamente </p>");
			include "activar_menus_por_pulsaciones.php";
		}
	}else if($edad_Conductor >= 40 && $edad_Conductor <=49) {
		if($traer_Valor_Pulsaciones_ingresadas < 66) {
			panel_info_pulsaciones("warning", "heart-o", "El conductor Presenta Bradicardia , Por favor consulte al medico por tener las pulsaciones bajas");
		}else if($traer_Valor_Pulsaciones_ingresadas >= 67 && $traer_Valor_Pulsaciones_ingresadas <= 74) {
			panel_info_pulsaciones("success", "heart", "El conductor presenta buenas Pulsaciones");
		}else if($traer_Valor_Pulsaciones_ingresadas >= 75 && $traer_Valor_Pulsaciones_ingresadas <= 88) {
			panel_info_pulsaciones("success", "heart", "El conductor presenta una pulsaciones normales para la edad que tiene");
		}else if($traer_Valor_Pulsaciones_ingresadas >= 90) {
			panel_info_pulsaciones("danger", "heartbeat", "<label> El conductor presenta Taticardia por tener las pulsaciones altas, Por favor hacer las siguientes recomendaciones </label> <p> Recomendacion 1: Mantenerse relajado y tranquilo por 10 Minutos , luego de este tiempo tomar de nuevo el pulso </p><br> <p> Recomendacion 2 : Si tiene Hipertension por favor tomar su medicamente en los tiempo correctos antes de salir de viaje </p><br> <p> Recomendacion 3 : Si persiste las pulsaciones alta despues de hacer las recomendaciones anteriores visite al medico Inmediatamente </p>");
			include "activar_menus_por_pulsaciones.php";
		}
	}else if($edad_Conductor >= 50 && $edad_Conductor <=59) {
		if($traer_Valor_Pulsaciones_ingresadas < 66) {
			panel_info_pulsaciones("warning", "heart-o", "El conductor Presenta Bradicardia , Por favor consulte al medico por tener las pulsaciones bajas");
		}else if($traer_Valor_Pulsaciones_ingresadas >= 68 && $traer_Valor_Pulsaciones_ingresadas <= 74) {
			panel_info_pulsaciones("success", "heart", "El conductor presenta buenas Pulsaciones");
		}else if($traer_Valor_Pulsaciones_ingresadas >= 75 && $traer_Valor_Pulsaciones_ingresadas <= 88) {
			panel_info_pulsaciones("success", "heart", "El conductor presenta una pulsaciones normales para la edad que tiene");
		}else if($traer_Valor_Pulsaciones_ingresadas >= 90) {
			panel_info_pulsaciones("danger", "heartbeat", "<label> El conductor presenta Taticardia por tener las pulsaciones altas, Por favor hacer las siguientes recomendaciones </label> <p> Recomendacion 1: Mantenerse relajado y tranquilo por 10 Minutos , luego de este tiempo tomar de nuevo el pulso </p><br> <p> Recomendacion 2 : Si tiene Hipertension por favor tomar su medicamente en los tiempo correctos antes de salir de viaje </p><br> <p> Recomendacion 3 : Si persiste las pulsaciones alta despues de hacer las recomendaciones anteriores visite al medico Inmediatamente </p>");
			include "activar_menus_por_pulsaciones.php";
		}
	}else if($edad_Conductor >= 60) {
		if($traer_Valor_Pulsaciones_ingresadas < 68) {
			panel_info_pulsaciones("warning", "heart-o", "El conductor Presenta Bradicardia , Por favor consulte al medico por tener las pulsaciones bajas");
		}else if($traer_Valor_Pulsaciones_ingresadas >= 70 && $traer_Valor_Pulsaciones_ingresadas <= 75) {
			panel_info_pulsaciones("success", "heart", "El conductor presenta buenas Pulsaciones");
		}else if($traer_Valor_Pulsaciones_ingresadas >= 76 && $traer_Valor_Pulsaciones_ingresadas <= 90) {
			panel_info_pulsaciones("success", "heart", "El conductor presenta una pulsaciones normales para la edad que tiene");
		}else if($traer_Valor_Pulsaciones_ingresadas >= 94) {
			panel_info_pulsaciones("danger", "heartbeat", "<label> El conductor presenta Taticardia por tener las pulsaciones altas, Por favor hacer las siguientes recomendaciones </label> <p> Recomendacion 1: Mantenerse relajado y tranquilo por 10 Minutos , luego de este tiempo tomar de nuevo el pulso </p><br> <p> Recomendacion 2 : Si tiene Hipertension por favor tomar su medicamente en los tiempo correctos antes de salir de viaje </p><br> <p> Recomendacion 3 : Si persiste las pulsaciones alta despues de hacer las recomendaciones anteriores visite al medico Inmediatamente </p>");
			include "activar_menus_por_pulsaciones.php";
		}
	}
?>