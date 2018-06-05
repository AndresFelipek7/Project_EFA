<?php
	if(!empty($_POST["active_item"]) && is_array($_POST["active_item"])) {
		foreach ($_POST["active_item"] as $item) {
			echo "Activo el id = $item";
		}
	}else {
		echo "Esta vacio";
	}

?>