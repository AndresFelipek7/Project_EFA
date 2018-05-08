<?php
	//Por cada 4 Horas conduciendo constante se debe decansar 1 Horas
	//Por cada Horas conduciendo se debe Descansar 15 minutos
	switch ($traer_Valores_interrogatorio[2]) {
		case 1:
			//El valor en la variable recomendacion_Descansar_conducir es en minutos
			$recomendacion_Descansar_conducir = "15";
			$tiempo_Descansar_por_partes = $recomendacion_Descansar_conducir/3;

			alert_sleep_driver("success", "tiempo Total de Descanso", "El conductor debe Descansar 15 Minutos por conducir $traer_Valores_interrogatorio[2]  Hora");
			/*echo "<div class='alert alert-success'>
					<strong>Tiempo Total de Descanso</strong><br> El conductor debe Descansar 15 Minutos por conducir $traer_Valores_interrogatorio[2]  Hora
				</div>";*/

			if($tiempo_Descansar_por_partes >= 60 ) {
				$sacar_Minutos = $tiempo_Descansar_por_partes-60;
				if($sacar_Minutos !=0) {
					echo "<div class='container' style='margin-left:40px;'>
							<div class='row col-md-4'>
								<div class='alert alert-info'>
									<strong>Descansar Antes del viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-warning'>
									<strong>Durante el Viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-danger'>
									<strong>Despues del viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
					</div>";
				}else{
					echo "<div class='container' style='margin-left:40px;'>
							<div class='row col-md-4'>
								<div class='alert alert-info'>
									<strong>Descansar Antes del viaje</strong><br>
									1 Hora
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-warning'>
									<strong>Durante el Viaje</strong><br>
									1 Hora
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-danger'>
									<strong>Despues del viaje</strong><br>
									1 Hora
								</div>
							</div>
					</div>";
				}
			}else{
				echo "<div class='container' style='margin-left:40px;'>
						<div class='row col-md-4'>
							<div class='alert alert-info'>
								<strong>Descansar Antes del viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
						<div class='row col-md-4'>
							<div class='alert alert-warning'>
								<strong>Durante el Viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
						<div class='row col-md-4'>
							<div class='alert alert-danger'>
								<strong>Despues del viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
					</div>";
			}

			break;
		case 2:
			$recomendacion_Descansar_conducir = "30";
			$tiempo_Descansar_por_partes = $recomendacion_Descansar_conducir/3;

			echo "<div class='alert alert-success'>
					<strong>Tiempo Total de Descanso</strong><br> El conductor debe Descansar 30 Minutos por conducir $traer_Valores_interrogatorio[2]  Horas
				</div>";

			if($tiempo_Descansar_por_partes >= 60 ) {
				$sacar_Minutos = $tiempo_Descansar_por_partes-60;
				if($sacar_Minutos !=0) {
					echo "<div class='container' style='margin-left:40px;'>
							<div class='row col-md-4'>
								<div class='alert alert-info'>
									<strong>Descansar Antes del viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-warning'>
									<strong>Durante el Viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-danger'>
									<strong>Despues del viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
					</div>";
				}else{
					echo "<div class='container' style='margin-left:40px;'>
							<div class='row col-md-4'>
								<div class='alert alert-info'>
									<strong>Descansar Antes del viaje</strong><br>
									1 Hora
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-warning'>
									<strong>Durante el Viaje</strong><br>
									1 Hora
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-danger'>
									<strong>Despues del viaje</strong><br>
									1 Hora
								</div>
							</div>
					</div>";
				}
			}else{
				echo "<div class='container' style='margin-left:40px;'>
						<div class='row col-md-4'>
							<div class='alert alert-info'>
								<strong>Descansar Antes del viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
						<div class='row col-md-4'>
							<div class='alert alert-warning'>
								<strong>Durante el Viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
						<div class='row col-md-4'>
							<div class='alert alert-danger'>
								<strong>Despues del viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
					</div>";
			}
			break;
		case 3:
			$recomendacion_Descansar_conducir = "45";
			$tiempo_Descansar_por_partes = $recomendacion_Descansar_conducir/3;

			echo "<div class='alert alert-success'>
					<strong>Tiempo Total de Descanso</strong><br> El conductor debe Descansar 45 Minutos por conducir $traer_Valores_interrogatorio[2]  Horas
				</div>";

			if($tiempo_Descansar_por_partes >= 60 ) {
				$sacar_Minutos = $tiempo_Descansar_por_partes-60;
				if($sacar_Minutos !=0) {
					echo "<div class='container' style='margin-left:40px;'>
							<div class='row col-md-4'>
								<div class='alert alert-info'>
									<strong>Descansar Antes del viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-warning'>
									<strong>Durante el Viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-danger'>
									<strong>Despues del viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
					</div>";
				}else{
					echo "<div class='container' style='margin-left:40px;'>
							<div class='row col-md-4'>
								<div class='alert alert-info'>
									<strong>Descansar Antes del viaje</strong><br>
									1 Hora
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-warning'>
									<strong>Durante el Viaje</strong><br>
									1 Hora
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-danger'>
									<strong>Despues del viaje</strong><br>
									1 Hora
								</div>
							</div>
					</div>";
				}
			}else{
				echo "<div class='container' style='margin-left:40px;'>
						<div class='row col-md-4'>
							<div class='alert alert-info'>
								<strong>Descansar Antes del viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
						<div class='row col-md-4'>
							<div class='alert alert-warning'>
								<strong>Durante el Viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
						<div class='row col-md-4'>
							<div class='alert alert-danger'>
								<strong>Despues del viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
					</div>";
			}
			break;
		case 4:
			$recomendacion_Descansar_conducir = "60";
			$tiempo_Descansar_por_partes = $recomendacion_Descansar_conducir/3;

			echo "<div class='alert alert-success'>
					<strong>Tiempo Total de Descanso</strong><br> El conductor debe Descansar 1 Hora por conducir $traer_Valores_interrogatorio[2]  Horas
				</div>";

			if($tiempo_Descansar_por_partes >= 60 ) {
				$sacar_Minutos = $tiempo_Descansar_por_partes-60;
				if($sacar_Minutos !=0) {
					echo "<div class='container' style='margin-left:40px;'>
							<div class='row col-md-4'>
								<div class='alert alert-info'>
									<strong>Descansar Antes del viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-warning'>
									<strong>Durante el Viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-danger'>
									<strong>Despues del viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
					</div>";
				}else{
					echo "<div class='container' style='margin-left:40px;'>
							<div class='row col-md-4'>
								<div class='alert alert-info'>
									<strong>Descansar Antes del viaje</strong><br>
									1 Hora
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-warning'>
									<strong>Durante el Viaje</strong><br>
									1 Hora
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-danger'>
									<strong>Despues del viaje</strong><br>
									1 Hora
								</div>
							</div>
					</div>";
				}
			}else{
				echo "<div class='container' style='margin-left:40px;'>
						<div class='row col-md-4'>
							<div class='alert alert-info'>
								<strong>Descansar Antes del viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
						<div class='row col-md-4'>
							<div class='alert alert-warning'>
								<strong>Durante el Viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
						<div class='row col-md-4'>
							<div class='alert alert-danger'>
								<strong>Despues del viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
					</div>";
			}

			break;
		case 5:
			//Este valor es la suma de una los minutos de 1 hora que son 60 mas los 15 minutos por fuera que dan 75 Minutos
			$recomendacion_Descansar_conducir = "75";
			$tiempo_Descansar_por_partes = $recomendacion_Descansar_conducir/3;

			echo "<div class='alert alert-success'>
					<strong>Tiempo Total de Descanso</strong><br> El conductor debe Descansar 1 Hora 15 Minutos por conducir $traer_Valores_interrogatorio[2]  Horas
				</div>";

			if($tiempo_Descansar_por_partes >= 60 ) {
				$sacar_Minutos = $tiempo_Descansar_por_partes-60;
				if($sacar_Minutos !=0) {
					echo "<div class='container' style='margin-left:40px;'>
							<div class='row col-md-4'>
								<div class='alert alert-info'>
									<strong>Descansar Antes del viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-warning'>
									<strong>Durante el Viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-danger'>
									<strong>Despues del viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
					</div>";
				}else{
					echo "<div class='container' style='margin-left:40px;'>
							<div class='row col-md-4'>
								<div class='alert alert-info'>
									<strong>Descansar Antes del viaje</strong><br>
									1 Hora
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-warning'>
									<strong>Durante el Viaje</strong><br>
									1 Hora
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-danger'>
									<strong>Despues del viaje</strong><br>
									1 Hora
								</div>
							</div>
					</div>";
				}
			}else{
				echo "<div class='container' style='margin-left:40px;'>
						<div class='row col-md-4'>
							<div class='alert alert-info'>
								<strong>Descansar Antes del viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
						<div class='row col-md-4'>
							<div class='alert alert-warning'>
								<strong>Durante el Viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
						<div class='row col-md-4'>
							<div class='alert alert-danger'>
								<strong>Despues del viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
					</div>";
			}

			break;
		case 6:
			//Este valor es la suma de una los minutos de 1 hora que son 60 mas los 30 minutos por fuera que dan 90 Minutos
			$recomendacion_Descansar_conducir = "90";
			$tiempo_Descansar_por_partes = $recomendacion_Descansar_conducir/3;

			echo "<div class='alert alert-success'>
					<strong>Tiempo Total de Descanso</strong><br> El conductor debe Descansar 1 Hora 30 Minutos por conducir $traer_Valores_interrogatorio[2]  Horas
				</div>";

			if($tiempo_Descansar_por_partes >= 60 ) {
				$sacar_Minutos = $tiempo_Descansar_por_partes-60;
				if($sacar_Minutos !=0) {
					echo "<div class='container' style='margin-left:40px;'>
							<div class='row col-md-4'>
								<div class='alert alert-info'>
									<strong>Descansar Antes del viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-warning'>
									<strong>Durante el Viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-danger'>
									<strong>Despues del viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
					</div>";
				}else{
					echo "<div class='container' style='margin-left:40px;'>
							<div class='row col-md-4'>
								<div class='alert alert-info'>
									<strong>Descansar Antes del viaje</strong><br>
									1 Hora
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-warning'>
									<strong>Durante el Viaje</strong><br>
									1 Hora
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-danger'>
									<strong>Despues del viaje</strong><br>
									1 Hora
								</div>
							</div>
					</div>";
				}
			}else{
				echo "<div class='container' style='margin-left:40px;'>
						<div class='row col-md-4'>
							<div class='alert alert-info'>
								<strong>Descansar Antes del viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
						<div class='row col-md-4'>
							<div class='alert alert-warning'>
								<strong>Durante el Viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
						<div class='row col-md-4'>
							<div class='alert alert-danger'>
								<strong>Despues del viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
					</div>";
			}

			break;
		case 7:
			//Este valor es la suma de una los minutos de 1 hora que son 60 mas los 45 minutos por fuera que dan 105 Minutos
			$recomendacion_Descansar_conducir = "105";
			$tiempo_Descansar_por_partes = $recomendacion_Descansar_conducir/3;

			echo "<div class='alert alert-success'>
					<strong>Tiempo Total de Descanso</strong><br> El conductor debe Descansar 1 Hora 45 Minutos por conducir $traer_Valores_interrogatorio[2]  Horas
				</div>";

			if($tiempo_Descansar_por_partes >= 60 ) {
				$sacar_Minutos = $tiempo_Descansar_por_partes-60;
				if($sacar_Minutos !=0) {
					echo "<div class='container' style='margin-left:40px;'>
							<div class='row col-md-4'>
								<div class='alert alert-info'>
									<strong>Descansar Antes del viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-warning'>
									<strong>Durante el Viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-danger'>
									<strong>Despues del viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
					</div>";
				}else{
					echo "<div class='container' style='margin-left:40px;'>
							<div class='row col-md-4'>
								<div class='alert alert-info'>
									<strong>Descansar Antes del viaje</strong><br>
									1 Hora
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-warning'>
									<strong>Durante el Viaje</strong><br>
									1 Hora
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-danger'>
									<strong>Despues del viaje</strong><br>
									1 Hora
								</div>
							</div>
					</div>";
				}
			}else{
				echo "<div class='container' style='margin-left:40px;'>
						<div class='row col-md-4'>
							<div class='alert alert-info'>
								<strong>Descansar Antes del viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
						<div class='row col-md-4'>
							<div class='alert alert-warning'>
								<strong>Durante el Viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
						<div class='row col-md-4'>
							<div class='alert alert-danger'>
								<strong>Despues del viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
					</div>";
			}

			break;
		case 8:
			//Este valor es la suma de una los minutos de 2 hora que son 120
			$recomendacion_Descansar_conducir = "120";
			$tiempo_Descansar_por_partes = $recomendacion_Descansar_conducir/3;

			echo "<div class='alert alert-success'>
					<strong>Tiempo Total de Descanso</strong><br> El conductor debe Descansar 2 Horas por conducir $traer_Valores_interrogatorio[2]  Horas
				</div>";

			if($tiempo_Descansar_por_partes >= 60 ) {
				$sacar_Minutos = $tiempo_Descansar_por_partes-60;
				if($sacar_Minutos !=0) {
					echo "<div class='container' style='margin-left:40px;'>
							<div class='row col-md-4'>
								<div class='alert alert-info'>
									<strong>Descansar Antes del viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-warning'>
									<strong>Durante el Viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-danger'>
									<strong>Despues del viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
					</div>";
				}else{
					echo "<div class='container' style='margin-left:40px;'>
							<div class='row col-md-4'>
								<div class='alert alert-info'>
									<strong>Descansar Antes del viaje</strong><br>
									1 Hora
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-warning'>
									<strong>Durante el Viaje</strong><br>
									1 Hora
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-danger'>
									<strong>Despues del viaje</strong><br>
									1 Hora
								</div>
							</div>
					</div>";
				}
			}else{
				echo "<div class='container' style='margin-left:40px;'>
						<div class='row col-md-4'>
							<div class='alert alert-info'>
								<strong>Descansar Antes del viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
						<div class='row col-md-4'>
							<div class='alert alert-warning'>
								<strong>Durante el Viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
						<div class='row col-md-4'>
							<div class='alert alert-danger'>
								<strong>Despues del viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
					</div>";
			}

			break;
		case 9:
			//Este valor es la suma de una los minutos de 2 hora que son 120 y 15 minutos que dan un total de 135
			$recomendacion_Descansar_conducir = "135";
			$tiempo_Descansar_por_partes = $recomendacion_Descansar_conducir/3;

			echo "<div class='alert alert-success'>
					<strong>Tiempo Total de Descanso</strong><br> El conductor debe Descansar 2 Horas 15 Minutos por conducir $traer_Valores_interrogatorio[2]  Horas
				</div>";

			if($tiempo_Descansar_por_partes >= 60 ) {
				$sacar_Minutos = $tiempo_Descansar_por_partes-60;
				if($sacar_Minutos !=0) {
					echo "<div class='container' style='margin-left:40px;'>
							<div class='row col-md-4'>
								<div class='alert alert-info'>
									<strong>Descansar Antes del viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-warning'>
									<strong>Durante el Viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-danger'>
									<strong>Despues del viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
					</div>";
				}else{
					echo "<div class='container' style='margin-left:40px;'>
							<div class='row col-md-4'>
								<div class='alert alert-info'>
									<strong>Descansar Antes del viaje</strong><br>
									1 Hora
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-warning'>
									<strong>Durante el Viaje</strong><br>
									1 Hora
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-danger'>
									<strong>Despues del viaje</strong><br>
									1 Hora
								</div>
							</div>
					</div>";
				}
			}else{
				echo "<div class='container' style='margin-left:40px;'>
						<div class='row col-md-4'>
							<div class='alert alert-info'>
								<strong>Descansar Antes del viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
						<div class='row col-md-4'>
							<div class='alert alert-warning'>
								<strong>Durante el Viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
						<div class='row col-md-4'>
							<div class='alert alert-danger'>
								<strong>Despues del viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
					</div>";
			}

			break;
		case 10:
			//Este valor es la suma de una los minutos de 2 hora que son 120 y 30 minutos que dan un total de 150
			$recomendacion_Descansar_conducir = "150";
			$tiempo_Descansar_por_partes = $recomendacion_Descansar_conducir/3;
			//Asignacion del tiempo destino a la variable tiempo_ruta
			$tiempo_ruta = $_POST["tiempo_destino"];
			$vector_tiempo_llegada = explode(" ", $tiempo_ruta);

			echo "<div class='alert alert-success'>
					<strong>Tiempo Total de Descanso</strong><br> El conductor debe Descansar 2 Horas 30 Minutos por conducir $traer_Valores_interrogatorio[2]  Horas
				</div>";

			if($vector_tiempo_llegada[0] == "") {
				echo $vector_tiempo_llegada[1];
			}else{

			}


			if($tiempo_Descansar_por_partes >= 60 ) {
				$sacar_Minutos = $tiempo_Descansar_por_partes-60;
				if($sacar_Minutos !=0) {
					echo "<div class='container' style='margin-left:40px;'>
							<div class='row col-md-4'>
								<div class='alert alert-info'>
									<strong>Descansar Antes del viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-warning'>
									<strong>Durante el Viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-danger'>
									<strong>Despues del viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
					</div>";
				}else{
					echo "<div class='container' style='margin-left:40px;'>
							<div class='row col-md-4'>
								<div class='alert alert-info'>
									<strong>Descansar Antes del viaje</strong><br>
									1 Hora
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-warning'>
									<strong>Durante el Viaje</strong><br>
									1 Hora
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-danger'>
									<strong>Despues del viaje</strong><br>
									1 Hora
								</div>
							</div>
					</div>";
				}
			}else{
				echo "<div class='container' style='margin-left:40px;'>
						<div class='row col-md-4'>
							<div class='alert alert-info'>
								<strong>Descansar Antes del viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
						<div class='row col-md-4'>
							<div class='alert alert-warning'>
								<strong>Durante el Viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
						<div class='row col-md-4'>
							<div class='alert alert-danger'>
								<strong>Despues del viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
					</div>";
			}

			break;
		case 11:
			//Este valor es la suma de una los minutos de 2 hora que son 120 y 45 minutos que dan un total de 165
			$recomendacion_Descansar_conducir = "165";
			$tiempo_Descansar_por_partes = $recomendacion_Descansar_conducir/3;

			echo "<div class='alert alert-success'>
					<strong>Tiempo Total de Descanso</strong><br> El conductor debe Descansar 2 Horas 45 Minutos por conducir $traer_Valores_interrogatorio[2]  Horas
				</div>";

			if($tiempo_Descansar_por_partes >= 60 ) {
				$sacar_Minutos = $tiempo_Descansar_por_partes-60;
				if($sacar_Minutos !=0) {
					echo "<div class='container' style='margin-left:40px;'>
							<div class='row col-md-4'>
								<div class='alert alert-info'>
									<strong>Descansar Antes del viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-warning'>
									<strong>Durante el Viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-danger'>
									<strong>Despues del viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
					</div>";
				}else{
					echo "<div class='container' style='margin-left:40px;'>
							<div class='row col-md-4'>
								<div class='alert alert-info'>
									<strong>Descansar Antes del viaje</strong><br>
									1 Hora
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-warning'>
									<strong>Durante el Viaje</strong><br>
									1 Hora
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-danger'>
									<strong>Despues del viaje</strong><br>
									1 Hora
								</div>
							</div>
					</div>";
				}
			}else{
				echo "<div class='container' style='margin-left:40px;'>
						<div class='row col-md-4'>
							<div class='alert alert-info'>
								<strong>Descansar Antes del viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
						<div class='row col-md-4'>
							<div class='alert alert-warning'>
								<strong>Durante el Viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
						<div class='row col-md-4'>
							<div class='alert alert-danger'>
								<strong>Despues del viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
					</div>";
			}

			break;
		case 12:
			//Este valor es la suma de una los minutos de 3 horas que son 180 minutos
			$recomendacion_Descansar_conducir = "180";
			$tiempo_Descansar_por_partes = $recomendacion_Descansar_conducir/3;

			echo "<div class='alert alert-success'>
					<strong>Tiempo Total de Descanso</strong><br> El conductor debe Descansar 3 Horas por conducir $traer_Valores_interrogatorio[2]  Hora
				</div>";

			if($tiempo_Descansar_por_partes >= 60 ) {
				$sacar_Minutos = $tiempo_Descansar_por_partes-60;
				if($sacar_Minutos !=0) {
					echo "<div class='container' style='margin-left:40px;'>
							<div class='row col-md-4'>
								<div class='alert alert-info'>
									<strong>Descansar Antes del viaje</strong><br>
									1 Horas $sacar_Minutos Minutos
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-warning'>
									<strong>Durante el Viaje</strong><br>
									1 Horas $sacar_Minutos Minutos
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-danger'>
									<strong>Despues del viaje</strong><br>
									1 Horas $sacar_Minutos Minutos
								</div>
							</div>
					</div>";
				}else{
					echo "<div class='container' style='margin-left:40px;'>
							<div class='row col-md-4'>
								<div class='alert alert-info'>
									<strong>Descansar Antes del viaje</strong><br>
									1 Hora
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-warning'>
									<strong>Durante el Viaje</strong><br>
									1 Hora
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-danger'>
									<strong>Despues del viaje</strong><br>
									1 Hora
								</div>
							</div>
					</div>";
				}
			}else{
				echo "<div class='container' style='margin-left:40px;'>
						<div class='row col-md-4'>
							<div class='alert alert-info'>
								<strong>Descansar Antes del viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
						<div class='row col-md-4'>
							<div class='alert alert-warning'>
								<strong>Durante el Viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
						<div class='row col-md-4'>
							<div class='alert alert-danger'>
								<strong>Despues del viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
					</div>";
			}

			break;
		case 13:
			//Este valor es la suma de una los minutos de 3 horas que son 180 minutos y 15 minutos da un total de 195
			$recomendacion_Descansar_conducir = "195";
			$tiempo_Descansar_por_partes = $recomendacion_Descansar_conducir/3;

			echo "<div class='alert alert-success'>
					<strong>Tiempo Total de Descanso</strong><br> El conductor debe Descansar 3 Horas 15 Minutos por conducir $traer_Valores_interrogatorio[2]  Horas
				</div>";

			if($tiempo_Descansar_por_partes >= 60 ) {
				$sacar_Minutos = $tiempo_Descansar_por_partes-60;
				if($sacar_Minutos !=0) {
					echo "<div class='container' style='margin-left:40px;'>
							<div class='row col-md-4'>
								<div class='alert alert-info'>
									<strong>Descansar Antes del viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-warning'>
									<strong>Durante el Viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-danger'>
									<strong>Despues del viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
					</div>";
				}else{
					echo "<div class='container' style='margin-left:40px;'>
							<div class='row col-md-4'>
								<div class='alert alert-info'>
									<strong>Descansar Antes del viaje</strong><br>
									1 Hora
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-warning'>
									<strong>Durante el Viaje</strong><br>
									1 Hora
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-danger'>
									<strong>Despues del viaje</strong><br>
									1 Hora
								</div>
							</div>
					</div>";
				}
			}else{
				echo "<div class='container' style='margin-left:40px;'>
						<div class='row col-md-4'>
							<div class='alert alert-info'>
								<strong>Descansar Antes del viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
						<div class='row col-md-4'>
							<div class='alert alert-warning'>
								<strong>Durante el Viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
						<div class='row col-md-4'>
							<div class='alert alert-danger'>
								<strong>Despues del viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
					</div>";
			}

			break;
		case 14:
			//Este valor es la suma de una los minutos de 3 horas que son 180 minutos y 30 minutos da un total de 210
			$recomendacion_Descansar_conducir = "210";
			$tiempo_Descansar_por_partes = $recomendacion_Descansar_conducir/3;

			echo "<div class='alert alert-success'>
					<strong>Tiempo Total de Descanso</strong><br> El conductor debe Descansar 3 Horas 30 Minutos por conducir $traer_Valores_interrogatorio[2]  Horas
				</div>";

			if($tiempo_Descansar_por_partes >= 60 ) {
				$sacar_Minutos = $tiempo_Descansar_por_partes-60;
				if($sacar_Minutos !=0) {
					echo "<div class='container' style='margin-left:40px;'>
							<div class='row col-md-4'>
								<div class='alert alert-info'>
									<strong>Descansar Antes del viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-warning'>
									<strong>Durante el Viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-danger'>
									<strong>Despues del viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
					</div>";
				}else{
					echo "<div class='container' style='margin-left:40px;'>
							<div class='row col-md-4'>
								<div class='alert alert-info'>
									<strong>Descansar Antes del viaje</strong><br>
									1 Hora
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-warning'>
									<strong>Durante el Viaje</strong><br>
									1 Hora
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-danger'>
									<strong>Despues del viaje</strong><br>
									1 Hora
								</div>
							</div>
					</div>";
				}
			}else{
				echo "<div class='container' style='margin-left:40px;'>
						<div class='row col-md-4'>
							<div class='alert alert-info'>
								<strong>Descansar Antes del viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
						<div class='row col-md-4'>
							<div class='alert alert-warning'>
								<strong>Durante el Viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
						<div class='row col-md-4'>
							<div class='alert alert-danger'>
								<strong>Despues del viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
					</div>";
			}

			break;
		case 15:
			//Este valor es la suma de una los minutos de 3 horas que son 180 minutos y 45 minutos da un total de 225
			$recomendacion_Descansar_conducir = "225";
			$tiempo_Descansar_por_partes = $recomendacion_Descansar_conducir/3;

			echo "<div class='alert alert-success'>
					<strong>Tiempo Total de Descanso</strong><br> El conductor debe Descansar 3 Horas 45 Minutos por conducir $traer_Valores_interrogatorio[2]  Horas
				</div>";

			if($tiempo_Descansar_por_partes >= 60 ) {
				$sacar_Minutos = $tiempo_Descansar_por_partes-60;
				if($sacar_Minutos !=0) {
					echo "<div class='container' style='margin-left:40px;'>
							<div class='row col-md-4'>
								<div class='alert alert-info'>
									<strong>Descansar Antes del viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-warning'>
									<strong>Durante el Viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-danger'>
									<strong>Despues del viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
					</div>";
				}else{
					echo "<div class='container' style='margin-left:40px;'>
							<div class='row col-md-4'>
								<div class='alert alert-info'>
									<strong>Descansar Antes del viaje</strong><br>
									1 Hora
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-warning'>
									<strong>Durante el Viaje</strong><br>
									1 Hora
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-danger'>
									<strong>Despues del viaje</strong><br>
									1 Hora
								</div>
							</div>
					</div>";
				}
			}else{
				echo "<div class='container' style='margin-left:40px;'>
						<div class='row col-md-4'>
							<div class='alert alert-info'>
								<strong>Descansar Antes del viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
						<div class='row col-md-4'>
							<div class='alert alert-warning'>
								<strong>Durante el Viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
						<div class='row col-md-4'>
							<div class='alert alert-danger'>
								<strong>Despues del viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
					</div>";
			}

			break;
		case 16:
			//Este valor es la suma de una los minutos de 4 Horas que son en minutos 240
			$recomendacion_Descansar_conducir = "240";
			$tiempo_Descansar_por_partes = $recomendacion_Descansar_conducir/3;

			echo "<div class='alert alert-success'>
					<strong>Tiempo Total de Descanso</strong><br> El conductor debe Descansar 4 Horas por conducir $traer_Valores_interrogatorio[2]  Horas
				</div>";

			if($tiempo_Descansar_por_partes >= 60 ) {
				$sacar_Minutos = $tiempo_Descansar_por_partes-60;
				if($sacar_Minutos !=0) {
					echo "<div class='container' style='margin-left:40px;'>
							<div class='row col-md-4'>
								<div class='alert alert-info'>
									<strong>Descansar Antes del viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-warning'>
									<strong>Durante el Viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-danger'>
									<strong>Despues del viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
					</div>";
				}else{
					echo "<div class='container' style='margin-left:40px;'>
							<div class='row col-md-4'>
								<div class='alert alert-info'>
									<strong>Descansar Antes del viaje</strong><br>
									1 Hora
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-warning'>
									<strong>Durante el Viaje</strong><br>
									1 Hora
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-danger'>
									<strong>Despues del viaje</strong><br>
									1 Hora
								</div>
							</div>
					</div>";
				}
			}else{
				echo "<div class='container' style='margin-left:40px;'>
						<div class='row col-md-4'>
							<div class='alert alert-info'>
								<strong>Descansar Antes del viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
						<div class='row col-md-4'>
							<div class='alert alert-warning'>
								<strong>Durante el Viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
						<div class='row col-md-4'>
							<div class='alert alert-danger'>
								<strong>Despues del viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
					</div>";
			}

			break;
		case 17:
			//Este valor es la suma de una los minutos de 4 Horas que son en minutos 240 mas 15 minutos da como total 255
			$recomendacion_Descansar_conducir = "255";
			$tiempo_Descansar_por_partes = $recomendacion_Descansar_conducir/3;

			echo "<div class='alert alert-success'>
					<strong>Tiempo Total de Descanso</strong><br> El conductor debe Descansar 4 Horas 15 Minutos por conducir $traer_Valores_interrogatorio[2]  Horas
				</div>";

			if($tiempo_Descansar_por_partes >= 60 ) {
				$sacar_Minutos = $tiempo_Descansar_por_partes-60;
				if($sacar_Minutos !=0) {
					echo "<div class='container' style='margin-left:40px;'>
							<div class='row col-md-4'>
								<div class='alert alert-info'>
									<strong>Descansar Antes del viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-warning'>
									<strong>Durante el Viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-danger'>
									<strong>Despues del viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
					</div>";
				}else{
					echo "<div class='container' style='margin-left:40px;'>
							<div class='row col-md-4'>
								<div class='alert alert-info'>
									<strong>Descansar Antes del viaje</strong><br>
									1 Hora
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-warning'>
									<strong>Durante el Viaje</strong><br>
									1 Hora
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-danger'>
									<strong>Despues del viaje</strong><br>
									1 Hora
								</div>
							</div>
					</div>";
				}
			}else{
				echo "<div class='container' style='margin-left:40px;'>
						<div class='row col-md-4'>
							<div class='alert alert-info'>
								<strong>Descansar Antes del viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
						<div class='row col-md-4'>
							<div class='alert alert-warning'>
								<strong>Durante el Viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
						<div class='row col-md-4'>
							<div class='alert alert-danger'>
								<strong>Despues del viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
					</div>";
			}

			break;
		case 18:
			//Este valor es la suma de una los minutos de 4 Horas que son en minutos 240 mas 30 minutos da como total 270
			$recomendacion_Descansar_conducir = "270";
			$tiempo_Descansar_por_partes = $recomendacion_Descansar_conducir/3;

			echo "<div class='alert alert-success'>
					<strong>Tiempo Total de Descanso</strong><br> El conductor debe Descansar 4 Horas 30 Minutos por conducir $traer_Valores_interrogatorio[2]  Horas
				</div>";

			if($tiempo_Descansar_por_partes >= 60 ) {
				$sacar_Minutos = $tiempo_Descansar_por_partes-60;
				if($sacar_Minutos !=0) {
					echo "<div class='container' style='margin-left:40px;'>
							<div class='row col-md-4'>
								<div class='alert alert-info'>
									<strong>Descansar Antes del viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-warning'>
									<strong>Durante el Viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-danger'>
									<strong>Despues del viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
					</div>";
				}else{
					echo "<div class='container' style='margin-left:40px;'>
							<div class='row col-md-4'>
								<div class='alert alert-info'>
									<strong>Descansar Antes del viaje</strong><br>
									1 Hora
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-warning'>
									<strong>Durante el Viaje</strong><br>
									1 Hora
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-danger'>
									<strong>Despues del viaje</strong><br>
									1 Hora
								</div>
							</div>
					</div>";
				}
			}else{
				echo "<div class='container' style='margin-left:40px;'>
						<div class='row col-md-4'>
							<div class='alert alert-info'>
								<strong>Descansar Antes del viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
						<div class='row col-md-4'>
							<div class='alert alert-warning'>
								<strong>Durante el Viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
						<div class='row col-md-4'>
							<div class='alert alert-danger'>
								<strong>Despues del viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
					</div>";
			}

			break;
		case 19:
			//Este valor es la suma de una los minutos de 4 Horas que son en minutos 240 mas 45 minutos da como total 285
			$recomendacion_Descansar_conducir = "285";
			$tiempo_Descansar_por_partes = $recomendacion_Descansar_conducir/3;

			echo "<div class='alert alert-success'>
					<strong>Tiempo Total de Descanso</strong><br> El conductor debe Descansar 4 Horas 45 Minutos por conducir $traer_Valores_interrogatorio[2]  Horas
				</div>";

			if($tiempo_Descansar_por_partes >= 60 ) {
				$sacar_Minutos = $tiempo_Descansar_por_partes-60;
				if($sacar_Minutos !=0) {
					echo "<div class='container' style='margin-left:40px;'>
							<div class='row col-md-4'>
								<div class='alert alert-info'>
									<strong>Descansar Antes del viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-warning'>
									<strong>Durante el Viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-danger'>
									<strong>Despues del viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
					</div>";
				}else{
					echo "<div class='container' style='margin-left:40px;'>
							<div class='row col-md-4'>
								<div class='alert alert-info'>
									<strong>Descansar Antes del viaje</strong><br>
									1 Hora
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-warning'>
									<strong>Durante el Viaje</strong><br>
									1 Hora
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-danger'>
									<strong>Despues del viaje</strong><br>
									1 Hora
								</div>
							</div>
					</div>";
				}
			}else{
				echo "<div class='container' style='margin-left:40px;'>
						<div class='row col-md-4'>
							<div class='alert alert-info'>
								<strong>Descansar Antes del viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
						<div class='row col-md-4'>
							<div class='alert alert-warning'>
								<strong>Durante el Viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
						<div class='row col-md-4'>
							<div class='alert alert-danger'>
								<strong>Despues del viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
					</div>";
			}

			break;
		case 20:
			//Este valor es la suma de una los minutos de 5 Horas que son en minutos 300
			$recomendacion_Descansar_conducir = "300";
			$tiempo_Descansar_por_partes = $recomendacion_Descansar_conducir/3;

			echo "<div class='alert alert-success'>
					<strong>Tiempo Total de Descanso</strong><br> El conductor debe Descansar 5 Horas por conducir $traer_Valores_interrogatorio[2]  Horas
				</div>";

			if($tiempo_Descansar_por_partes >= 60 ) {
				$sacar_Minutos = $tiempo_Descansar_por_partes-60;
				if($sacar_Minutos !=0) {
					echo "<div class='container' style='margin-left:40px;'>
							<div class='row col-md-4'>
								<div class='alert alert-info'>
									<strong>Descansar Antes del viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-warning'>
									<strong>Durante el Viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-danger'>
									<strong>Despues del viaje</strong><br>
									1 Hora $sacar_Minutos Minutos
								</div>
							</div>
					</div>";
				}else{
					echo "<div class='container' style='margin-left:40px;'>
							<div class='row col-md-4'>
								<div class='alert alert-info'>
									<strong>Descansar Antes del viaje</strong><br>
									1 Hora
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-warning'>
									<strong>Durante el Viaje</strong><br>
									1 Hora
								</div>
							</div>
							<div class='row col-md-4'>
								<div class='alert alert-danger'>
									<strong>Despues del viaje</strong><br>
									1 Hora
								</div>
							</div>
					</div>";
				}
			}else{
				echo "<div class='container' style='margin-left:40px;'>
						<div class='row col-md-4'>
							<div class='alert alert-info'>
								<strong>Descansar Antes del viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
						<div class='row col-md-4'>
							<div class='alert alert-warning'>
								<strong>Durante el Viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
						<div class='row col-md-4'>
							<div class='alert alert-danger'>
								<strong>Despues del viaje</strong><br>
								$tiempo_Descansar_por_partes Minutos
							</div>
						</div>
					</div>";
			}
			break;
		default:
			echo "<div class='alert alert-danger'>
					<strong>Horas Conduciendo</strong><br> El conductor No puede conducir el dia de hoy por pasar mas de 20 Horas conduciendo sin Descansar , La probabilidad de un accidente en las vias es un alto por falta de Descansar
				</div>";
			break;
	}
?>