<!DOCTYPE html>
<html lang="en">

<head>
	<?php head();
	if (empty($_GET['id'])) {
		header("Location:404.php");
	} ?>
	<title>Suppression de l'article</title>
</head>

<body>
	<?php navBar(); ?>
	<div class="wrapper detail">

		<?php
		$query = 'DELETE FROM billets WHERE id_billet = ' . $_GET['id'];
		$db->query($query);

		?>
		<script type="text/javascript">
			alert("Article supprimé avec succès.");
			window.location = "admin.php";
		</script>

	</div>
	<footer>
		<h6>© Amel Chabah - 2022 - tous droits réservés</h6>
	</footer>
</body>

</html>