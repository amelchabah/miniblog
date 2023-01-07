<!DOCTYPE html>
<html lang="en">

<head>
    <?php head(); ?>
    <title>Nouvel article</title>
</head>

<body>
    <?php navBar(); ?>

    <div class="wrapper">
        
        <?php
        if (isset($_SESSION["username"])) {
            if ($_SESSION["id"] == 1) {
                echo '<a class="ariane" href="admin.php">Retourner au back-office</a>
                <h1 style="margin:2rem 0">Publier un nouveau billet</h1><form class="newarticle" name="article" method="POST" action="new.php"><label for="titre">Titre</label><input type="text" id="titre" name="titre" placeholder="Titre" require><label for="contenu">Contenu</label><textarea id="contenu" name="contenu" placeholder="Contenu" require></textarea><input type="submit" id="publier" name="publier" value="Publier"><input type="reset" value="Effacer"></form>';
                // if (isset($_POST["publier"])) {
                //     insertArticle($titre, $contenu, $auteur);
        ?>
                    <!-- <script type="text/javascript">
                        alert("Article publié avec succès!");
                        window.location = "admin.php";
                    </script> -->
        <?php
                    // à changer, si possible atterrir sur l'article créé au clic
                }
            else {
                echo "<h4>Vous devez être administrateur pour publier un billet.</h4><br><a href='index.php' class='lien'> Retourner à l'accueil ?</a>";
            } 
        } else {
            echo "<h4>Vous devez être administrateur pour publier un billet.</h4><br><a href='index.php' class='lien'> Retourner à l'accueil ?</a>";
        }
        ?>
    </div>

    <footer>
        <h6>© Amel Chabah - 2022 - tous droits réservés</h6>
    </footer>
</body>

</html>