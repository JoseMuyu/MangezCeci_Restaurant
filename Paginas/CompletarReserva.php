<?php
require_once "Conexxion.php";
require_once "ManejoBD.php";

$mbd = new ManejoBD();
$conex = new Conexxion();
$conex->conectar();
if ($conex->getCn() == null) {
    echo "No se conecto";
}

$nomPed = $_POST['nom_ped'];
$maiPed = $_POST['mai_ped'];
$celPed = $_POST['cel_ped'];
$mesa = $_POST['mesa'];
$fecPed = $_POST['dia_ped'];
?>