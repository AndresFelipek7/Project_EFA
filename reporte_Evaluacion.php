<!DOCTYPE html>
<html lang="en">
<head>
	<title>Informe de la Evaluacion</title>
	<?php include 'library/Head/Head_common.php'; ?>
</head>
<body>
	<?php include 'library/Head/Header-main-evaluador.php'; ?>

	<?php
		include "lib_required_sweetalert_only_profile_evaluador.php";
		include "methods_backend.php";
		$verificar_envio = $_SESSION["verificar"];

		//Cuando es igual a 1 significa que se ha envia una soloa vez , pero si se intenta actualizar va tener otro valor
		if($verificar_envio == 1) {
			//Para destruir la variable
			unset($_SESSION["verificar"]);
			//Enlazamos un archivo para saber cuanto tiempo se demoro en realizar la evaluacion
			include "tiempo_realizar_evaluacion.php";

			require_once "main/informacion_conductor.php";

			//Algoritmo para guardar el pantallazo de la app mi fit al proyecto
			include "library/save_screenshot_mi_fit.php";

			require_once "variables.php";

			echo "<div class='container text-center space-up-container'>";
				echo "<div class='row'>";
					echo "<div class='col-md-6'>";
						//require_once "main/comparacion_sueno_manilla.php";
						require_once "main/comparacion_solo_sueno_manilla.php";
					echo "</div>";
					echo "<div class='col-md-6'>";
						require_once "main/asignacion_estado_pulsaciones.php";
					echo "</div>";
				echo "</div>";
			echo "</div>";

			/*Zona de Selects modulo interrogatorio*/
			$valor_tiempo_camarote = get_info_selects($_POST["tiempo_camarote"], $_POST["solo_hora_camarote"], $_POST["solo_minutos_camarote"], $_POST["hora_camarote"], $_POST["minutos_camarote"]);
			echo "El valor del tiempo en camarote es = $valor_tiempo_camarote <br>";

			$valor_tiempo_conduciendo = get_info_selects($_POST["conduciendo"], $_POST["solo_hora_conduciendo"], $_POST["solo_minutos_conduciendo"], $_POST["hora_conduciendo"], $_POST["minutos_conduciendo"]);
			echo "El valor del tiempo conduciendo es = $valor_tiempo_conduciendo <br>";

			$valor_tiempo_o_actividad = get_info_selects($_POST["otra_actividad"], $_POST["solo_hora_o"], $_POST["solo_minutos_o"], $_POST["hora_o"], $_POST["minutos_o"]);
			echo "El valor del tiempo en otra actividad es = $valor_tiempo_o_actividad <br>";

			$tiempo_alistamiento = get_info_selects($_POST["t_alistamiento"], $_POST["solo_hora_alistamiento"], $_POST["solo_minutos_alistamiento"], $_POST["hora_alistamiento"], $_POST["minutos_alistamiento"]);
			echo "El valor del tiempo alistamiento es = $tiempo_alistamiento";

			$valor_tiempo_extralaboral = get_info_selects($_POST["tiempo_descanso"], $_POST["solo_hora_td"], $_POST["solo_minutos_td"], $_POST["hora_td"], $_POST["minutos_td"]);
			echo "El valor del tiempo extralaboral es = $valor_tiempo_extralaboral <br>";
			/**/

			//require_once "main/comparacion_sueno_ligero_manilla.php";

			echo "<div class='container text-center'><hr>";
				echo "<h3>Descripcion Detallada</h3>";
				require_once "main/descripcion/descripcion_signo.php";
				require_once "main/descripcion/descripcion_a_emocional.php";
				require_once "main/descripcion/descripcion_sintoma.php";
			echo "</div><hr>";

			echo "<h3>Recomendaciones</h3>";
				require_once "main/horas_conducidas.php";
				require_once "main/sugerencia/sugerencia_signo.php";
				require_once "main/sugerencia/sugerencia_a_emocional.php";
				require_once "main/sugerencia/sugerencia_sintoma.php";
			echo "<hr>";

			/*Contenedor donde mostramos el alerta del nivel de fatiga del conductor*/
			require_once "main/hallar_pilar.php";

			echo "<div class='container text-center'>";
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
				echo "<a href='tiempo_decir_sugerencias.php?t=$_SESSION[tiempo_iniciar_sugerencia]&nf=$saber_nivel_fatiga' class='btn btn-md btn-default btn-lg'><span class='fa fa-check'></span></a>";
			echo "</div>";

			($acumulador_Pilares >= 2 && $acumulador_Pilares <= 5) ? $valor_id_orden = 1 : $valor_id_orden = 2;

			//colocamos un nuevo archivo que nos va a permitir quitar el ultimo elemento de la cadena que es un cero y que luego en el rol admin nos v a generar error
			require_once "main/eliminar_ultimo_elemento_arreglo.php";
			require_once "register_test.php";

			$conexion->close();
		}else {
			echo "<script>alert('Acceso Denegado , No esta permitido refrescar este modulo por seguridad , Gracias :)')</script>";
			echo "<script> window.location = 'test.php'</script>";
		}
	?>
	<?php include "library/Footer.php"; ?>
</body>
</html>