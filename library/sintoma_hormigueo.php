<?php
	switch ($registro["s_hormigueo"]) {
		case 'Piernas':
			container_alert("warning","<label> Presenta Sensacion de Hormigueo en: </label> $registro[s_hormigueo]");
			break;
		case 'Manos':
			container_alert("warning","<label> Presenta Sensacion de Hormigueo en: </label> $registro[s_hormigueo]");
			break;
		case 'Cara':
			container_alert("warning","<label> Presenta Sensacion de Hormigueo en: </label> $registro[s_hormigueo]");
			break;
		case 'all_options':
			container_alert("danger","<label> Presenta Sensacion de Hormigueo en: </label> Piernas , Manos y Cara");
			break;
		case 'none_options':
			container_alert("success","<label> El conductor no tiene sensacion de hormigueo.</label>");
			break;
		default:
			echo "Ha ocurrid un problema en mostrar la informaicon de hormigueo del conductor en el cuerpo.";
			break;
	}
?>