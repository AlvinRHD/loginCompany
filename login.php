<?php
include('db_connection.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE correo = ? AND contraseña = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();


    if ($result->num_rows > 0) {
        session_start();
        $_SESSION['usuario'] = $email;
        header("Location: welcome.html");
        exit();
    } else {
        echo "Usuario contraseña incorrectos";
    }
}
