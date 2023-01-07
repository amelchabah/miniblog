<!DOCTYPE html>
<html lang="en">

<head>
    <?php head(); ?>
    <title>Archives</title>
</head>

<body>
    <?php navBar(); ?>
    <div class="wrapper">
        <div class="center">
            <h1>Bienvenue dans les archives! &#11088;</h1>
            <p>Ici, vous pourrez consulter tous les articles publiés.</p><br>
            <input type="text" id="recherche" onkeyup="filterArticles()" placeholder="Rechercher par titre">

        </div>

        <section class="archives">
            <?php
            foreach ($resultarchives as $value) {
                echo '<a class="article" href="commentaires.php?billet=' . $value["id_billet"] . '">' .
                    '<article>' .
                    '<h2>' . $value["titre"] . '</h2>' .
                    '<h6>Publié le ' . date('M d, Y', strtotime($value["date_creation"])) . " par " . $value["auteur"] . '</h6>' .
                    '<p>' . mb_strimwidth($value["contenu"], 0, 100, "...") . '</p>' .
                    '</article>' .
                    '</a>';
            }
        
            ?>
            <p class="center" id="erreurarchives">&#128546; Oops, aucun article ne semble correspondre à votre recherche.</p>
        </section>
    </div>

    <footer>
        <h6>© Amel Chabah - 2022 - tous droits réservés</h6>
    </footer>
</body>


</html>