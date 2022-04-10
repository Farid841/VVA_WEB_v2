<?php
$title = " Voir un Hebergement";
require_once("../includes/session.php");
require_once("../includes/fonctions.php");
require_once('../includes/header.php');
?>

<!-- CHALET-->
<p align="center" id="Appartement"></p>

<div class="card-deck">
	<?php
	$hebergement = GetHebergementChoisi($_GET['noheb']);
	if ($hebergement['INTERNET'] == 1) {
		$internet = "Internet est disponible";
	} else {
		$internet = "Internet non disponible";
	}

	echo "<div class='card'>
						<img class='card-img-top' src='../image/" . $hebergement['PHOTOHEB'] . "' alt='Card image cap' height='342px' width='160px'>
						<div class='card-body'>
							<p><strong>" . $hebergement['NOMHEB'] . "</strong></p>
							<p>Description: " . $hebergement['DESCRIHEB'] . "</p>
							<p>Nombre de place: " . $hebergement['NBPLACEHEB'] . "</p>
							<p>Surface d'hébergement: " . $hebergement['SURFACEHEB'] . "</p>
							<p>Année de construction: " . $hebergement['ANNEEHEB'] . "</p>
							<p>" . $internet . "</p>
							<p>Secteur: " . $hebergement['SECTEURHEB'] . "</p>
							<p>Orientation de l'hébergement: " . $hebergement['ORIENTATIONHEB'] . "</p>
							<p>Etat: " . $hebergement['ETATHEB'] . "</p>
							<p>Tarif par semaine: " . $hebergement['TARIFSEMHEB'] . "</p>";

	if (isset($_SESSION['type_compte']) && ($_SESSION['type_compte'] == "Ges" || $_SESSION['type_compte'] == "Adm" ||  $_SESSION['type_compte'] == "Vac")) {
		echo	"<a href='formulaireReservation.php?noheb=" . $hebergement['NOHEB'] . "' class='btn btn-primary'>Réserver</a>";
	}


	echo "</div>
						</div>";

	?>

</div>
</body>
<br>
<?php include "../includes/footer.php"; ?>