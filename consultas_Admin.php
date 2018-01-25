<!--Aqui vamos a encontrar la cantidad total de registros en cada tabla de la BD-->
<?php
	//Si hay un post significa que an entrado al modal para buscar otra fecha diferente a la del dia en que se encuentra
	if($_POST) {
		//Variables que me permiten filtrar por dia las evaluaciones realizadas y mostrarlas en la tabla
		$fecha_inicio = $_POST["buscar_fecha_evaluacion"]." "."00:00:00";
		$fecha_final = $_POST["buscar_fecha_evaluacion"]." "."23:59:59";
		$fecha_formulario_busqueda = $_POST["buscar_fecha_evaluacion"];
	}else {
		//Variables que me permiten filtrar por dia las evaluaciones realizadas y mostrarlas en la tabla
		$fecha_inicio = date("Y-m-d")." "."00:00:00";
		$fecha_final = date("Y-m-d")." "."23:59:59";
		//Sacamos la fecha cuando se realiza actual
		$fecha_formulario_busqueda = date("Y-m-d");
	}

	//Cantidad de Administradores Activos
	$total_registro = mysqli_query($conexion,"SELECT COUNT(idDatos) AS total_administrador FROM reporte_administrador_activo");
	while ($registro = mysqli_fetch_array($total_registro)) {
		$total_administrador = $registro['total_administrador'];
	}

	//Cantidad de Administradores Inactivos
	$total_registro = mysqli_query($conexion,"SELECT COUNT(idDatos) AS total_administrador FROM reporte_administrador_inactivo");
	while ($registro = mysqli_fetch_array($total_registro)) {
		$total_administrador_inactivo = $registro['total_administrador'];
	}

	//Cantidad de evaluadores Activos
	$total_registro = mysqli_query($conexion,"SELECT COUNT(idDatos) AS total_evaluadores FROM reporte_usuario_activo");
	while ($registro = mysqli_fetch_array($total_registro)) {
		$total_evaluadores = $registro['total_evaluadores'];
	}

	//Cantidad de evaluadores Inactivos
	$total_registro = mysqli_query($conexion,"SELECT COUNT(idDatos) AS total_evaluadores FROM reporte_usuario_inactivo");
	while ($registro = mysqli_fetch_array($total_registro)) {
		$total_evaluadores_inactivos = $registro['total_evaluadores'];
	}

	//Cantidad de conductores Activos
	$total_registro = mysqli_query($conexion,"SELECT COUNT(id_conductor) AS total_conductores FROM reporte_conductor_activo");
	while ($registro = mysqli_fetch_array($total_registro)) {
		$total_conductores = $registro['total_conductores'];
	}

	//Cantidad de conductores Inactivos
	$total_registro_inactivo = mysqli_query($conexion,"SELECT COUNT(idDatos) AS total_conductores_inactivos FROM reporte_conductor_inactivo");
	while ($registro = mysqli_fetch_array($total_registro_inactivo)) {
		$total_conductores_inactivo = $registro['total_conductores_inactivos'];
	}

	//Canttidad de rutas
	$total_registro = mysqli_query($conexion,"SELECT COUNT(id_ruta) AS total_ruta FROM rutas");
	while ($registro = mysqli_fetch_array($total_registro)) {
		$total_ruta = $registro['total_ruta'];
	}

	//Cantidad de Empresa
	$total_registro = mysqli_query($conexion,"SELECT COUNT(id_empresa) AS total_empresas FROM empresa");
	while ($registro = mysqli_fetch_array($total_registro)) {
		$total_empresas = $registro['total_empresas'];
	}

	//Cantidad de Vehiculos
	$total_registro = mysqli_query($conexion,"SELECT COUNT(id_vehiculo) AS total_vehiculo FROM vehiculo");
	while ($registro = mysqli_fetch_array($total_registro)) {
		$total_vehiculos = $registro['total_vehiculo'];
	}

	//Cantidad de tipo documento
	$total_registro = mysqli_query($conexion,"SELECT COUNT(id_tipo_documento) AS total_tipo_documento FROM tipo_documento");
	while ($registro = mysqli_fetch_array($total_registro)) {
		$total_t_documento = $registro['total_tipo_documento'];
	}

	//Cantidad de roles
	$total_registro = mysqli_query($conexion,"SELECT COUNT(id_rol) AS total_perfil FROM roles");
	while ($registro = mysqli_fetch_array($total_registro)) {
		$total_roles = $registro['total_perfil'];
	}

	//Cantidad de Evaluaciones
	$total_registro = mysqli_query($conexion,"SELECT COUNT(id_evaluacion) AS total_evaluacion FROM evaluacion_fatiga");
	while ($registro = mysqli_fetch_array($total_registro)) {
		$total_evaluaciones = $registro['total_evaluacion'];
	}

	//Cantidad de sintomas para el menu sugerencias
	$total_registro = mysqli_query($conexion,"SELECT COUNT(id_sugerencia) AS total_sintomas FROM reporte_sintomas_sugerencia");
	while ($registro = mysqli_fetch_array($total_registro)) {
		$total_sugerencia_sintomas = $registro['total_sintomas'];
	}

	//Cantidad de signos para el menu sugerencias
	$total_registro = mysqli_query($conexion,"SELECT COUNT(id_sugerencia) AS total_signo FROM reporte_signo_sugerencia");
	while ($registro = mysqli_fetch_array($total_registro)) {
		$total_sugerencia_signo = $registro['total_signo'];
	}

	//Cantidad de Alteraciones Emocionales para el menu sugerencias
	$total_registro = mysqli_query($conexion,"SELECT COUNT(id_sugerencia) AS total_a_emocional FROM reporte_a_emocional_sugerencia");
	while ($registro = mysqli_fetch_array($total_registro)) {
		$total_a_emocional_sugerencia = $registro['total_a_emocional'];
	}

	//Cantidad de Alteraciones Neurologica para el menu sugerencias
	$total_registro = mysqli_query($conexion,"SELECT COUNT(id_sugerencia) AS total_a_neurologico FROM reporte_a_neurologico_sugerencia");
	while ($registro = mysqli_fetch_array($total_registro)) {
		$total_a_neurologico_sugerencia = $registro['total_a_neurologico'];
	}

	//Cantidad de sintomas para su respectivo menu en el rol admin
	$total_registro = mysqli_query($conexion,"SELECT COUNT(id_sintoma) AS total_sintomas FROM sintomas");
	while ($registro = mysqli_fetch_array($total_registro)) {
		$total_sintomas = $registro['total_sintomas'];
	}

	//Cantidad de signos para su respectivo menu en el rol admin
	$total_registro = mysqli_query($conexion,"SELECT COUNT(id_signo) AS total_signo FROM signos_fatiga");
	while ($registro = mysqli_fetch_array($total_registro)) {
		$total_signo = $registro['total_signo'];
	}

	//Cantidad de Alteraciones Emocionales para su respectivo menu en el rol admin
	$total_registro = mysqli_query($conexion,"SELECT COUNT(id_a_emocional) AS total_a_emocional FROM alteraciones_emocionales");
	while ($registro = mysqli_fetch_array($total_registro)) {
		$total_a_emocional = $registro['total_a_emocional'];
	}

	//Cantidad de Alteraciones Neurologica para su respectivo menu en el rol admin
	$total_registro = mysqli_query($conexion,"SELECT COUNT(id_a_neurologico) AS total_a_neurologico FROM alteraciones_neurologicas");
	while ($registro = mysqli_fetch_array($total_registro)) {
		$total_a_neurologico = $registro['total_a_neurologico'];
	}

	//Cantidad de evaluaciones por dia
	$total_registro = mysqli_query($conexion,"SELECT COUNT(id_evaluacion) AS diario_evaluaciones FROM reporte_evaluacion_fatiga WHERE fecha_hora >='$fecha_inicio' AND fecha_hora <= '$fecha_final'");
	while ($registro = mysqli_fetch_array($total_registro)) {
		$total_dia_evaluacion = $registro['diario_evaluaciones'];
		//creamos esta variable de sesion para poder colocar el total de todas las evaluaciones cuando exportemos todas las evaluaciones de un dia
		$_SESSION['all_day'] = $total_dia_evaluacion;
	}

	//Saber la cantidad de conductores con nivel alto , medio y bajo dependiendo de una fecha es decir , el total solo es por la fecha y no el total de todas las evaluaciones realizadas
		//Saber la cantidad de conductores con nivel alto en la fecha seleccionada
		$total_registro = mysqli_query($conexion,"SELECT COUNT(id_evaluacion) AS total_nivel_alto FROM reporte_evaluacion_fatiga WHERE nivel_fatiga = '3' AND fecha_hora >='$fecha_inicio' AND fecha_hora <= '$fecha_final'");
		while ($registro = mysqli_fetch_array($total_registro)) {
			$total_Nivel_alto = $registro['total_nivel_alto'];
		}

		//Saber la cantidad de conductores con nivel medio en la fecha de la evaluacion seleccionada
		$total_registro = mysqli_query($conexion,"SELECT COUNT(id_evaluacion) AS total_nivel_medio FROM reporte_evaluacion_fatiga WHERE nivel_fatiga = '2' AND fecha_hora >='$fecha_inicio' AND fecha_hora <= '$fecha_final'");
		while ($registro = mysqli_fetch_array($total_registro)) {
			$total_Nivel_medio = $registro['total_nivel_medio'];
		}

		//Saber la cantidad de conductores con nivel bajo en la fecha de la evaluacion seleccionada
		$total_registro = mysqli_query($conexion,"SELECT COUNT(id_evaluacion) AS total_nivel_bajo FROM reporte_evaluacion_fatiga WHERE nivel_fatiga = '1' AND fecha_hora >='$fecha_inicio' AND fecha_hora <= '$fecha_final'");
		while ($registro = mysqli_fetch_array($total_registro)) {
			$total_Nivel_bajo = $registro['total_nivel_bajo'];
		}

	//Saber la cantidad de conductores con nivel alto , medio y bajo en todas las evaluaciones Realizadas
		//Saber la cantidad de conductores con nivel alto en la fecha seleccionada
		$total_registro = mysqli_query($conexion,"SELECT COUNT(id_evaluacion) AS total_nivel_alto FROM reporte_evaluacion_fatiga WHERE nivel_fatiga = '3'");
		while ($registro = mysqli_fetch_array($total_registro)) {
			$total_Nivel_alto_general = $registro['total_nivel_alto'];
		}

		//Saber la cantidad de conductores con nivel medio en la fecha de la evaluacion seleccionada
		$total_registro = mysqli_query($conexion,"SELECT COUNT(id_evaluacion) AS total_nivel_medio FROM reporte_evaluacion_fatiga WHERE nivel_fatiga = '2'");
		while ($registro = mysqli_fetch_array($total_registro)) {
			$total_Nivel_medio_general = $registro['total_nivel_medio'];
		}

		//Saber la cantidad de conductores con nivel bajo en la fecha de la evaluacion seleccionada
		$total_registro = mysqli_query($conexion,"SELECT COUNT(id_evaluacion) AS total_nivel_bajo FROM reporte_evaluacion_fatiga WHERE nivel_fatiga = '1'");
		while ($registro = mysqli_fetch_array($total_registro)) {
			$total_Nivel_bajo_general = $registro['total_nivel_bajo'];
		}


		//Saber la cantidad de hombres evuadores activos
		$total_Hombres_Activos = mysqli_query($conexion,"SELECT COUNT(idDatos) AS total_hombres_activo FROM reporte_usuario_activo WHERE sexo = 'M'");
		while ($registro = mysqli_fetch_array($total_Hombres_Activos)) {
			$Evaluadores_Hombres_Activos = $registro['total_hombres_activo'];
		}

		//Saber cuantas mujeres evaluadoras activas hay
		$total_Mujeres_Activos = mysqli_query($conexion,"SELECT COUNT(idDatos) AS total_mujeres_activo FROM reporte_usuario_activo WHERE sexo = 'F'");
		while ($registro = mysqli_fetch_array($total_Mujeres_Activos)) {
			$Evaluadores_Mujeres_Activos = $registro['total_mujeres_activo'];
		}

		//Saber cuantos hombres evaluadores hay inactivos
		$total_Hombres_Inactivos = mysqli_query($conexion,"SELECT COUNT(idDatos) AS total_hombres_inactivos FROM reporte_usuario_inactivo WHERE sexo = 'M'");
		while ($registro = mysqli_fetch_array($total_Hombres_Inactivos)) {
			$Evaluadores_Hombres_Inactivos = $registro['total_hombres_inactivos'];
		}

		//Saber cuantas mujeres inactivas con rol evaluador hay en el sistema
		$total_Mujeres_Inactivos = mysqli_query($conexion,"SELECT COUNT(idDatos) AS total_mujeres_inactivos FROM reporte_usuario_inactivo WHERE sexo = 'F'");
		while ($registro = mysqli_fetch_array($total_Mujeres_Inactivos)) {
			$Evaluadores_Mujeres_Inactivos = $registro['total_mujeres_inactivos'];
		}

		//Saber la cantidad de hombres Conductores activos
		$total_Hombres_Activos = mysqli_query($conexion,"SELECT COUNT(idDatos) AS total_hombres_activo FROM reporte_conductor_activo WHERE sexo = 'M'");
		while ($registro = mysqli_fetch_array($total_Hombres_Activos)) {
			$Conductor_Hombres_Activos = $registro['total_hombres_activo'];
		}

		//Saber la cantidad de Mujeres Conductores activos
		$total_Hombres_Activos = mysqli_query($conexion,"SELECT COUNT(idDatos) AS total_mujeres_activo FROM reporte_conductor_activo WHERE sexo = 'F'");
		while ($registro = mysqli_fetch_array($total_Hombres_Activos)) {
			$Conductor_Mujeres_Activos = $registro['total_mujeres_activo'];
		}

		//Saber cuantos hombres Conductores hay inactivos
		$total_Hombres_Inactivos = mysqli_query($conexion,"SELECT COUNT(idDatos) AS total_hombres_inactivos FROM reporte_conductor_inactivo WHERE sexo = 'M'");
		while ($registro = mysqli_fetch_array($total_Hombres_Inactivos)) {
			$Conductor_Hombres_Inactivos = $registro['total_hombres_inactivos'];
		}

		//Saber cuantos hombres Conductores hay inactivos
		$total_Mujeres_Inactivos = mysqli_query($conexion,"SELECT COUNT(idDatos) AS total_mujeres_inactivos FROM reporte_conductor_inactivo WHERE sexo = 'F'");
		while ($registro = mysqli_fetch_array($total_Mujeres_Inactivos)) {
			$Conductor_Mujeres_Inactivos = $registro['total_mujeres_inactivos'];
		}

		//Cantidad de Administradores Hombres Activos
		$total_registro = mysqli_query($conexion,"SELECT COUNT(idDatos) AS total_administrador FROM reporte_administrador_activo WHERE sexo = 'M'");
		while ($registro = mysqli_fetch_array($total_registro)) {
			$administradores_Hombres_Activo = $registro['total_administrador'];
		}

		//Cantidad de Administradores Mujeres Activos
		$total_registro = mysqli_query($conexion,"SELECT COUNT(idDatos) AS total_administrador FROM reporte_administrador_activo WHERE sexo = 'F'");
		while ($registro = mysqli_fetch_array($total_registro)) {
			$administradores_Mujeres_Activo = $registro['total_administrador'];
		}

		//Cantidad de Administradores Hombres Inactivos
		$total_registro = mysqli_query($conexion,"SELECT COUNT(idDatos) AS total_administrador FROM reporte_administrador_inactivo WHERE sexo = 'M'");
		while ($registro = mysqli_fetch_array($total_registro)) {
			$administradores_Hombres_Inactivo = $registro['total_administrador'];
		}

		//Cantidad de Administradores Mujeres Inactivo
		$total_registro = mysqli_query($conexion,"SELECT COUNT(idDatos) AS total_administrador FROM reporte_administrador_inactivo WHERE sexo = 'F'");
		while ($registro = mysqli_fetch_array($total_registro)) {
			$administradores_Mujeres_Inactivo = $registro['total_administrador'];
		}
?>