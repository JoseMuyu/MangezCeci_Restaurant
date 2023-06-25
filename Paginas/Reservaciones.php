<?php
require_once "Conexxion.php";
require_once "ManejoBD.php";

$conex = new Conexxion();
$conex->conectar();
if ($conex->getCn() == null) {
    echo "No se conecto";
}

$mbd = new ManejoBD();
$codsMesas = array();
$nomsMesas = array();
$desMesas = array();
$valsMesas = array();
$canPersMesas = array();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../Recursos/LOGO_MangezCeci.png" type="image/x-icon">
    <!--link del css general-->
    <link rel="stylesheet" href="../Estilos/allPages.css">
    <!--links para header y footer-->
    <link rel="stylesheet" href="../Estilos/header_footer.css">
    <!--links para cuerpo de pagina-->
    <link rel="stylesheet" href="../Estilos/reservaciones.css">
    <title>MangezCesi | Reservaciones</title>
</head>