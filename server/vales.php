<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Codigos</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<style type="text/css">
	span{font-size:17px;}
</style>
</head>
<body>
<div class="container">
	<div class="col-md-9 col-md-offset-1"><br>
		<?php
$servername = "localhost";
$username = "albacorp_test";
$password = "oL38HSZ^WRs4";
$dbname = "albacorp_app_facebook";

$conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

$sql = "SELECT * FROM  vales ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo("<h2>500 benditos codigos ,<small>Faltan 4500<small></h2>");
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<span>id: " . $row["id"]. "   - Code: " . $row["code"]. "</span><br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
	</div>
	

</div>
	
</body>
</html>

