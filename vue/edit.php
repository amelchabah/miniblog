<!DOCTYPE html>
<html lang="en">

<head>
    <?php head();
    if (empty($_GET['id'])) {
        header("Location:404.php");
    }
    ?>
    <title>Édition de l'article</title>

</head>


<body>
    <?php navBar(); ?>

    <div class="wrapper detail">

        <?php
        $requete = 'SELECT * FROM billets WHERE id_billet =' . $_GET['id'];
        $stmt = $db->query($requete);
        $resultat = $stmt->fetchall(PDO::FETCH_ASSOC);
        foreach ($resultat as $row) {
            $aa = $row['id_billet'];
            $bb = $row['titre'];
            $cc = $row['contenu'];
        }
        $id = $_GET['id'];
        if (isset($_SESSION["username"])) {
            if ($_SESSION["id"] == 1) {
        ?>
                <div class="spacebetween">
                    <a class="ariane" href="javascript:history.go(-1)">Retour à la page précédente</a>
                </div>
                <article>
                    <h2>Modifier l'article</h2>

                    <form class="edit" role="form" method="post" action="">
                        <input type="hidden" name="id" value="<?php echo $aa; ?>">
                        <label for="titre">Titre</label>
                        <input placeholder="Titre" name="titre" value="<?php echo $bb; ?>">
                        <label for="contenu">Contenu</label>
                        <textarea placeholder="Contenu" name="contenu"><?php echo $cc; ?></textarea>
                        <input type="submit" name="update" value="Mettre à jour l'article">

                        <?php if (isset($_POST["update"])) {
                            $id = $_POST['id'];
                            $title = $_POST['titre'];
                            $content = $_POST['contenu'];

                            $query = 'UPDATE billets set titre ="' . $title . '", contenu ="' . $content . '", date_creation = Now() WHERE id_billet ="' . $id . '"';
                            $db->query($query);
                        ?>
                            <script type="text/javascript">
                                alert("Article modifié avec succès.");
                                window.location = "admin.php";
                            </script>
                        <?php
                        }; ?>
                    </form>
                </article>

        <?php
            } else {
                echo '<div><p>Vous devez être connecté en tant qu\'administrateur pour modifier un article.</p><br><a href="index.php"><div class="lien">Retournez à l\'accueil</div></a></div>';
            }
        } else {
            echo '<div><p>Vous devez être connecté en tant qu\'administrateur pour modifier un article.</p><br><a href="index.php"><div class="lien">Retournez à l\'accueil</div></a></div>';
        };
        ?>

    </div>

    <footer>
        <h6>© Amel Chabah - 2022 - tous droits réservés</h6>
    </footer>
</body>

</html>