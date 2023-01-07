<?php session_start();
include('model.php');
$resultderniersarticles = afficheDerniersArticles();
include("vue/index.php");
?>