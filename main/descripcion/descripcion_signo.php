<a href='#signo' data-toggle='modal' class='btn btn-primary btn-lg'><span class="glyphicon glyphicon-eye-open"></span> Signos</a>

<div class='modal fade' id='signo'>
	<div class='modal-dialog modal-lg'>
		<div class='modal-content'>
			<div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				<h4 class='modal-title'> <span class="glyphicon glyphicon-eye-open"></span> Informacion Detallada</h4>
			</div>
			<div class='modal-body text-center'>
				<?php
					$valor_otro_estado_signo = $_POST["valor_otro_estado_signo"];
					echo ($valor_otro_estado_signo == "") ? "No se ha ingreado otro estado del conductor." : $valor_otro_estado_signo;

					$consulta_Buscar_signo = "SELECT * FROM signos_fatiga WHERE id_signo = '$valor_Signo'";
					$resultado = $conexion -> query($consulta_Buscar_signo);
					$count = $resultado ->num_rows;

					if($count >=1) {
						$row = mysqli_fetch_array($resultado);
						$id_signo = $row['id_signo'];
						$nombre_Signo = $row['nombre_signo'];
						$descripcion_Signo = $row['descripcion_signo'];
					}

					echo "<div class='panel panel-default text-center'>
							<div class='panel-heading'><span class='fa fa-file-text fa-2x'></span> $nombre_Signo</div>
							<div class='panel-body'>
								<div>
									$descripcion_Signo.'<br>'
								</div>
							</div>
						</div>";

					echo $valor_otro_estado_signo;

					//Valor por opcion del signo elegido
					switch ($nombre_Signo) {
						case "Comatoso":
							$puntos_Signo_comatoso = 7;
							$acumulador_Signo = 7;
						break;
						case "Estuporoso":
							$puntos_Signo_estuporoso = 6;
							$acumulador_Signo = 6;
						break;
						case "Somnoliento":
							$puntos_Signo_somnoliento = 5;
							$acumulador_Signo = 5;
						break;
						case "Agotamiento":
							$puntos_Signo_agotamiento = 4;
							$acumulador_Signo = 4;
						break;
						case "Estres":
							$puntos_Signo_estres = 3;
							$acumulador_Signo = 3;
						break;
						case "Confuso":
							$puntos_Signo_confuso = 2;
							$acumulador_Signo = 2;
						break;
						case "Alerta":
							$puntos_Signo_alerta = 1;
							$acumulador_Signo = 1;
						break;
						default:
							echo "Hemos encontrado un erro al cargar los datos del menu Signos";
						break;
					}
				?>
			</div>
			<div class='modal-footer form-inline'>
				<button type='button' class='btn btn-danger' data-dismiss='modal'><span class="glyphicon glyphicon-remove"></span>  Salir</button>
			</div>
		</div>
	</div>
</div>
<?php
	/*$consulta_Buscar_signo = "SELECT * FROM signos_fatiga WHERE id_signo = '$valor_Signo'";
	$resultado = $conexion -> query($consulta_Buscar_signo);
	$count = $resultado ->num_rows;

	if($count >=1) {
		$row = mysqli_fetch_array($resultado);
		$id_signo = $row['id_signo'];
		$nombre_Signo = $row['nombre_signo'];
		$descripcion_Signo = $row['descripcion_signo'];
	}

	//panel_info_for_modal("panel-default", $nombre_Signo, $descripcion_Signo);

	//Valor por opcion del signo elegido
	switch ($nombre_Signo) {
		case "Comatoso":
			$puntos_Signo_comatoso = 7;
			$acumulador_Signo = 7;
		break;
		case "Estuporoso":
			$puntos_Signo_estuporoso = 6;
			$acumulador_Signo = 6;
		break;
		case "Somnoliento":
			$puntos_Signo_somnoliento = 5;
			$acumulador_Signo = 5;
		break;
		case "Agotamiento":
			$puntos_Signo_agotamiento = 4;
			$acumulador_Signo = 4;
		break;
		case "Estres":
			$puntos_Signo_estres = 3;
			$acumulador_Signo = 3;
		break;
		case "Confuso":
			$puntos_Signo_confuso = 2;
			$acumulador_Signo = 2;
		break;
		case "Alerta":
			$puntos_Signo_alerta = 1;
			$acumulador_Signo = 1;
		break;
		default:
			echo "Hemos encontrado un erro al cargar los datos del menu Signos";
		break;
	}
	show_modal("signo", "titulo de prueba", $row['nombre_signo']);*/
?>