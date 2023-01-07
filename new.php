<?php session_start();
include('model.php');
// include("connexion.php");

if (isset($_POST["publier"])) {
    $titre = $_POST["titre"];
    $contenu = $_POST["contenu"];
    $auteur = $_SESSION["username"];
    insertArticle($titre, $contenu, $auteur);
    echo'<script type="text/javascript">
    alert("Article publié avec succès!");
    window.location = "admin.php";
</script>';
}
include("vue/new.php");
?>

