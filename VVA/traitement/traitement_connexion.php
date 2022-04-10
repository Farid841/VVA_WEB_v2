<?php

require_once('../includes/session.php');
require_once('../includes/fonctions.php');


if (isset($_POST['login']) && isset($_POST['password'])) {
	$login = htmlspecialchars($_POST['login']);
	$password = htmlspecialchars($_POST['password']);
	$bdd = Connect();

	if ($bdd) {
		$req = "SELECT * FROM compte WHERE USER= '" . $login . "' AND MDP= '" . $password . "'";

		$res = mysqli_query($bdd, $req);

		$num = mysqli_num_rows($res); // donne le nombre d'enrengistrement dans la base renvoyé par la requete

		if ($num == 1) {
			// CONNEXION
			$ligne = mysqli_fetch_array($res); // prends la premiere retourné par la bd ainsi que les colone dans un tableau dans l'autre

			$_SESSION['login'] = $login;

			$_SESSION['type_compte'] = $ligne["TYPECOMPTE"];
			if ($_SESSION['type_compte'] == "Adm" or $_SESSION['type_compte'] == "Ges" or $_SESSION['type_compte'] == "Vac") {
				header("location: ../page/Accueil.php");
			} else {
				header("location: ../page/Accueil.php");
			}
			mysqli_free_result($res); // libération de la mémoire des resultats
		} else {
			header("location:../page/connexion.php?erreur=1");
		}
		mysqli_close($bdd); // fermeture de la connexion
	} else {
		echo "<p> probleme de connexion au serveur</p>";
	}
}
