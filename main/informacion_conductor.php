<?php
	echo "<div class='container'>
			<div class='panel panel-primary contenedor_info_conductor text-center'>
					<div class='panel-heading'><span class='fa fa-file-text fa-2x'></span> <br><h3>Informacion del Conductor</h3></div>
					<div class='panel-body'>
						<div class='col-md-12'>
							<img class='img-thumbnail img-rounded' width='200'  height='200' src='$_SESSION[foto]'><br><br><hr class='without-style-hr'>
						</div>
						<div class='row more-size'>
							<div class='col-md-4'>
								<label>Nombre : </label> $_SESSION[nombre]
							</div>
							<div class='col-md-4'>
								<label>Apellido : </label> $_SESSION[apellido]
							</div>
							<div class='col-md-4'>
								<label>Documento : </label> $_SESSION[documento]
							</div>
						</div>
						</div>
					</div><hr>
				</div>
		</div>";
?>