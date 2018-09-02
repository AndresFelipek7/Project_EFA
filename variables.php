<?php
	//Inicializacion de acumuladores para poder decir que niel de fatiga tiene con los pilares positivos
	$acumulador_Sintomas = 0;
	$acumulador_Alteraciones_emocionales = 0;
	$acumulador_Pilares = 0;

	//Banderas inicializadas en cero para que cuando tengamos el total de cada menu podamos decir que pilar esta activo
	$pilar_activo_Labor_estenuante = 0;
	$pilar_descanso_insuficiente_activo = 0;
	$pilar_destino_distante_activo = 0;
	$pilar_condicion_fisica_activo = 0;
	$pilar_estado_emocional_activo = 0;

	//Inicializacion de variables para poder enviar a la BD los id de los seleccionados de las descripciones de cada menu
	$sintomas_seleccionados = 0;
	$a_emocionales_seleccionadas = 0;

	//Inicialiazacion de variable para saber el nivel de fatiga final del conductor
	$pilares_seleccionados = 0;

	//Creamos esta variable para saber si el conductor dijo la verdad con respecto a su tiempo descanso confrontado con la info de la manilla
	$valor_verdad_tiempo_descanso_conductor = "Verdad";

	//Creamos esta variable para impedir la doble seleccion de las alteraciones prisa y ansiedad cuando las pulsaciones son muy altas y el evaluador tambien las seleccione , para que cuando se envien los ids a la bd solo sea una vez y no se duplique
	$negar_seleccion = false;

	//Inicializacion para poder enviar los id de las sugerencias de cada menu a la BD
	$sugerencia_sintoma_seleccionados = 0;
	$sugerencia_signo_seleccionado = 0;
	$sugerencia_a_emocional_seleccionados = 0;

	$saber_nivel_fatiga = "";

	//Vector del menu interrogatorio
	$traer_Valores_interrogatorio = [ $_POST['descanso'] , $_POST['camarote'] , $_POST['conduciendo'] , $_POST['otra_actividad'] , $_POST['cual_actividad'] , $_POST['sueño_efectivo_previo'] , $_POST['tiempo_descanso'] , $_POST['ruta'] , $_POST['copiloto'] , $_POST['origen_copiloto'] , $_POST["pulsaciones"]];
	$valor_Signo = $_POST['signos'];
	$s_hromigueo = $_POST["hormigueo_opcion"];

	//Este es el tiempo en minutos y segundos cuando se envia la evaluacion a la bd y ya se tiene el resultado y las sugerencias para el evaluador
	$_SESSION["tiempo_iniciar_sugerencia"] = date("i:s");
?>