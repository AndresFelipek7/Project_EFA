<!DOCTYPE html>
<html lang="en">
<head>
	<title>Informe de la Evaluacion</title>
	<?php include 'library/Head/Head_common.php'; ?>
</head>
<body>
	<?php include 'library/Head/Header-main-evaluador.php'; ?>

	<?php
		/*$verificar_envio = $_SESSION["verificar"];*/

		//Cuando es igual a 1 significa que se ha envia una soloa vez , pero si se intenta actualizar va tener otro valor
		/*if($verificar_envio == 1) {*/
			//Enlazamos un archivo para saber cuanto tiempo se demoro en realizar la evaluacion
			include "tiempo_realizar_evaluacion.php";

			//Para destruir la variable
			/*unset($_SESSION["verificar"]);*/

			require_once "main/informacion_conductor.php";

			//Algoritmo para guardar el pantallazo de la app mi fit al proyecto
			include "library/save_screenshot_mi_fit.php";

			//Inicializacion de acumuladores para poder decir que niel de fatiga tiene con los pilares positivos
			$acumulador_Sintomas = 0;
			$acumulador_Alteraciones_emocionales = 0;
			$acumulador_Alteraciones_neurologicas = 0;
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
			$a_neurologicos_seleccionados = 0;

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
			$sugerencia_a_neurologico_seleccionados = 0;

			//Inicializacion de las variables que nos sirven para saber si hay otro sintoma u otras aletraciones en el formulario
			//Si no se definen aqui cuando no se ingresa nada va a generar error por variable indefinida
			$valor_otro_sintoma = "";
			$valor_otra_a_Emocional = "";
			$otra_a_neurologica = "";
			$saber_nivel_fatiga = "";

			//Vector del menu interrogatorio
			$traer_Valores_interrogatorio = [ $_POST['descanso'] , $_POST['camarote'] , $_POST['conduciendo'] , $_POST['otra_actividad'] , $_POST['cual_actividad'] , $_POST['sueño_efectivo_previo'] , $_POST['tiempo_descanso'] , $_POST['ruta'] , $_POST['copiloto'] , $_POST['origen_copiloto'] , $_POST["pulsaciones"]];
			//Valor signo seleccionado por el evaluador
			$valor_Signo = $_POST['signos'];

			//Enlazamos el algoritmo de la informacion de la manilla para integrarla con la plataforma
			require_once "main/comparacion_sueno_manilla.php";
			require_once "main/asignacion_estado_pulsaciones.php";

			echo "<div class='container text-center'>";
			echo "<h2>Descripcion Detallada</h2>";
			require_once "main/descripcion/descripcion_signo.php";
			require_once "main/descripcion/descripcion_a_neurologicas.php";
			require_once "main/descripcion/descripcion_a_emocional.php";
			require_once "main/descripcion/descripcion_sintoma.php";
			echo "</div>";
			echo "<hr>";


			echo "<h2>Recomendaciones</h2>";
			require_once "main/horas_conducidas.php";
			require_once "main/sugerencia/sugerencia_signo.php";
			require_once "main/sugerencia/sugerencia_a_neurologico.php";
			require_once "main/sugerencia/sugerencia_a_emocional.php";
			require_once "main/sugerencia/sugerencia_sintoma.php";
			echo "<hr>";

			/*Contenedor donde mostramos el alerta del nivel de fatiga del conductor*/
			echo "<div class='container text-center'>";
			require_once "main/hallar_pilar.php";

			//Aqui es donde mostramos el semaforo , el mensaje del nidel del conductor y si puede conducir o no
			switch ($acumulador_Pilares) {
				case 1:
				echo "<h3 class='animated rubberBand' style='color:green;'>Nivel de Fatiga que Presenta es = Bajo</h3>";
				echo "<h3 class='animated rubberBand' style='color:green;'>El conductor puede conducir sin problemas , pero se recomienda hacer las sugerencias asignadas</h3>";
				echo "<h3 class='animated rubberBand' style='color:green;'>Para que este en optimas condiciones para conducir</h3>";
				echo "<img src='images/Semaforos/semaforo_verde.jpg' width='200' height='200'>";
				$saber_nivel_fatiga = "1";
				break;
				case 2:
				echo "<h3 class='animated rubberBand' style='color:green;'>Nivel de Fatiga que Presenta es = Bajo</h3>";
				echo "<h3 class='animated rubberBand' style='color:green;'>El conductor puede conducir sin problemas , pero se recomienda hacer las sugerencias asignadas</h3>";
				echo "<h3 class='animated rubberBand' style='color:green;'>Para que este en optimas condiciones para conducir</h3>";
				echo "<img src='images/Semaforos/semaforo_verde.jpg' width='200' height='200'>";
				$saber_nivel_fatiga = "1";
				break;
				case 3:
				echo "<h3 class='animated rubberBand' style='color:black;'>Nivel de Fatiga que Presenta es = Medio</h3>";
				echo "<h3 class='animated rubberBand' style='color:black;'>El conductor debe de realizar todas las recomendaciones que se asignaron</h3>";
				echo "<h3 class='animated rubberBand' style='color:black;'>El conductor puede conducir realizando todas las recomendaciones</h3>";
				echo "<img src='images/Semaforos/semaforo naranja.jpg' width='200' height='200'>";
				$saber_nivel_fatiga = "2";
				break;
				case 4:
				echo "<h3 class='animated rubberBand' style='color:red;'>Nivel de Fatiga que Presenta es = Alto</h3>";
				echo "<h3 class='animated rubberBand' style='color:red;'>El conductor no puede conducir el dia de hoy</h3>";
				echo "<h3 class='animated rubberBand' style='color:red;'>Tiene que hacer todas las recomendaciones para poder hacer su siguiente evaluacion de fatiga</h3>";
				echo "<img src='images/Semaforos/semaforo naranja.jpg' width='200' height='200'>";
				$saber_nivel_fatiga = "3";
				break;
				case 5:
				echo "<h3 class='animated rubberBand' style='color:red;'>Nivel de Fatiga que Presenta es = Alto</h3>";
				echo "<h3 class='animated rubberBand' style='color:red;'>El conductor no puede conducir el dia de hoy</h3>";
				echo "<h3 class='animated rubberBand' style='color:red;'>Tiene que hacer todas las recomendaciones para poder hacer su siguiente evaluacion de fatiga</h3>";
				echo "<img src='images/Semaforos/semaforo_rojo.png' width='200' height='200'>";
				$saber_nivel_fatiga = "3";
				break;
				default:
				echo "<h3 class='animated rubberBand' style='color:green;'>Esta en optimas condiciones para conducir</h3>";
				echo "<img src='images/Semaforos/semaforo_verde.jpg' width='200' height='200'>";
				$saber_nivel_fatiga = "1";
				break;
			}
			echo "</div>";
			echo "<hr>";

			//Este es el tiempo en minutos y segundos cuando se envia la evaluacion a la bd y ya se tiene el resultado y las sugerencias para el evaluador
			$_SESSION["tiempo_iniciar_sugerencia"] = date("i:s");

			//Botones para volver hacer la evaluacion y descargar un pdf
			echo "<div class='container-fluid text-center'>";
			/*En el primer link le enviamos por get el valor del tiempo cuando llego a la pagina de recomendaciones para luego saber cuanto se demora en esta pagina*/
			echo "<a href='tiempo_decir_sugerencias.php?t=$_SESSION[tiempo_iniciar_sugerencia]&nf=$saber_nivel_fatiga' class='btn btn-md btn-default active btn3d btn-lg' style='margin-right:10px;'><span class='glyphicon glyphicon-ok'></span></a>";
			echo "<a href='reporte_evaluacion_fatiga.php?id_con=$_SESSION[registro]&pilar1=$pilar_activo_Labor_estenuante&pilar2=$pilar_descanso_insuficiente_activo&pilar3=$pilar_destino_distante_activo&pilar4=$pilar_condicion_fisica_activo&pilar5=$pilar_estado_emocional_activo&nivel=$acumulador_Pilares' class='btn btn-md btn-default active btn3d btn-lg'><span class='glyphicon glyphicon-download-alt'></span></a>";
			echo "</div>";

			//Este condicional es para dar una orden de reposo general dependiendo de la informacion ingresada
			//Con la variable acumulador pilares sabemos que nivel de fatiga tiene le conductor por la cantidad de pilares activos
			if($acumulador_Pilares >= 2 && $acumulador_Pilares <= 5) {
				$valor_id_orden = 1;
			}else{
				$valor_id_orden = 2;
			}

			//Variables para hacer la insercion de la evaluacion a la Base de Datos
			$identificacion_conductor = $_SESSION["registro"];
			$id_Usuario = $_SESSION['id_usuario'];
			$traer_Valores_signos = $_POST['signos'];

			//colocamos un nuevo archivo que nos va a permitir quitar el ultimo elemento de la cadena que es un cero y que luego en el rol admin nos v a generar error
			require_once("main/eliminar_ultimo_elemento_arreglo.php");

			//Insercion de la evaluacion a la BD
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
				ids_sugerencia_neurologico ,
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
				ids_a_neurologico ,
				sugerencia_horas_conducidas ,
				cual_otro_sintoma ,
				cual_otro_emocional ,
				cual_otro_neurologico
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
				'$sugerencia_a_neurologico_seleccionados' ,
				'$valor_id_orden' ,
				'$saber_nivel_fatiga' ,
				'Bogota' ,
				'$traer_Valores_interrogatorio[0]' ,
				'$traer_Valores_interrogatorio[1]' ,
				'$traer_Valores_interrogatorio[2]' ,
				'$traer_Valores_interrogatorio[3]' ,
				'$traer_Valores_interrogatorio[4]' ,
				'$sacar_Minutos_hora' ,
				'$traer_Valores_interrogatorio[6]' ,
				'$traer_Valores_interrogatorio[8]' ,
				'$traer_Valores_interrogatorio[9]' ,
				'$valor_Total_minutos_Manilla' ,
				'$valor_verdad_tiempo_descanso_conductor' ,
				'$traer_Valores_interrogatorio[10]' ,
				'$path_rename_fit_image' ,
				'$a_emocionales_seleccionadas' ,
				'$a_neurologicos_seleccionados' ,
				'$recomendacion_Descansar_conducir' ,
				'$valor_otro_sintoma' ,
				'$valor_otra_a_Emocional' ,
				'$otra_a_neurologica'
			)";

			$resultado_Insercion_evaluacion = $conexion -> query($insercion_Evaluacion);

			if($resultado_Insercion_evaluacion) {
				echo '<script> alert(" Bien! Se han Insertado la evaluacion correctamente"); </script>';
			}else{
				echo '<script> alert(" Problemas al Insertar la evaluacion"); </script>';
			}*/

			//Cerramos la conexion de la Bd
			$conexion->close();
		/*}else {
			echo "<script>alert('Acceso Denegado , No esta permitido refrescar este modulo por seguridad , Gracias :)')</script>";
			echo "<script> window.location = 'test.php'</script>";
		}*/
	?>

	<?php include "library/Footer.php"; ?>
</body>
</html>