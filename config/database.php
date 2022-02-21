<?php
class DataBase {
    const server = "localhost:3307";
    const user = "root";
    const pass = "root";
    const nameDB = "db_abarrotes_villa";

    public static function conectar(){
        try {
            $conexion = new PDO("mysql:host=".self::server.";dbname=".self::nameDB, self::user ,self::pass);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
        } catch (PDOexception $err) {
            return "Falla la conexión" . $err;
        }
    }
}
?>