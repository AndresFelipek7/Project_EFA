<?php
	include "../../methods_backend.php";

	$edad = $_REQUEST["valor_edad"];
	$menu_desde = $_REQUEST["menu"];

	$vector_edad = explode("0",$edad);
	$vector_menu = explode(".",$menu_desde);

	if($vector_edad[0] == "") {
		message_mistake_validator("La edad Ingresada no es correcta.");
		enable_function_js('','edad');
	}else {
		disable_function_js('','edad');
	}
?>