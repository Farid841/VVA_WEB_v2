<?php
$title = "Consulter hebergement";
require_once('../includes/session.php');
require_once('../includes/fonctions.php');
require_once("../includes/header.php");

if ((isset($_GET['ajout']) == 1)) {
	echo "<script>alert('Votre ajout a été pris en compte')</script>";
}

?>

<strong>
	<h3 align="center"> CONSULTER LES HÉBERGEMENTS
</strong>
<br>
<a href="NouvelleHebergement.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" style="background-color: #5da02f">AJOUTER</a>
</h3>

<style>
	.col-lg-12 {
		height: 40%;
	}
</style>

<?php
// APPEL DE LA RECHERCHE
include("../includes/recherche_heb.php");



?>


<div class="container" align="center" class="row col-sm-10 col-md-10 col-lg-10">
	<table class='table table-bordered table-condensed table-body-center table-hover table-striped'>
		<tr style='background-color:#60B8CA'>
			<th style='border-right:1px solid #C0C0C0 ;'>
				<h5 align='center' style='color:white'>Photo</h5>
			</th>
			<th style='border-right:1px solid #C0C0C0 ;'>
				<h5 align='center' style='color:white'>Nom </h5>
			</th>
			<th style='border-right:1px solid #C0C0C0 ;'>
				<h5 align='center' style='color:white'>Type </h5>
			</th>
			<th style='border-right:1px solid #C0C0C0 ;'>
				<h5 align='center' style='color:white'>Tarif </h5>
			</th>
			<th style='border-right:1px solid #C0C0C0 ;'>
				<h5 align='center' style='color:white'>Nombre de place</h5>
			</th>
			<th style='border-right:1px solid #C0C0C0 ;'>
				<h5 align='center' style='color:white'>Surface</h5>
			</th>
			<th style='border-right:1px solid #C0C0C0 ;'>
				<h5 align='center' style='color:white'>Description</h5>
			</th>
			<th style='border-right:1px solid #C0C0C0 ;'>
				<h5 align='center' style='color:white'>Orientation</h5>
			</th>
			<th style='border-right:1px solid #C0C0C0 ;'>
				<h5 align='center' style='color:white'>Modification</h5>
			</th>
			<th style='border-right:1px solid #C0C0C0 ;'>
				<h5 align='center' style='color:white'>Suppression</h5>
			</th>
		</tr>

		<?php
		if (isset($_SESSION['type_compte']) && ($_SESSION['type_compte']  == "Ges" || $_SESSION['type_compte'] == "Adm")) {

			if (isset($_POST['Recherche'])) {

				$res = RechercheHebByRecherche($_POST);
				if ($res) {

					while ($hebergement = mysqli_fetch_array($res)) {
						echo "<tr>";
						echo "<td style='width:200px;'>";
						echo "<img style='width:100%;'src=image/" . $hebergements['PHOTOHEB'] . ">";
						echo "</td>";

						echo "<td>";
						echo $hebergements['NOMHEB'];
						echo "</td>";

						echo "<td>";
						echo $hebergements['CODETYPEHEB'];
						echo "</td>";

						echo "<td>";
						echo $hebergements['TARIFSEMHEB'];
						echo "</td>";

						echo "<td>";
						echo $hebergements['NBPLACEHEB'];
						echo "</td>";

						echo "<td>";
						echo $hebergements['SURFACEHEB'];
						echo "</td>";

						echo "<td>";
						echo $hebergements['DESCRIHEB'];
						echo "</td>";
						echo "<td>";
						echo $hebergements['ORIENTATIONHEB'];
						echo "</td>";

						echo '<td><a href="hebergementModifier.php?noheb=' . $hebergements['NOHEB'] . '">';
						echo "<input type='submit' name='Modifier' value='Modifier' class='btn btn-warning'>";
						echo "</a></td>";

						echo '<td><a href="trt_supprimer.php?noheb=' . $hebergements['NOHEB'] . '">';
						echo "<input type='submit' name='Suprimer' value='Supprimer' class='btn btn-danger'>";
						echo "</td>";

						echo '<td><a href="trt_ajouter.php?noheb=' . $hebergements['NOHEB'] . '">';
						echo "<input type='submit' name='Ajouter' value='Ajouter' class='btn btn-danger'> </a>";
						echo "</td>";

						echo '<td><a href="hebergement.php?noheb=' . $hebergements['NOHEB'] . '">';
						echo "<input type='submit' name='Voir hebergement' value='Voir hebergement' class='btn btn-danger'> </a>";
						echo "</td>";
					}
				} else
					echo 'NO-DATA';
			} else {
				$getHebs = GetLesHebergement();
				if ($getHebs) {

					while ($hebergements = mysqli_fetch_array($getHebs, MYSQLI_ASSOC)) {

						//var_dump($value);
						echo "<tr>";
						echo "<td style='width:200px;'>";
						echo "<img style='width:100%;'src=image/" . $hebergements['PHOTOHEB'] . ">";
						echo "</td>";

						echo "<td>";
						echo $hebergements['NOMHEB'];
						echo "</td>";

						echo "<td>";
						echo $hebergements['CODETYPEHEB'];
						echo "</td>";

						echo "<td>";
						echo $hebergements['TARIFSEMHEB'];
						echo "</td>";

						echo "<td>";
						echo $hebergements['NBPLACEHEB'];
						echo "</td>";

						echo "<td>";
						echo $hebergements['SURFACEHEB'];
						echo "</td>";

						echo "<td>";
						echo $hebergements['DESCRIHEB'];
						echo "</td>";
						echo "<td>";
						echo $hebergements['ORIENTATIONHEB'];
						echo "</td>";

						echo '<td><a href="hebergementModifier.php?noheb=' . $hebergements['NOHEB'] . '">';
						echo "<input type='submit' name='Modifier' value='Modifier' class='btn btn-warning'>";
						echo "</a></td>";

						echo '<td><a href="trt_supprimer.php?noheb=' . $hebergements['NOHEB'] . '">';
						echo "<input type='submit' name='Suprimer' value='Supprimer' class='btn btn-danger'>";
						echo "</td>";

						echo '<td><a href="trt_ajouter.php?noheb=' . $hebergements['NOHEB'] . '">';
						echo "<input type='submit' name='Ajouter' value='Ajouter' class='btn btn-danger'> </a>";
						echo "</td>";

						echo '<td><a href="hebergement.php?noheb=' . $hebergements['NOHEB'] . '">';
						echo "<input type='submit' name='Voir hebergement' value='Voir hebergement' class='btn btn-danger'> </a>";
						echo "</td>";
					}
				} else
					echo "NO-DATA";
			}
		} else
			echo "Seule les gestionnaires et les administrateur peuvent y acceder  $_SESSION";
		?>
	</table>

	<br>
</div>


<?php include "../includes/footer.php"; ?>