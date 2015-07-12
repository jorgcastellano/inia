<?php

include_once '../includes/is-config.php';

/**
 * Funcion para hacer más costoso al asunto
 */
function hash_password($password, $salt) 
{
    $hash = hash_hmac('SHA512', $password, $salt);
    for ($i = 0; $i < 5000; $i++) 
    {
        $hash = hash_hmac('SHA512', $hash, $salt);
    }
    
    return $hash;
}

$nombre = $_POST['nombre'];
$password = $_POST['password'];


$salt = str_replace('=', '.', base64_encode(mcrypt_create_iv(20)));
$hash = hash_password($password, $salt);
var_dump($hash);
?>