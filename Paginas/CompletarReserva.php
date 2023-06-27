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
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php require_once 'vistaHeader.html' ?>
    <main>

    </main>
    <?php require_once 'vistaFooter.html' ?>
</body>

</html>