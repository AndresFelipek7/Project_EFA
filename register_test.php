<?php
	$identificacion_conductor = $_SESSION["registro"];
	$id_Usuario = $_SESSION['id_usuario'];
	$traer_Valores_signos = $_POST['signos'];

	/*$insercion_Evaluacion = "INSERT INTO evaluacion_fatiga (id_usuario , id_conductor , id_ruta , ids_sintomas , id_signo , ids_nivel_riesgo , ids_sugerencia_sintomas , id_sugerencia_signo , ids_sugerencia_emocionales , id_orden , nivel_fatiga , origen , horas_descanso , horas_camarote , horas_conduciendo , horas_otra_actividad , cual_actividad , tiempo_sueno , tiempo_descanso , info_copiloto , origen_copiloto , tiempo_sueno_manilla , verdad_conductor_descanso , pulsaciones , descargable_fit , ids_a_emocional , sugerencia_horas_conducidas , cual_otro_sintoma , cual_otro_emocional , cual_otro_estado_signo , sintoma_hormigueo , tiempo_sueno_ligero) VALUES ( '$id_Usuario' , '$identificacion_conductor' , '$traer_Valores_interrogatorio[7]' , '$sintomas_seleccionados' , '$traer_Valores_signos' , '$pilares_seleccionados' , '$sugerencia_sintoma_seleccionados' , '$sugerencia_signo_seleccionado' , '$sugerencia_a_emocional_seleccionados' , '$valor_id_orden' , '$saber_nivel_fatiga' ,'Bogota' , '$traer_Valores_interrogatorio[0]' , '$traer_Valores_interrogatorio[1]' , '$traer_Valores_interrogatorio[2]' , '$traer_Valores_interrogatorio[3]' , '$traer_Valores_interrogatorio[4]' , '$sacar_Minutos_hora' , '$traer_Valores_interrogatorio[6]' , '$traer_Valores_interrogatorio[8]' , '$traer_Valores_interrogatorio[9]' , '$valor_Total_minutos_Manilla' , '$valor_verdad_tiempo_descanso_conductor' , '$traer_Valores_interrogatorio[10]' , '$path_rename_fit_image' , '$a_emocionales_seleccionadas' , '$recomendacion_Descansar_conducir' , '$otro_sintoma' , '$otra_a_emocional' , '$valor_otro_estado_signo' ,'$s_hromigueo' , '$sueno_ligero')";
	$resultado_Insercion_evaluacion = $conexion -> query($insercion_Evaluacion);
*/

	/*$insercion_Evaluacion = "INSERT INTO evaluacion_fatiga (
		id_usuario ,
		id_conductor ,
		id_ruta ,
		ids_sintomas ,
		id_signo ,
		ids_nivel_riesgo ,
		ids_sugerencia_sintomas ,
		id_sugerencia_signo ,
		ids_sugerencia_emocionales ,
		id_orden ,
		nivel_fatiga,
		origen ,
		horas_descanso ,
		horas_camarote ,
		horas_conduciendo ,
		horas_otra_actividad ,
		cual_actividad ,
		tiempo_sueno ,
		tiempo_descanso ,
		info_copiloto ,
		origen_copiloto ,
		tiempo_sueno_manilla ,
		verdad_conductor_descanso,
		pulsaciones ,
		descargable_fit ,
		ids_a_emocional ,
		sugerencia_horas_conducidas ,
		cual_otro_sintoma ,
		cual_otro_emocional ,
		cual_otro_estado_signo ,
		sintoma_hormigueo ,
		tiempo_sueno_ligero
		)

		VALUES (
		'$id_Usuario' ,
		'$identificacion_conductor' ,
		'$traer_Valores_interrogatorio[7]' ,
		'$sintomas_seleccionados' ,
		'$traer_Valores_signos' ,
		'$pilares_seleccionados' ,
		'$sugerencia_sintoma_seleccionados' ,
		'$sugerencia_signo_seleccionado' ,
		'$sugerencia_a_emocional_seleccionados' ,
		'$valor_id_orden' ,
		'$saber_nivel_fatiga' ,
		'Bogota' ,
		'$traer_Valores_interrogatorio[0]' ,
		'$traer_Valores_interrogatorio[1]' ,
		'$traer_Valores_interrogatorio[2]' ,
		'$traer_Valores_interrogatorio[3]' ,
		'$traer_Valores_interrogatorio[4]' ,
		'$tiempo_sueño_conductor' ,
		'$traer_Valores_interrogatorio[6]' ,
		'$traer_Valores_interrogatorio[8]' ,
		'$traer_Valores_interrogatorio[9]' ,
		'$total_minutos_sueño_manilla' ,
		'$valor_verdad_tiempo_descanso_conductor' ,
		'$traer_Valores_interrogatorio[10]' ,
		'$path_rename_fit_image' ,
		'$a_emocionales_seleccionadas' ,
		'$recomendacion_Descansar_conducir' ,
		'$otro_sintoma' ,
		'$otra_a_emocional' ,
		'$valor_otro_estado_signo' ,
		'$s_hromigueo' ,
		'0'
	)";*/

	//$resultado_Insercion_evaluacion = $conexion -> query($insercion_Evaluacion);
?>