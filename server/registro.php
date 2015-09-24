<?php
session_start();

require('conexion.php');

        $items = json_decode($_POST['registro']);

        $padre=$items->padre;
        $email=$items->mail;
        $hijo=$items->hijo;
        $genero=$items->genero;
        $edad=$items->edad;
        $estrato=$items->estrato;

        $_SESSION['email']  = $email;
        $_SESSION['genero']  = $genero;

        date_default_timezone_set('America/Bogota');
        $fecha_registro = date("Y-m-d H:i:s");
        
        $direccion_ip=$_SERVER['REMOTE_ADDR'];
        $navegador1= $_SERVER["HTTP_USER_AGENT"];




$sql = "INSERT INTO registros_juego  VALUES (NULL,'$padre','$email','$hijo','$genero','$edad','$estrato','$fecha_registro','$direccion_ip','$navegador1',NULL)";

    if ($conn->query($sql) === TRUE) {        

        echo "Nuevo registro creado";
        $id = $conn->insert_id;
        $_SESSION['id_registro']  = $id;
        $_SESSION['email']  = $email;
        $_SESSION['direccion_ip']  = $direccion_ip;

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>

