<?php
	include "conec.php";
	$id_destino =  $_REQUEST['valor_combo'];

	$consulta_traer_tiempo_distancia = "SELECT distancia_km , Tiempo_Recorrido FROM rutas WHERE id_ruta = '$id_destino'";
	$resultado = $conexion -> query($consulta_traer_tiempo_distancia);
	$count = $resultado->num_rows;

	if($count >= 1){
		$row = mysqli_fetch_array($resultado);
		$distancia = $row['distancia_km'];
		$tiempo = $row['Tiempo_Recorrido'];
		$vector_tiempo = explode(" ",$tiempo);

		if($vector_tiempo[0] == "") {
			if($vector_tiempo[1] >= 8) {
				require_once "../mostrar_destino_tiempo_completo.php";
				echo "<script> document.getElementById('camarote').style.display='block' </script>";
			}else{
				require_once "../mostrar_destino_tiempo_completo.php";
				echo "<script> document.getElementById('camarote').style.display='none' </script>";
			}
		}else if($vector_tiempo[0] >= 8){
			require_once "../mostrar_destino_tiempo_completo.php";
			echo "<script> document.getElementById('camarote').style.display='block' </script>";
		}else{
			require_once "../mostrar_destino_tiempo_completo.php";
			echo "<script> document.getElementById('camarote').style.display='none' </script>";
		}

		//Creacion de los elementos que se van a enviar al formulario por medio de Ajax
		echo "<div id='contenedor_destino_Ajax'>";
			echo "<center>";
				echo "<div class='col-md-12' style='margin-bottom:5px;'>
						<label>Distancia en Kilometros </label>
						<input type='text' class='text-center form-control' name='distancia' id='distancia' value='$distancia' readonly>
					</div>"."<br>";
				echo "<div class='col-md-12'>
						<label id='label_tiempo'>Tiempo de Llegada </label>
						<input type='text' class='text-center form-control' name='tiempo_destino' id='tiempo_destino' value='$tiempo_a_enviar' readonly>
					</div>"."<br>";
			echo "</center>";
		echo "</div>";


	}else{
		//Si no se encuentra el id del destino en la BD se ocultan los campos creados
		echo "<script> document.getElementById('id_destino').style.display='none' </script>";
		echo "<script> document.getElementById('distancia').style.display='none' </script>";
		echo "<script> document.getElementById('tiempo_destino').style.display='none' </script>";
	}

	$conexion->close();
?>