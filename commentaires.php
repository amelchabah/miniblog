<?php session_start();
include("model.php");
include("connexion.php");
if (empty($_GET['billet'])) {
    header("Location:404.php");
}
$resultcommentaires = afficheCommentaires($_GET ["billet"]);
$resultdetail = afficheDetailArticle($_GET["billet"]);
$resultnombre = afficheNombreCommentaires($_GET["billet"]);


include("vue/commentaires.php");
?>