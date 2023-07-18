<?php

class Conexxion {
    private $host = "mysql-135690-0.cloudclusters.net:19816";
    private $nombreBD = "mysbd_proyectmanejo";
    private $usuario = "admin";
    private $contrasena = "cflkcD6A";
    private $cn;

    public function conectar(){
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->nombreBD};charset=utf8";
            $opciones = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            );

            $this->cn = new PDO($dsn, $this->usuario, $this->contrasena, $opciones);
        } catch (PDOException $e) {
            echo "Error de conexión a la BD: " . $e->getMessage();
        }
    }
    public function getCn(){
        return $this->cn;
    }
}
