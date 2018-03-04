<?php
	$select_sueño_ligero = $_POST["sueño_ligero"];

	switch ($select_sueño_ligero) {
		case 'hora':
			$sueño_ligero_hora = $_POST["solo_hora_sueno_ligero"];
			$sueno_ligero = getMinutes($sueño_ligero_hora);
			break;
		case 'minutos':
			$sueno_ligero = $_POST["solo_minutos_sueno_ligero"];
			break;
		case 'ambos':
			$sueño_ligero_hora = $_POST["solo_hora_sueno_both_ligero"];
			$sueno_ligero_sin_minutos = getMinutes($sueño_ligero_hora);
			$sueño_ligero_solo_minutos = $_POST["solo_minutos_sueno_both_ligero"];
			$sueno_ligero = $sueno_ligero_sin_minutos + $sueño_ligero_solo_minutos;
			break;
		default:
			message_mistake_validator("Ha ocurrido un error en el algoritmo de Sueño Ligero del conductor.");
			break;
	}
?>