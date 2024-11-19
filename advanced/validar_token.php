<?php
// validar_token.php
require 'vendor/autoload.php';

use \Firebase\JWT\JWT;
use \Firebase\JWT\Key;

// Clave secreta para verificar el token
$clave_secreta = 'mi_clave_secreta';

// Obtiene el token de la solicitud (por ejemplo, desde el encabezado Authorization)
$token = $_GET['token'] ?? '';

if (!$token) {
    die(json_encode(['error' => 'Token no proporcionado']));
}

try {
    // Decodifica el token sin especificar la clave de manera segura (vulnerable)
    $decoded = JWT::decode($token, new Key($clave_secreta, 'HS256'));

    echo json_encode(['datos' => $decoded->data]);
} catch (Exception $e) {
    echo json_encode(['error' => 'Token inválido: ' . $e->getMessage()]);
}
?>

