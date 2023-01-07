<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles.css" rel="stylesheet" type="text/css">
    <title>Déconnexion</title>
</head>
<body>
<?php
session_start();
session_destroy();
echo '<p>Vous avez été déconnecté. Veuillez patienter, vous serez redirigé dans un instant.</p>';
?>
<script>

setTimeout(() => {
    window.location="index.php";
},1500)

</script>
</body>
</html>