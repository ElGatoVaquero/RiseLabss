<?php
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

if(isset($_POST['registrar'])){
    $sql = $con->prepare("INSERT INTO usuarios(nombre,email,contrasena,rol,direccion,ciudad,estado,cp)
    VALUES(:nombre, :email, :contrasena, 'cliente', :direccion, :ciudad, :estado, :cp)");

    if($sql->execute([
        ':nombre'     => $_POST['nombre'],
        ':email'      => $_POST['email'],
        ':contrasena' => $_POST['contrasena'], // ← AQUÍ ESTABA EL ERROR
        ':direccion'  => $_POST['direccion'],
        ':ciudad'     => $_POST['ciudad'],
        ':estado'     => $_POST['estado'],
        ':cp'         => $_POST['cp']
    ])){
        echo "<script>alert('Registro completado');window.location='login.php';</script>";
    }
}
?>


<link rel="stylesheet" href="assets/css/style.css">

<div class="form-container">
    <h2>Crear Cuenta</h2>
    <form method="POST">
        <input type="text" name="nombre" placeholder="Nombre completo" required>
        <input type="email" name="email" placeholder="Correo" required>
        <input type="password" name="contrasena" placeholder="Contrasena" required>
        <input type="text" name="direccion" placeholder="Dirección" required>
        <input type="text" name="ciudad" placeholder="Ciudad" required>
        <input type="text" name="estado" placeholder="Estado" required>
        <input type="text" name="cp" placeholder="Código Postal" required>
        <button name="registrar">Registrarse</button>
    </form>

    <p>¿Ya tienes cuenta? <a href="login.php">Iniciar sesión</a></p>
</div>
