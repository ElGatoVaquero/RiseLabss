<?php
class Database {
    function conectar() {

        $dsn = "mysql:host=hopper.proxy.rlwy.net;port=44223;dbname=railway;charset=utf8mb4";

        try {
            return new PDO(
                $dsn,
                "appuser",       
                "AppPass123!",
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false,
                ]
            );
        } catch (PDOException $e) {
            die("Error conexión: " . $e->getMessage());
        }
    }
}

?>
