<!DOCTYPE html>
<html lang="en">

<head>
    <?php head(); ?>
    <title>Miniblog</title>
</head>

<body>
    <?php
    navBar();
    ?>

    <div class="wrapper">
        <?php
        if (isset($_SESSION["username"])) {
            echo "<div class='spacebetween'>";
            echo "<h1>Bienvenue " . ucfirst($_SESSION["username"]) . " ! &#128522;</h1>";
            if ($_SESSION["id"] == 1) {
                echo ('<a href="admin.php"><div class="lien">Accéder au back-office</div></a>');
            }
            echo "</div>";
        } else {
            echo '<h1>Bienvenue cher visiteur ! &#128521;</h1>';
        };

        ?>
        <br>
        <p>Bienvenue sur le blog du développeur! Vous retrouverez ici des conseils, tutoriels et guides, bonne lecture!</p>
        <section class="last">
            <h3>Derniers articles</h3>
            <div class="archives">
                <?php
                foreach ($resultderniersarticles as $value) {
                    echo '<a href="commentaires.php?billet=' . $value["id_billet"] . '">' .
                        '<article>' .
                        '<h2>' . $value["titre"] . '</h2>' .
                        '<h6>Publié le ' . date('M d, Y', strtotime($value["date_creation"])) . " par " . $value["auteur"] . '</h6>' .
                        '<p>' . mb_strimwidth($value["contenu"], 0, 100, "...") . '</p>' .
                        '</article>' .
                        '</a>';
                } ?>
            </div>
            <a href="archives.php">
                <div class="lien">Voir plus d'articles</div>
            </a>
        </section>


    </div>

    <footer>
        <h6>© Amel Chabah - 2022 - tous droits réservés</h6>
    </footer>
</body>

</html>