<?php session_start();


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Selecciones</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<style type="text/css">
	*{font-size:20px;}
</style>
</head>
<body>
<div class="container">
	<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 col-md-offset-2">
		


<?php
echo "<br>";

$id_usuario   = $_SESSION['id_registro'];
$direccion_ip = $_SESSION['direccion_ip'];
$email        = $_SESSION['email'];

require('conexion.php');

//$direccion_ip ="200.29.236.34"; // sesion direccion_ip
//$email        ="camoranns@gmail.com";

$sql = "SELECT *  FROM registros_juego WHERE direccion_ip='$direccion_ip'";
$result = $conn->query($sql);

	if ($result->num_rows > 0) 
	{
		$cont=1;
	    while($row = $result->fetch_assoc()) {$cont+=1;}     
		     if ($cont>6) {echo "La IP se repite más de 6 veces: ".
		     	"<span class='label label-danger'>".$cont."</span>";} 
	} 
	else {echo "0 results";}


$sql = "SELECT *  FROM registros_juego WHERE email='$email'";
$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		$cont=1;
	    while($row = $result->fetch_assoc()) {
	        $cont+=1;  }     
		     if ($cont>3) {
		      	echo "<br>"."El correo se repite más de 3 veces: ".
		      	"<span class='label label-danger'>".$cont."</span>";} 
	} 
	else {echo "0 results";}


// SELECT TOP 2 * FROM Customers

$sql = "SELECT * FROM vales WHERE id_asignado IS NULL LIMIT 0 , 1;";
$result = $conn->query($sql);
//SELECT FIRST(*) AS CodeDisponible FROM vales WHERE id_asignado IS NULL;
if ($result->num_rows > 0) {
	
    while($row = $result->fetch_assoc()) {
    	echo"<hr>";
    	echo "<i>Si cumple con las condiciones</i>";
    	$code=$row["code"];
        echo "<br>"."Vale Asignado: <br><span>id: " .$row["id"]. "   - Code: " ."<span class='label label-danger'>". $row["code"]. "</span><br>";

         echo "<hr>"."<br><i>UPDATE registros_juego SET id_asignado='$id_usuario' WHERE code='$code';</i>";
    }
} else {
    echo "<br>0 results";
}

$conn->close();

?>


	</div>
</div>

	


</body>
</html>





