<?php
    include_once '../includes/is-conexion_bd.php';
 
    extract($_POST);
    $password = $_POST['password'];
    $confpass = $_POST['confirmpwd'];

    if($password == $confpass){
        $var = $mysqli->prepare('INSERT INTO miembros (usuario, email, contraseña) VALUES (?,?,?)');
        $var->execute(array($usuario, $email, $password));
        header('location: ../pst3grupo5/regitro_paso2');
    }
    else
        header('location: ../pst3grupo5/error');

/*$nombre = $_POST['nombre'];
$password = $_POST['pass'];

// Validar que $nombre esté disponible, que si contenga
// un rango de letras, numeros, etc etc.. y luego:

// Generamos un salt aleatoreo, de 22 caracteres para Bcrypt
$salt = substr(base64_encode(openssl_random_pseudo_bytes('30')), 0, 22);

// A Crypt no le gustan los '+' así que los vamos a reemplazar por puntos.
$salt = strtr($salt, array('+' => '.')); 

// Generamos el hash
$hash = crypt($password, '$2y$10$' . $salt);

// Guardamos los datos en la base de datos
$db = new PDO(.....);
$stmt = $db->prepare('INSERT INTO usuarios (nombre, pass) VALUES (?, ?)');
$stmt->execute(array($nombre, $hash));*/

?>