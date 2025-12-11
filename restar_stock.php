<?php
require 'config/database.php';

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $cantidad = $_POST['cantidad'];

    $db = new Database();
    $con = $db->conectar();

    // Restar 1 del stock (puedes modificar para cantidad específica)
    $sql = $con->prepare("UPDATE productos SET stock = stock - $cantidad WHERE id = ?");
    $sql->execute([$id]);

    echo "Stock actualizado";
} else {
    echo "Error: No se recibió ID";
}
?>
