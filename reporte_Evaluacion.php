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
			/*include "library/save_screenshot_mi_fit.php";*/

			require_once "variables.php";

			echo "<div class='container text-center space-up-container'>";
				echo "<div class='row'>";
					echo "<div class='col-md-6'>";
						require_once "main/comparacion_sueno_manilla.php";
					echo "</div>";
					echo "<div class='col-md-6'>";
						require_once "main/asignacion_estado_pulsaciones.php";
					echo "</div>";
				echo "</div>";
			echo "</div>";

			require_once "main/comparacion_sueno_ligero_manilla.php";

			echo "<div class='container text-center'><hr>";
			echo "<h3>Descripcion Detallada</h3>";
				require_once "main/descripcion/descripcion_signo.php";
				require_once "main/descripcion/descripcion_a_neurologicas.php";
				require_once "main/descripcion/descripcion_a_emocional.php";
				require_once "main/descripcion/descripcion_sintoma.php";
			echo "</div><hr>";

			echo "<h3>Recomendaciones</h3>";
				require_once "main/horas_conducidas.php";
				require_once "main/sugerencia/sugerencia_signo.php";
				require_once "main/sugerencia/sugerencia_a_neurologico.php";
				require_once "main/sugerencia/sugerencia_a_emocional.php";
				require_once "main/sugerencia/sugerencia_sintoma.php";
			echo "<hr>";

			/*Contenedor donde mostramos el alerta del nivel de fatiga del conductor*/
			echo "<div class='container text-center'>";
				require_once "main/hallar_pilar.php";
				$semaforo_verde = "<img class='img-thumbnail img-rounded style-semaforo' src='images/Semaforos/semaforo_verde.jpg'>";
				$semaforo_rojo = "<img class='img-thumbnail img-rounded style-semaforo' src='images/Semaforos/semaforo_rojo.png'>";
				$semaforo_naranja = "<img class='img-thumbnail img-rounded style-semaforo' src='images/Semaforos/semaforo naranja.jpg'>";

				if ($acumulador_Pilares == 0) {
					panel_info_pulsaciones("success", "bell", "<h3>Esta en optimas condiciones para conducir</h3>");
					$saber_nivel_fatiga = 1;
				}else if($acumulador_Pilares == 1 || $acumulador_Pilares == 2){
					panel_level_tired_driver("success", "Bajo", "<h4>El conductor puede conducir sin problemas , pero se recomienda hacer las sugerencias asignadas</h4>", $semaforo_verde);
					$saber_nivel_fatiga = 1;
				}else if($acumulador_Pilares == 4 || $acumulador_Pilares == 5) {
					panel_level_tired_driver("danger", "Alto", "<h4>El conductor no puede conducir el dia de hoy</h4><h4>Tiene que hacer todas las recomendaciones para poder hacer su siguiente evaluacion de fatiga</h4>", $semaforo_rojo);
					$saber_nivel_fatiga = 3;
				}else {
					panel_level_tired_driver("warning", "Medio", "<h4>El conductor debe de realizar todas las recomendaciones que se asignaron</h4><h4>Además debe de realizando todas las recomendaciones asignadas.</h4>", $semaforo_naranja);
					$saber_nivel_fatiga = 2;
				}
			echo "</div><hr>";

			echo "<div class='container-fluid text-center'>";
				echo "<a href='tiempo_decir_sugerencias.php?t=$_SESSION[tiempo_iniciar_sugerencia]&nf=$saber_nivel_fatiga' class='btn btn-md btn-default active btn3d btn-lg' style='margin-right:10px;'><span class='glyphicon glyphicon-ok'></span></a>";
			echo "</div>";

			($acumulador_Pilares >= 2 && $acumulador_Pilares <= 5) ? $valor_id_orden = 1 : $valor_id_orden = 2;

			//colocamos un nuevo archivo que nos va a permitir quitar el ultimo elemento de la cadena que es un cero y que luego en el rol admin nos v a generar error
			require_once "main/eliminar_ultimo_elemento_arreglo.php";
			require_once "register_test.php";

			$conexion->close();
		/*}else {
			echo "<script>alert('Acceso Denegado , No esta permitido refrescar este modulo por seguridad , Gracias :)')</script>";
			echo "<script> window.location = 'test.php'</script>";
		}*/
	?>

	<?php include "library/Footer.php"; ?>
</body>
</html>