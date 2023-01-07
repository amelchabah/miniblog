<!DOCTYPE html>
<html lang="en">

<head>
	<?php head(); ?>
	<title>Connexion</title>
</head>

<body>
	<?php navBar(); ?>

	<?php if (isset($_SESSION["username"])) {
		echo "<div class=\"formulaire\">Vous êtes déjà connecté en tant que {$_SESSION["username"]}</div>";
	} else {
	?>

		<div class="formulaire">
			<form action="login.php?action=login" method="POST">
				<h2>Quel plaisir de vous revoir! &#128522;</h2>
				<label>Identifiant</label><br>
				<input type=text name="username" placeholder="Saisissez votre identifiant" required>
				<?php
				if (isset($err) && $err == "username") {
					echo "<br><h6 style='color:#FF4C4C'>Cet identifiant n'existe pas. Veuillez en saisir un autre.</h6>";
				};
				?>
				<br>
				<label>Mot de passe</label><br>
				<input type="password" name="password" placeholder="Saisissez votre mot de passe" required>
				<?php
				if (isset($err) && $err == "password") {
					echo "<br><h6 style='color:#FF4C4C'>Votre mot de passe est incorrect</h6>";
				};

				?><br>
				<input type=submit name="login" value="Se connecter">
			</form>
				<!-- <script type="text/javascript">
					alert("Connexion déroulée avec succès!");
					window.location = "index.php";
				</script> -->
			<?php
			}; ?>
		</div>
	<footer>
		<h6>© Amel Chabah - 2022 - tous droits réservés</h6>
	</footer>
</body>

</html>