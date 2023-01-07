<?php session_start();
include('model.php');


if(isset($_GET["action"]) && $_GET["action"] == 'login') {
	if (isset($_POST["login"])) {
	$login = logIn();
	switch ($login) {
		case 1:
			header('Location:index.php');
			break;
		case 2:
			$err = "password";
			// header('Location:login.php?action=login&err=password');
			break;
		case 3:
			$err = "username";
			// header('Location:login.php?action=login&err=username');
			break;
	}}
	include('vue/login.php');


} else if (isset($_GET["action"]) && $_GET["action"] == 'signin') {
	if (isset($_POST["inscrire"])) {
		header('Location:index.php');
	$signin = signIn();
}
include('vue/inscription.php');
}
