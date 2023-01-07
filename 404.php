<?php session_start();
include('model.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php head(); ?>
    <title>Oops!</title>
</head>

<body>
    <?php
    navBar();
    ?>

    <div class="formulaire">
        <h1>&#128586; 404</h1>
        <br>
        <h4>Oops, cette page n'existe pas !</h4>
        <br>
        <a class="lien" href="index.php">Retourner à l'accueil</a>

    </div>

    <footer>
        <h6>© Amel Chabah - 2022 - tous droits réservés</h6>
    </footer>
</body>

</html>