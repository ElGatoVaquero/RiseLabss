<?php
session_start();

// Si no hay sesión activa
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}

require 'config/database.php';
$db = new Database();
$con = $db->conectar();

$id = $_SESSION['id'];

// Obtener datos del usuario
$stmt = $con->prepare("SELECT nombre,email,direccion,ciudad,estado,cp,rol FROM usuarios WHERE id=:id LIMIT 1");
$stmt->execute([':id'=>$id]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$usuario){
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Perfil de <?php echo htmlspecialchars($usuario['nombre']); ?></title>
<link rel="stylesheet" href="assets/css/style.css">

</head>
<body>

<div class="profile-box">
    <h2>👤 <?php echo htmlspecialchars($usuario['nombre']); ?></h2>

    <div class="data">
        <p><strong>Email:</strong> <?php echo $usuario['email']; ?></p>
        <p><strong>Dirección:</strong> <?php echo $usuario['direccion']; ?></p>
        <p><strong>Ciudad:</strong> <?php echo $usuario['ciudad']; ?></p>
        <p><strong>Estado:</strong> <?php echo $usuario['estado']; ?></p>
        <p><strong>Código Postal:</strong> <?php echo $usuario['cp']; ?></p>
        <p><strong>Rol:</strong> <?php echo ucfirst($usuario['rol']); ?></p>
    </div>

    <a href="index.php" class="btn-index">Ir al inicio</a>
    <a href="logout.php" class="btn-logout">Cerrar sesión</a>
</div>

</body>
</html>
