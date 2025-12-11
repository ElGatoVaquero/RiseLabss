<?php
// Script de procesamiento: guardar_compra.php (o compras.php)
header('Content-Type: text/plain'); // Establecemos el encabezado para que la respuesta sea simple

// 1. Capturar los datos enviados desde JavaScript
$id_producto = isset($_POST['id']) ? (int)$_POST['id'] : 0;
$cantidad = isset($_POST['cantidad']) ? (int)$_POST['cantidad'] : 0;
$paypal_order_id = isset($_POST['order_id']) ? $_POST['order_id'] : 'N/A';
$total_pagado = isset($_POST['total']) ? (float)$_POST['total'] : 0.00;

if ($id_producto > 0 && $cantidad > 0) {
    
    // ==========================================================
    // Lógica para REGISTRAR LA COMPRA (Guardar en JSON)
    // ==========================================================
    
    $archivo = 'compras_registros.json'; // Usamos otro nombre para evitar confusión con la vista
    $compras_actuales = [];

    // Preparar los detalles de la compra (ahora con ID de PayPal y Total)
    $datos_compra = [
        'id_producto' => $id_producto,
        'nombre' => $nombre,
        'cantidad' => $cantidad,
        'fecha' => date('Y-m-d H:i:s'),
        'paypal_id' => $paypal_order_id,
        'total' => $total_pagado
    ];

    // Leer el contenido actual
    if (file_exists($archivo)) {
        $contenido = file_get_contents($archivo);
        $compras_actuales = json_decode($contenido, true) ?: [];
    }

    // Agregar la nueva compra
    $compras_actuales[] = $datos_compra;
    
    // Guardar el contenido actualizado
    $resultado = file_put_contents($archivo, json_encode($compras_actuales, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    
    // ==========================================================
    // Respuesta final
    // ==========================================================

    if ($resultado !== false) {
        // Respuesta exitosa para JavaScript
        echo "OK: Compra registrada con ID de PayPal: " . $paypal_order_id;
    } else {
        http_response_code(500);
        echo "ERROR: Falló al guardar el registro de la compra en JSON.";
    }

} else {
    http_response_code(400); 
    echo "ERROR: Datos de pedido incorrectos o faltantes.";
}
?>