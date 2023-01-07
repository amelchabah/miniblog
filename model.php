<?php

//connexion BDD
function connection()
{
    $db = new PDO('mysql:host=localhost; dbname=miniblog; charset=utf8; port=3306', 'root', '');
    $db->query('SET NAMES utf8mb4');
    return $db;
}

//fonctions d'affichage
function head()
{
    echo '<meta charset="UTF-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1.0"><link href="styles.css" rel="stylesheet" type="text/css"><link rel="apple-touch-icon" sizes="180x180" href="./img/apple-touch-icon.png"><link rel="icon" type="image/png" sizes="32x32" href="./img/favicon-32x32.png"><link rel="icon" type="image/png" sizes="16x16" href="./img/favicon-16x16.png"><link rel="manifest" href="./img/site.webmanifest"><script src="script.js" type="text/javascript"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>';
}

// barre de navigation variable
function navBar()
{
    echo '<nav><a href="index.php" style="font-size:1.5rem">&#128171;</a><div class="navbar"><a href="archives.php"><h3>Archives</h3></a>';
    if (isset($_SESSION["username"])) {
        echo "<a href='deconnexion.php'><h3>Déconnexion</h3></a>";
    } else {
        echo ('<a href="login.php?action=login"><h3>Connexion</h3></a><a href="login.php?action=signin"><h3>Inscription</h3></a>');
    };
    echo '</div></nav>';
}



// COMPTES

// login
function logIn()
{
    $db = connection();
    $db->query('SET NAMES utf8');

    // requete préparée :
    $requete = "SELECT * FROM utilisateurs WHERE username=:username";
    $stmt = $db->prepare($requete);
    $stmt->bindParam(':username', $_POST["username"], PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowcount() == 1) {
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if (password_verify($_POST["password"], $result["password"])) {
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["id"] = $result["id"];
            return 1;
        } else {
            return 2;
        }
    } else {
        return 3;
    }
}



// inscription

function signIn()
{
    $db = connection();
    $requete = "INSERT INTO utilisateurs VALUES (NULL,:nom,:prenom,:username,:password)";

    $stmt = $db->prepare($requete);
    $stmt->bindParam(':nom', $_POST["nom"], PDO::PARAM_STR);
    $stmt->bindParam(':prenom', $_POST["prenom"], PDO::PARAM_STR);
    $stmt->bindParam(':username', $_POST["username"], PDO::PARAM_STR);
    $hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $stmt->bindParam(':password', $hash, PDO::PARAM_STR);
    $stmt->execute();

    $requete2 = "SELECT id FROM utilisateurs WHERE username='" . $_POST["username"] . "'";
    $stmt = $db->query($requete2);
    $result = $stmt->fetch();

    $_SESSION["username"] = $_POST["username"];
    $_SESSION["id"] = $result["id"];
}



// ARTICLES

// afficher les billets
function afficheArchives()
{
    $db = connection();
    $requete = "SELECT * FROM billets, utilisateurs WHERE billets.auteur=utilisateurs.username ORDER BY id_billet DESC";
    $stmt = $db->prepare($requete);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
};

// afficher les 3 derniers billets
function afficheDerniersArticles()
{
    $db = connection();
    $requete = "SELECT * FROM billets, utilisateurs WHERE billets.auteur=utilisateurs.username ORDER BY id_billet DESC LIMIT 3";
    $stmt = $db->prepare($requete);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
};

// afficher les détails de l'article sélectionné
function afficheDetailArticle($billet)
{
    $db = connection();
    $requete = "SELECT * FROM billets, utilisateurs WHERE " . $billet . "=billets.id_billet AND billets.auteur=utilisateurs.username";
    $stmt = $db->prepare($requete);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

// insérer un nouveau billet dans la base de données
function insertArticle($titre, $contenu, $auteur)
{
    $db = connection();
    $auteur = $_SESSION['username'];
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
    $insert = "INSERT INTO billets (id_billet, titre, contenu, auteur, date_creation) VALUES (NULL,'$titre','$contenu','$auteur', Now())";
    $db->query($insert);
};



// COMMENTAIRES

// afficher les commentaires
function afficheCommentaires($billet)
{
    $db = connection();
    $requete = 'SELECT * FROM commentaires, billets, utilisateurs WHERE ' . $billet . '=billets.id_billet AND billets.id_billet=commentaires.ext_billet AND commentaires.auteur=utilisateurs.username ORDER BY commentaires.id DESC';
    $stmt = $db->prepare($requete);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
};

// insérer les commentaires dans la base de données
function insertCommentaires($contenu, $auteur, $ext)
{
    $db = connection();
    $auteur = $_SESSION["username"];
    $contenu = $_POST["commentaire"];
    $ext = $_GET["billet"];
    $insert = "INSERT INTO commentaires (id, ext_billet, auteur, commentaire, date_commentaire) VALUES (NULL,\"$ext\",\"$auteur\",\"$contenu\", Now())";
    $db->query($insert);
};

// afficher le nombre de commentaires du billet
function afficheNombreCommentaires($billet)
{
    $db = connection();
    $requete = $db->query("SELECT COUNT(*) as commentaires FROM commentaires WHERE ext_billet=" . $billet);
    $resultat = $requete->fetch();
    return $resultat;
}

// afficher tous les billets par ordre de date décroissant
function backOfficeTable()
{
    $db = connection();
    $requete = 'SELECT * FROM billets ORDER BY date_creation DESC';
    $stmt = $db->query($requete);
    $resultat = $stmt->fetchall(PDO::FETCH_ASSOC);
    return $resultat;
}