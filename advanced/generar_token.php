<?php
// generar_token.php
require 'vendor/autoload.php';

use \Firebase\JWT\JWT;

// Clave secreta para firmar el token
$clave_secreta = 'mi_clave_secreta';

// Datos del usuario
$datos_usuario = [
    'id' => 123,
    'nombre' => 'Juan Pérez',
    'email' => 'juan.perez@example.com'
];

// Payload del token
$payload = [
    'iss' => 'http://miapp.com',
    'aud' => 'http://miapp.com',
    'iat' => time(),
    'exp' => time() + (60 * 60), // 1 hora de validez
    'data' => $datos_usuario
];

// Genera el token sin especificar el algoritmo (vulnerable)
$jwt = JWT::encode($payload, $clave_secreta, 'HS256');

echo json_encode(['token' => $jwt]);
?>
