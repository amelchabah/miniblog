<?php session_start();
include("model.php");
include("connexion.php"); 
$resultbackoffice = backOfficeTable();
include("vue/admin.php");
?>

