<?php
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];

    // Buscar usuario por correo
    $sql = $con->prepare("SELECT id, nombre, email, contrasena, rol FROM usuarios WHERE email = :email LIMIT 1");
    $sql->execute([':email' => $email]);
    $usuario = $sql->fetch(PDO::FETCH_ASSOC);

    if($usuario){
        // ⚠ Como tu contraseña no está cifrada comparamos directo
        if($contrasena === $usuario['contrasena']){
            
            session_start();
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['rol'] = $usuario['rol'];

            echo "<script>alert('Bienvenido ".$usuario['nombre']."');window.location='index.php';</script>";
        } else {
            echo "<script>alert('Contraseña incorrecta');</script>";
        }
    } else {
        echo "<script>alert('El correo no está registrado');</script>";
    }
}
?>

<link rel="stylesheet" href="assets/css/style.css">

<div class="form-container">
    <h2>Iniciar sesión</h2>
    <form method="POST">
        <input type="email" name="email" placeholder="Correo" required>
        <input type="password" name="contrasena" placeholder="Contraseña" required>
        <button name="login">Entrar</button>
    </form>

    <p>¿No tienes cuenta? <a href="registro.php">Crear una</a></p>
</div>

