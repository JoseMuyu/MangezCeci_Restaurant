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
    <!--links para header y footer-->
    <link rel="stylesheet" href="../Estilos/styleMenu.css">
    <link rel="stylesheet" href="../Estilos/footer.css">
    <!--links para cuerpo de pagina-->
    <link rel="stylesheet" href="../Estilos/reservaciones.css">
    <title>MangezCesi | Reservaciones</title>
</head>

<body>
    <!--Header-->
    <header id="Header">
        <div class="logo">
            <img src="../Recursos/LOGO_MangezCeci.png">
            <h2 class="nombre_empresa" id="H2">MangezCeci</h2>
        </div>
        <nav>
            <a class="op" href="../index.html">Inicio</a>
            <a class="op" href="Menu.html">Menú</a>
            <a class="op" href="../About.html">Sobre nosotros</a>
            <a class="op" href="Reservaciones.php">Reservaciones</a>
        </nav>
    </header>
    <div class="atrasHeader"></div>
    <!--main - contenido de la pagina-->
    <main>
        <div class="mesitas">
            <?php
            $codsMesas = $mbd->obtenerDatos($conex->getCn(), "mesas", "COD_MES");
            $tamano = count($codsMesas);
            $nomsMesas = $mbd->obtenerDatos($conex->getCn(), "mesas", "NOM_MES");
            $desMesas = $mbd->obtenerDatos($conex->getCn(), "mesas", "DES_MES");
            $valsMesas = $mbd->obtenerDatos($conex->getCn(), "mesas", "VAL_MES");
            $canPersMesas = $mbd->obtenerDatos($conex->getCn(), "mesas", "CAN_PER_MES");
            for ($i = 0; $i < $tamano; $i++) { ?>
                <section class="mesita">
                    <fieldset>
                        <legend class="titulo"><?php echo "$nomsMesas[$i]"; ?></legend>
                        <img src=<?php echo "../Recursos/img_Mesas/" . $codsMesas[$i] . ".png" ?>>
                        <p class="des"> Descripcion: <?php echo "$desMesas[$i]"; ?> </p>
                        <p class="val"> Costo: $<?php echo "$valsMesas[$i]"; ?> </p>
                        <p class="can"> Cantidad de personas: <?php echo "$canPersMesas[$i]"; ?> </p>
                        <?php if ($mbd->obtenerDatoCondicion($conex->getCn(), "mesas", "DIS_MES", "COD_MES = '" . $codsMesas[$i] . "'") == "S") { ?>
                            <p class="aviso">Disponible</p>
                        <?php } else { ?>
                            <p class="aviso">No disponible</p>
                        <?php } ?>
                    </fieldset>
                </section>
            <?php } ?>
        </div>
        <div class="inputsitos">
            <form action="CompletarReserva.php" method="POST">
                <table>
                    <tr>
                        <th class="titulo" colspan="2">Listo para reservar</th>
                    </tr>
                    <tr>
                        <td class="labelsito">Nombre:</td>
                        <td class="inputsito"><input type="text" id="nom_ped" name="nom_ped" required placeholder="Ingresa solo un nombre"></td>
                    </tr>
                    <tr>
                        <td class="labelsito">Correo Electronico:</td>
                        <td class="inputsito"><input type="email" id="mai_ped" name="mai_ped" required placeholder="example@email.com"></td>
                    </tr>
                    <tr>
                        <td class="labelsito">Numero telefonico:</td>
                        <td class="inputsito"><input type="tel" id="cel_ped" name="cel_ped" required placeholder="solo 10 digitos"></td>
                    </tr>

                    <tr>
                        <td class="labelsito">Mesa:</td>
                        <td class="inputsito">
                            <select name="mesa" class="cajitaingreso">
                                <?php for ($i = 0; $i < $tamano; $i++) { ?>
                                    <?php if ($mbd->obtenerDatoCondicion($conex->getCn(), "mesas", "DIS_MES", "COD_MES = '" . $codsMesas[$i] . "'") == "S") { ?>
                                        <option value=<?php echo $codsMesas[$i] ?>><?php echo $nomsMesas[$i] ?></option>
                                    <?php }  ?>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td class="labelsito">Fecha a reservar:</td>
                        <td class="inputsito"><input type="date" id="dia_ped" name="dia_ped" required></td>
                    </tr>
                </table>
                <center>
                <input type="submit" value="Enviar" class="boton-enviar">
                </center>
            </form>
        </div>
    </main>
    <footer>
        <div class="redes-sociales">

            <h5>Redes Sociales</h5>
            <ul>
                <li><a href="" target="_blank" rel="noopener noreferrer"><img class="icon" src="../Recursos/ico_Facebook.png" alt=""></a></li>
                <li><a href="" target="_blank" rel="noopener noreferrer"><img class="icon" src="../Recursos/ico_Instragram.png" alt=""></a></li>
                <li><a href="" target="_blank" rel="noopener noreferrer"><img class="icon" src="../Recursos/ico_Twiter.png" alt=""></a></li>
                <li><a href="" target="_blank" rel="noopener noreferrer"><img class="icon" src="../Recursos/ico_Youtube.png" alt=""></a></li>
            </ul>
        </div>
        <div class="propietarios">
            <h5>Propietarios</h5>
            <ul>
                <li>Fermin Moro</li>
                <li>Saida Rodrigues</li>
                <li>Elsa Capunta</li>
            </ul>
        </div>
        <div class="servicio-a-cliente">
            <h5>Servicio a Cliente</h5>
            <h6 class="space"> Horario de atención al cliente:</h6>

            <ul class="space">
                <li>Lunes a Viernes: 10:00 AM - 10:00 PM </li>
                <li>Sábados y Domingos: 11:00 AM - 10:00 PM</li>
            </ul>
            <p class="space"><strong><em>Teléfono: </em></strong> (03) 2857831 <br>
                <strong><em>Correo electrónico:</em> </strong>mangezceci@gmail.com <br>
                <strong><em>Dirección: </em></strong> Av. Pedro Vásconez, Ambato
            </p>

        </div>

        <div class="derechos-autor">
            <p>Derechos reservados @2023 <em>MangezCeci Restaurant</em></p>
        </div>
    </footer>
    <!--Scripts para funcionamientos de la pagina-->
    <script src="../Estilos/Scripts.js"></script>
</body>

</html>