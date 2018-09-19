<?php
	$select_sueño = $_POST["t_alistamiento"];

	switch($select_sueño) {
		case 'hora':
			$solo_hora_sueño = $_POST["solo_hora_alistamiento"];
			echo $total_minutos_sueño_conductor = getMinutes($solo_hora_sueño);
		break;
		case 'minutos':
			$solo_minutos_sueño = $_POST["solo_minutos_alistamiento"];

			if ($solo_minutos_sueño >= 50 && $solo_minutos_sueño < 60) {
				$añadir_minutos_faltantes = 60 - $solo_minutos_sueño;
				echo $total_minutos_sueño_manilla = $solo_minutos_sueño + $añadir_minutos_faltantes;
			}else {
				echo $total_minutos_sueño_manilla = $solo_minutos_sueño;
			}
		break;
		case 'ambos':
			$solo_hora_sueño_both = $_POST["hora_alistamiento"];
			$solo_minutos_sueño_both = $_POST["minutos_alistamiento"];

			if ($solo_minutos_sueño_both >= 50) {
				$hora_Total_con_Aproximado_minutos = $solo_hora_sueño_both + 1;
				echo $total_minutos_sueño_manilla = getMinutes($hora_Total_con_Aproximado_minutos);
			}else {
				$valor_minutos_Manilla = getMinutes($solo_hora_sueño_both);
				echo $total_minutos_sueño_manilla = $valor_minutos_Manilla + $solo_minutos_sueño_both;
			}
		break;
		default:
			echo "<script>
				alert_dinamic_outside_place('evaluacion.php');
			</script>";
	}
?>