<?php
session_start();
$_SESSION['email']  = $email;

$servername = "localhost";
$username = "albacorp_test";
$password = "oL38HSZ^WRs4";
$dbname = "albacorp_app_facebook";

$conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

        $items = json_decode($_POST['registro']);

        $padre=$items->padre;
        $email=$items->mail;
        $hijo=$items->hijo;
        $genero=$items->genero;
        $edad=$items->edad;
        $estrato=$items->estrato;

        date_default_timezone_set('America/Bogota');
        $fecha_registro = date("Y-m-d H:i:s");
        
        $direccion_ip=$_SERVER['REMOTE_ADDR'];
        $navegador1= $_SERVER["HTTP_USER_AGENT"];




$sql = "INSERT INTO registros_juego  VALUES (NULL,'$padre','$email','$hijo','$genero','$edad','$estrato','$fecha_registro','$direccion_ip','$navegador1')";

    if ($conn->query($sql) === TRUE) {        

        echo "Nuevo registro creado";


    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>

