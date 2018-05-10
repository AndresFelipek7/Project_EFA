<?php
	$object_sugerencia_signo = query_sugerencia('id_signo',$valor_Signo,$conexion);
	echo ($object_sugerencia_signo["id_orden"] == 1) ? panel_info_pulsaciones("success","fa fa-cog","<strong>Signo</strong><br>El signo seleccionado es: $object_signo[nombre_signo]<br>La orden de la sugerencia es = <strong>Immediantamente</strong> <br> $object_sugerencia_signo[descripcion_sugerencia]") : panel_info_pulsaciones("success","fa fa-bed","<strong>Signo</strong><br>El signo seleccionado es: $object_signo[nombre_signo]<br>La orden de la sugerencia es = <strong>Despues del Viaje</strong> <br> $object_sugerencia_signo[descripcion_sugerencia]");
	$sugerencia_signo_seleccionado = $object_sugerencia_signo["id_sugerencia"];
?>