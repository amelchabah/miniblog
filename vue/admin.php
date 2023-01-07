<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    head();
    ?>
    <title>Back-office</title>
</head>

<body>
    <?php
    navBar()    ?>

    <div class="wrapper backoffice">

        <?php if (isset($_SESSION["username"])) {
            if ($_SESSION["id"] == 1) { ?>

                <div class="spacebetween">
                    <h1>&#128295;&nbsp;&nbsp;Tableau de bord</h1>

                    <div class="navbar">
                        <input type="text" id="myInput" onkeyup="filterBackoffice()" placeholder="Rechercher par titre">
                        <a type="button" href="new.php">
                            <div id="btntexte" class="lien">Ajouter un nouvel article</div>
                            <div id="btnemoji" class="lien">&#10133;</div>
                        </a>

                    </div>
                </div>
                <br>


                <div class="table-responsive">
                    <table id="myTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Titre</th>
                                <th>Contenu</th>
                                <th>Auteur</th>
                                <th>Dernière mise à jour</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($resultbackoffice as $row) {
                                echo '<tr>';
                                echo '<td>' . $row['id_billet'] . '</td>';
                                echo '<td><b>' . $row['titre'] . '</b></td>';
                                echo '<td>' . mb_strimwidth($row["contenu"], 0, 60, "...") . '</td>';
                                echo '<td>&#128081;&nbsp;' . $row['auteur'] . '</td>';
                                echo '<td>' . $row['date_creation'] . '</td>';
                                echo '<td><div style="display:flex; gap:1rem"><a type="button" class="btn btn-xs btn-info" href="read.php?billet=' . $row['id_billet'] . '" >&#128065;</a>';
                                echo '<a type="button" class="btn btn-xs btn-warning" href="edit.php?action=edit & id=' . $row['id_billet'] . '">&#9998;</a>';
                                echo '<a type="button" class="btn btn-xs btn-danger" onclick="return confirm(`Êtes-vous sûr de vouloir supprimer l\'article ?`)" href="delete.php?type=billet&delete & id=' . $row['id_billet'] . '">&#128465;</a></div></td>';
                                echo '</tr>';
                            };

                            ?>
                        </tbody>
                    </table>
                    <br>
                    <p class="center" id="erreurback">&#128546; Oops, aucun article ne semble correspondre à votre recherche.</tp>

                </div>
        <?php } else {
                echo '<div><p>Vous devez être connecté en tant qu\'administrateur pour accéder au back-office de ce blog.</p><br><a href="index.php"><div class="lien">Retournez à l\'accueil</div></a></div>';
            }
        } else {
            echo '<div><p>Vous devez être connecté en tant qu\'administrateur pour accéder au back-office de ce blog.</p><br><a href="index.php"><div class="lien">Retournez à l\'accueil</div></a></div>';
        }; ?>

    </div>

    <footer>
        <h6>© Amel Chabah - 2022 - tous droits réservés</h6>
    </footer>
</body>

</html>