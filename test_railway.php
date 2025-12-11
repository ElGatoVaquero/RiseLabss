<?php
require 'config/database.php'; // Ajusta ruta si es necesario

$db = new Database();
$con = $db->conectar();

$query = $con->query("SHOW TABLES");
$tablas = $query->fetchAll();

echo "<h2>Conexión exitosa con Railway 🚀</h2>";

if(count($tablas) > 0){
    echo "<p>Tablas encontradas:</p><ul>";
    foreach($tablas as $t){
        echo "<li>".$t[array_key_first($t)]."</li>";
    }
    echo "</ul>";
} else {
    echo "<p>No hay tablas aún. IMPORTA TU .sql</p>";
}
?>
