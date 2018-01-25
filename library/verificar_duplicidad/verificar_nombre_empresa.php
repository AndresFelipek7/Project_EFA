<?php
	include "../conec.php";
	include "../../methods_backend.php";

	$nombreEmpresa = $_REQUEST["valor_nombre_empresa"];
	$desde = $_REQUEST["desde_form"];

	//Filtrar por la opcion de editar o actualizar
	/*if ($desde == "Actualizar Ruta" ) {
		//Traemos el valor del idRuta
		$id_ruta = $_REQUEST["idRuta"];
		$consulta_Traer_idRuta = "SELECT nombreEmpresa FROM reporte_ruta WHERE id_ruta = '$id_ruta'";
		$resultado = $conexion ->query($consulta_Traer_idRuta);
		$count = $resultado->num_rows;

		//Si es 1 significa que lo ha encontrado el idruta en la Bd
		if ($count == 1) {
			$row = mysqli_fetch_array($resultado);
			//Sacamos el codigo de la ruta que esta en la bd antes de la actualizacion
			$CodigoRuta_Original = $row["nombreEmpresa"];

			$consulta_Saber_si_Existe = "SELECT nombreEmpresa FROM reporte_ruta WHERE nombreEmpresa = '$nombreEmpresa'";
			$resultado_codigo = $conexion ->query($consulta_Saber_si_Existe);
			$count = $resultado_codigo->num_rows;

			//Si es 1 significa que esta en la bd y no se puede actualizar
			if ($count == 1) {
				$row = mysqli_fetch_array($resultado_codigo);
				//Sacamos el valor nuevo que se ha ingresado
				$codigoRuta_Nuevo = $row["nombreEmpresa"];

				//Si son diferentes significa que no es igual al original
				if ($CodigoRuta_Original != $codigoRuta_Nuevo) {
					echo "
						<div class='alert alert-danger'>
							<span class='fa fa-minus-circle fa-2x'></span><br>
							<label>
								El codigo de la ruta ya existe , por favor verificar
							</label>
						</div>";

					//Deshabilitamos el boton dependiendo de donde se lanzo la funcion , si fue en registro o en editar
					if ($desde == "Registro Ruta") {
						echo "<script>
							document.getElementById('registrar_ruta').disabled=true;
						</script>";
					}else {
						echo "<script>
							document.getElementById('actualizar_registro_ruta').disabled=true;
						</script>";
					}
				}else {
					//Deshabilitamos el boton dependiendo de donde se lanzo la funcion , si fue en registro o en editar
					if ($desde == "Registro Ruta") {
						echo "<script>
							document.getElementById('registrar_ruta').disabled=false;
						</script>";
					}else {
						echo "<script>
							document.getElementById('actualizar_registro_ruta').disabled=false;
						</script>";
					}
				}
			} else {
				//Deshabilitamos el boton dependiendo de donde se lanzo la funcion , si fue en registro o en editar
				if ($desde == "Registro Ruta") {
					echo "<script>
						document.getElementById('registrar_ruta').disabled=false;
					</script>";
				}else {
					echo "<script>
						document.getElementById('actualizar_registro_ruta').disabled=false;
					</script>";
				}
			}
		}else {
			echo "
				<div class='alert alert-success'>
					<span class='fa fa-check-circle fa-2x'></span><br>
					<label>
						El codigo de la ruta es correcto!!
					</label>
				</div>";

			//Deshabilitamos el boton dependiendo de donde se lanzo la funcion , si fue en registro o en editar
			if ($desde == "Registro Ruta") {
				echo "<script>
					document.getElementById('registrar_ruta').disabled=true;
				</script>";
			}else {
				echo "<script>
					document.getElementById('actualizar_registro_ruta').disabled=true;
				</script>";
			}
		}
	}else*/
	if ($desde == "Registro Empresa" ){
		$verificar_tamaño_nombre_empresa = strlen($nombreEmpresa);

		if ($verificar_tamaño_nombre_empresa > 5) {
			$consulta_Saber_si_Existe = "SELECT name_empresa FROM reporte_empresa WHERE name_empresa = '$nombreEmpresa'";
			$resultado = $conexion ->query($consulta_Saber_si_Existe);
			$count = $resultado->num_rows;

			if($count == 1) {
				message_mistake_validator("El Nombre de la Empresa ya existe.");
				enable_function_js("","nombre_empresa","registrar_empresa");
			}else {
				disable_function_js("", "nombre_empresa", "registrar_empresa");
			}
		}else {
			message_mistake_validator("El Nombre de la Empresa no es valido , es muy Corto.");
			enable_function_js("","nombre_empresa","registrar_empresa");
		}
	}

	$conexion->close();
?>