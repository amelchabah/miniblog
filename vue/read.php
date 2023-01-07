<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    head();
    ?>

    <title> <?php
            $requete = "SELECT * FROM billets WHERE id_billet=" . $_GET["billet"];
            $stmt = $db->query($requete);
            $resultat = $stmt->fetchall(PDO::FETCH_ASSOC);

            foreach ($resultat as $billet) {
                echo "{$billet["titre"]}";
            }
            ?></title>
</head>


<body>
    <?php navBar(); ?>

    <div class="wrapper detail">


        <div class="spacebetween">
            <a class="ariane" href="javascript:history.go(-1)">Retour à la page précédente</a>
            <?php $requete = "SELECT * FROM billets WHERE id_billet=" . $_GET["billet"];
            $stmt = $db->query($requete);
            $resultat = $stmt->fetchall(PDO::FETCH_ASSOC);

            if (isset($_SESSION["username"])) {
                if ($_SESSION["id"] == 1) {
                    foreach ($resultat as $row) {
                        echo '<div><a type="button" class="btn btn-warning" href="edit.php?action=edit & id=' . $row['id_billet'] . '">&#9998; MODIFIER</a>&nbsp;&nbsp;<a type="button" class="btn btn-danger" onclick="openPopup()">&#128465; SUPPRIMER</a></div>';
                    };
                } ?>
        </div>

    <?php
                foreach ($resultdetail as $value) {
                    echo
                    '<article><h2>' . $value["titre"] . '</h2>' .
                        '<h6>Publié le ' . date('M d, Y', strtotime($value["date_creation"])) . " par " . $value["auteur"] . '</h6>' .
                        '<p>' . $value["contenu"] . '</p></article>';
                }

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

                echo '<div id="popup" class="overlay"><div class="note"><p>Êtes-vous sûr de vouloir supprimer l\'article ?</p><br><a class="lien" onclick="closePopup()">Non, plus trop sûr(e) en fait...</a>&#160;&#160;&#160;&#160;&#160;<a type="button" class="btn btn-danger" href="delete.php?type=billet&delete & id=' . $_GET["billet"] . '">Oui, je veux supprimer cet article</a></div></div>';
            }
    ?>

    </div>
    <footer>
        <h6>© Amel Chabah - 2022 - tous droits réservés</h6>
    </footer>

</body>

</html>