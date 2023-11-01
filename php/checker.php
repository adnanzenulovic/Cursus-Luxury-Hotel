<?php 
include('server.php'); 

if(isset($_SESSION['vrsta']) == "AD"){
    header('location: admin.php'); 
}

if(isset($_SESSION['vrsta']) == "KO"){
    header('location: user.php'); 
}
else header('location: login.php');

?>

