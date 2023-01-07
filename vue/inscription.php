<!DOCTYPE html>
<html lang="en">

<head>
    <?php head(); ?>
    <title>Inscription</title>
</head>

<body>
    <?php navBar(); ?>

    <?php if (isset($_SESSION["username"])) {
        echo "Bonjour {$_SESSION["username"]}<BR>";
    } else {
    ?>
        <div class="formulaire">
            <form action="login.php?action=signin" method="POST">
                <h2>Inscrivez-vous dès maintenant &#128522;</h2>
                <label for="username">Identifiant</label><span style="color:red"> *</span><INPUT type=text name="username" placeholder="Saisissez un identifiant" required><br>
                <label for="nom">Nom</label><span style="color:red"> *</span><INPUT type=text name="nom" placeholder="Saisissez votre nom" required><br>
                <label for="prenom">Prénom</label><span style="color:red"> *</span><INPUT type=text name="prenom" placeholder="Saisissez un prénom" required><br>
                <label for="password">Mot de passe</label><span style="color:red"> *</span><input type="password" name="password" placeholder="Saisissez un mot de passe" required><br>
                <input type=submit name="inscrire" value="S'inscrire">
            </form>
            <?php
            }; ?>
        </div>

    <?php
    if (isset($_SESSION["username"])) {
        echo "Vous êtes déja connecté en tant que {$_SESSION["username"]} <a href='deconnexion.php'>Déconnexion</a> <BR>";
    }
    ?>

    <footer>
        <h6>© Amel Chabah - 2022 - tous droits réservés</h6>
    </footer>
</body>

</html>