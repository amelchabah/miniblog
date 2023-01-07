<!DOCTYPE html>
<html lang="en">

<head>

    <?php head();
    ?>

    <title>
        <?php
        $requete = "SELECT * FROM billets WHERE id_billet=" . $_GET["billet"];
        $stmt = $db->query($requete);
        $resultat = $stmt->fetchall(PDO::FETCH_ASSOC);

        foreach ($resultat as $billet) {
            echo "{$billet["titre"]}";
        }
        if (empty($billet)) {
            header("Location:404.php");
        }
        ?>
    </title>
</head>

<body>
    <?php navBar(); ?>

    <div class="wrapper detail">

        <div class="spacebetween">
            <a class="ariane" href="javascript:history.go(-1)">Retour à la page précédente</a>
            <?PHP if (isset($_SESSION["username"])) {
                if ($_SESSION["id"] == 1) {
                    $requete = "SELECT * FROM billets WHERE id_billet=" . $_GET["billet"];
                    $stmt = $db->query($requete);
                    $resultat = $stmt->fetchall(PDO::FETCH_ASSOC);

                    foreach ($resultat as $row) {
                        echo '<div><a type="button" class="btn btn-warning" href="edit.php?action=edit & id=' . $row['id_billet'] . '">&#9998;</a>&nbsp;&nbsp;<a type="button" class="btn btn-danger" onclick="openPopup()">&#128465;</a></div>';
                    };
                }
            } ?>
        </div>


        <div class="flex">
            <?php
            // afficheDetailArticle();

            foreach ($resultdetail as $value) {
                echo
                '<article><h2>' . $value["titre"] . '</h2>' .
                    '<h6>Publié le ' . date('M d, Y', strtotime($value["date_creation"])) . " par " . $value["auteur"] . '</h6>' .
                    '<p>' . $value["contenu"] . '</p></article>';
            }

            echo '</div><h3>' . $resultnombre["commentaires"] . ' commentaires</h3>';

            ?>
            <div id="comments">
                <section class="commentaires">
                    <?php
                    foreach ($resultcommentaires as $value) {
                        echo
                        '<div class="commentaire">' .
                            '<h6>Publié le ' . date('M d, Y', strtotime($value["date_commentaire"])) . " par " . $value["username"] . '</h6>' .
                            '<p>' . $value["commentaire"] . '</p>' .
                            '</div>';
                    };
                    if ($resultcommentaires == false) {
                        echo '<div class="commentaire"><p>Pas de commentaires pour le moment. Soyez le premier.</p></div>';
                    };


                    echo "</section>";
                    if (isset($_SESSION["username"])) {
                        echo '<form name="commentaires" method="POST" action="commentaires.php?billet=' . $_GET["billet"] . '"><textarea id="contenu" name="commentaire" placeholder="Commentez ici..." require></textarea><input type="submit" id="publier" name="commenter" value="Publier votre commentaire"></form>';
                    } else {
                        echo "<article class='note'><p>Vous devez être connecté pour commenter un article.</p><br><a class='lien' href='login.php?action=signin'><b>S'inscrire</b></a> ou <a class='lien' href='login.php?action=login'><b>se connecter ?</b></a></article>";
                    };
                    if (isset($_SESSION["username"])) {
                        if (isset($_POST["commenter"])) {
                            insertCommentaires($auteur, $contenu, $ext);
                            header("Location: commentaires.php?billet=" . $_GET['billet'] . "");
                        }
                    };
                    ?>
            </div>


        </div>

    </div>

    <!-- <div id="popup" class="overlay">
        <div class="note">
            <p>Êtes-vous sûr de vouloir supprimer l'article ?</p><br>
            <a class="lien" onclick="closePopup()">Non, plus trop sûr(e) en fait...</a>&#160;&#160;
            <?php
            // echo '<a type="button" class="btn btn-danger" href="delete.php?type=billet&delete & id=' . $row['id_billet'] . '">Oui, je veux supprimer ce billet</a>'
            ?>
        </div>
    </div> -->

    <?php echo '<div id="popup" class="overlay"><div class="note"><p>Êtes-vous sûr de vouloir supprimer l\'article ?</p><br><a class="lien" onclick="closePopup()">Non, plus trop sûr(e) en fait...</a>&#160;&#160;&#160;&#160;&#160;<a type="button" class="btn btn-danger" href="delete.php?type=billet&delete & id=' . $_GET["billet"] . '">Oui, je veux supprimer cet article</a></div></div>'
    ?>
    <footer>
        <h6>© Amel Chabah - 2022 - tous droits réservés</h6>
    </footer>
</body>

</html>