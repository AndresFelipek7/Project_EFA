<?php
	$opcion_tiempo =  $_REQUEST['valor_opcion'];

	switch ($opcion_tiempo) {
		case 'Hora':
			echo "<div>
				<input type='text' class='form-control' name='tiempo_recorrido_hora' id='tiempo_recorrido_hora' placeholder='Colocar Tiempo en horas' onkeypress='return justNumbersTime(event)' onchange='stop_value_hour_more_24(this.form.tiempo_recorrido_hora.value,this.form.desde.value,this.form.id_input.value);' required><br><br>
			</div>";
			break;
		case 'Minuto':
			echo "<div>
				<input type='text' class='form-control' name='tiempo_recorrido_minutos' id='tiempo_recorrido_minutos' placeholder='Colocar Tiempo en Minutos' onkeypress='return justNumbersTime(event)' onchange='stop_value_minutes_more_60(this.form.tiempo_recorrido_minutos.value,this.form.desde.value,this.form.id_input_minutes.value);' required><br><br>
			</div>";
			break;
		case 'Ambos_tiempo':
			echo "<div class='row'>
					<div class='col-md-6'>
						<input type='text' class='form-control' name='tiempo_recorrido_hora' id='tiempo_recorrido_hora' placeholder='Ingresar Hora' onkeypress='return justNumbersTime(event)' onchange='stop_value_hour_more_24(this.form.tiempo_recorrido_hora.value,this.form.desde.value,this.form.id_input.value);' required><br><br>
					</div>
					<div class='col-md-6'>
						<input type='text' class='form-control' name='tiempo_recorrido_minutos' id='tiempo_recorrido_minutos' placeholder='Ingresar Minutos' onkeypress='return justNumbersTime(event)' onchange='stop_value_minutes_more_60(this.form.tiempo_recorrido_minutos.value,this.form.desde.value,this.form.id_input_minutes.value);' required><br><br>
					</div>
			</div>";
			break;

		default:
			echo "<script>  alert_dinamic_outside_place('rutas.php'); </script>";
			break;
	}
?>