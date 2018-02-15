<?php
	//Estas dos variables son los ids de las alteraciones emocionales cuando sus pulsaciones no son normales
	$valor_Id_ansiedad = 2;
	$valor_Id_prisa = 1;
	//Creamos esta variable para que no se repita los id de las alteraciones emocionales cuando las pulsaciones son altas
	$negar_seleccion = true;
	//Esta variable se creo para mostrar la descripcion detallada de prisa y ansiedad sin que el evaluador las halla seleccionado
	$Mostrar_Alteraciones_emocionales = 1;
	//creamos el acumulador a_emocionales_seleccionadas que es el que enviamos a la bd a la tabla evaluacion fatiga
	$a_emocionales_seleccionadas = $valor_Id_ansiedad.",".$a_emocionales_seleccionadas;
	$a_emocionales_seleccionadas = $valor_Id_prisa.",".$a_emocionales_seleccionadas;
?>