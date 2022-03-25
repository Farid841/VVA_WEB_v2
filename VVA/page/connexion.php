<?php
require_once('../includes/session.php');
require_once('../includes/header.php');

?>

<h2><a href="Accueil.php" class="btn btn-primary">RETOUR</a></h2>
<div id="container">
	<!-- zone de connexion -->

	<form action="../traitement/traitement_connexion.php" method="POST">
		<h1>Connexion</h1>

		<label><b>Nom d'utilisateur</b></label>
		<input type="text" placeholder="Entrer le nom d'utilisateur" name="login" required>

		<label><b>Mot de passe</b></label>
		<input type="password" placeholder="Entrer le mot de passe" name="password" required>

		<input type="submit" id='submit' value='LOGIN'>
	</form>
	<?php
	if (isset($_GET['erreur'])) {
		$err = $_GET['erreur'];
		if ($err == 1)
			echo "<script>alert('Votre nom utilisateur ou mot de passe est incorrect')</script>";
	}
	?>
</div>

<?php include('../includes/footer.php'); ?>