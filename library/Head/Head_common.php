<?php
	session_start();
	include "library/conec.php";
	header("Content-Type: text/html;charset=utf-8");
	$acentos = $conexion->query("SET NAMES 'utf8'");
?>

<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />

<!-- Librerias -->
<link rel="stylesheet" href="css/Font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="css/select2.min.css">
<link rel="stylesheet" href="css/jquery.dataTables.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/sweetalert.css">

<!-- Estilos Generales -->
<link rel="stylesheet" href="css/style2.css">
<link rel="stylesheet" href="css/style_checkbox.css">
<link rel="stylesheet" href="css/style_radio.css">
<link rel="stylesheet" href="css/style_manual_evaluador.css">
<link rel="stylesheet" href="css/style_funciones_evaluador.css">

<!-- Logo en la pestaña de los navegadores -->
<link rel="icon" href="images/Logo/11.png">
