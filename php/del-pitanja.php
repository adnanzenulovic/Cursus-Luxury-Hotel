<?php

$con = new PDO("mysql:host=localhost;dbname=zenulovic", "root","");
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$idic = $_GET["id"];


$stmt = $con->prepare("DELETE FROM pitanja WHERE ID =:id");
$stmt->bindParam(":id", $idic);
$stmt->execute();
header("Location: admin.php");
?> 