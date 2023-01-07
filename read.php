<?php session_start();
include('model.php');
include("connexion.php");
$resultcommentaires = afficheCommentaires($_GET ["billet"]);
$resultdetail = afficheDetailArticle($_GET["billet"]);
include("vue/read.php");
?>