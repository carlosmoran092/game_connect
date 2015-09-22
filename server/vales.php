<?php

$host="tiendanorma.c6yhynbnhp56.us-west-2.rds.amazonaws.com";
$port=3306;
$socket="";
$user="normastore";
$password="";
$dbname="";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());

//$con->close();

$query = "SELECT id_cart_rule,code FROM tiendanorma_test.tienda_normacart_rule";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($id_cart_rule, $code);
    while ($stmt->fetch()) {
        printf("%s, %s\n", $id_cart_rule, $code);
    }
    $stmt->close();
}

?>