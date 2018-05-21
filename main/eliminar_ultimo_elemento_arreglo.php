<?php
	/*El codigo de aqui en adelante se repite solo que con el cambio de la variable que se debe separar

	Este problema que estamos solucionando en la parte de abajo se produce porque como debimos declarar la variable
	 e inicializarla en 0 , dentro de esta variable va a estar contenida todos los ids seleccionados
	 que dija el conductor y al final el ultimo elemento de esa variable va hacer un cero , como en la bd no tenemos
	 ningun elemento es decir ningun id de la tabla que comience en cero lo que hace el sistema es duplicar el ultimo
	 elemento porque no pudo encontrar el id 0 que no existe en la bd pero que nos sirve para poder inicializar la
	 variable */

	//Separamos lo que tenga la cadea sintomas_seleccionados por medio de la funcion explode cuando encuentre una , y lo dejams en arreglo_sintomas
	$arreglo_sintomas = explode(",",$sintomas_seleccionados);
	//Con la funcion count sabemos la longitud del arreglo
	for ($i=0; $i < count($arreglo_sintomas); $i++) {
		if ($arreglo_sintomas[$i] == 0 ) {
			//Le pasamos como parametro el nombre del arreglo a la funcionarray_pop para que elimine ese elemento
			array_pop($arreglo_sintomas);
		}
		//Unimos la cadena con la funcion implode y el pegamento de cada elemento sera una coma ahora sin el elemento 0
		$sintomas_seleccionados= implode(",",$arreglo_sintomas);
	}

	$arreglo_sugerencia_sintoma = explode(",",$sugerencia_sintoma_seleccionados);
	for ($i=0; $i < count($arreglo_sugerencia_sintoma); $i++) {
		if ($arreglo_sugerencia_sintoma[$i] == 0 ) {
			array_pop($arreglo_sugerencia_sintoma);
		}
		$sugerencia_sintoma_seleccionados= implode(",",$arreglo_sugerencia_sintoma);
	}

	$arreglo_A_emocional = explode(",",$a_emocionales_seleccionadas);
	for ($i=0; $i < count($arreglo_A_emocional); $i++) {
		if ($arreglo_A_emocional[$i] == 0 ) {
			array_pop($arreglo_A_emocional);
		}
		$a_emocionales_seleccionadas= implode(",",$arreglo_A_emocional);
	}

	$arreglo_sugerencia_a_emocional = explode(",",$sugerencia_a_emocional_seleccionados);
	for ($i=0; $i < count($arreglo_sugerencia_a_emocional); $i++) {
		if ($arreglo_sugerencia_a_emocional[$i] == 0 ) {
			array_pop($arreglo_sugerencia_a_emocional);
		}
		$sugerencia_a_emocional_seleccionados= implode(",",$arreglo_sugerencia_a_emocional);
	}

	$arreglo_a_neurologico = explode(",",$a_neurologicos_seleccionados);
	for ($i=0; $i < count($arreglo_a_neurologico); $i++) {
		if ($arreglo_a_neurologico[$i] == 0 ) {
			array_pop($arreglo_a_neurologico);
		}
		$a_neurologicos_seleccionados= implode(",",$arreglo_a_neurologico);
	}

	$arreglo_sugerencia_a_neurologico = explode(",",$sugerencia_a_neurologico_seleccionados);
	for ($i=0; $i < count($arreglo_sugerencia_a_neurologico); $i++) {
		if ($arreglo_sugerencia_a_neurologico[$i] == 0 ) {
			array_pop($arreglo_sugerencia_a_neurologico);
		}
		$sugerencia_a_neurologico_seleccionados= implode(",",$arreglo_sugerencia_a_neurologico);
	}
?>