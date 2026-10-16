<?php
require '../configuracion/configproducts.php';

// Iniciar sesión si no está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Inicializar el array del carrito si no existe
if (!isset($_SESSION['carrito']['productos'])) {
    $_SESSION['carrito']['productos'] = array();
}

$datos = array('ok' => false, 'numero' => 0);

if (isset($_POST['id']) && isset($_POST['token'])) {
    $id = $_POST['id'];
    $token = $_POST['token'];

    $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);

    if ($token == $token_tmp) {
        // Incrementar la cantidad o inicializar a 1 si no existe
        if (isset($_SESSION['carrito']['productos'][$id])) {
            $_SESSION['carrito']['productos'][$id] += 1;
        } else {
            $_SESSION['carrito']['productos'][$id] = 1;
        }

        $datos['numero'] = count($_SESSION['carrito']['productos']);
        $datos['ok'] = true;
    }
}
$datos = array(
    'ok' => true,
    'numero' => count($_SESSION['carrito']['productos'])
);
echo json_encode($datos);
