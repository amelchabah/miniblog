<?php session_start();
include('model.php');
$resultarchives = afficheArchives();
include("vue/archives.php");
?>