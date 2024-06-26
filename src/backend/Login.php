<?php

$conn = include("../Utils/db_connection.php");

$response = array();

if($_SERVER['REQUEST_METHOD'] == "POST") {

    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if(empty($username) || empty($password)) {
        $response['success'] = false;
        $response['message'] = 'Tienes que completar los campos para continuar.';

        header('Content-Type: application/json');
        echo json_encode($response);
        return;
    }

    $v_sql = 'SELECT
            usuario,
            passUser
        FROM admin_usuario
        WHERE usuario="'.$username.'" AND passUser="'.$password.'"';
    $result = $conn->query($v_sql);

    if($result->num_rows > 0) {
        session_start();
        $_SESSION["username"] = $username;
        $response['success'] = true;
    } else {      
        $response['success'] = false;
        $response['message'] = 'Usuario o contraseña incorrectos';
    }
    $conn->close();
}

header('Content-Type: application/json');
echo json_encode($response);