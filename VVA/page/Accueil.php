<?php
require_once('../includes/session.php');
require_once('../includes/header.php');
?>

<!-- A PROPOS-->
<div class="desc" id="about">
	<div class="titre">
		<p align="center"><strong>
				<img src="../image/HEBERGEMENT.png" alt="..." class="imgH">
				<font size="5" color="green"> VVA</font>
				<img src="../image/HEBERGEMENT.png" alt="..." class="imgH">
			</strong></p>
	</div>

	<p class="t1a" align="center"><strong>
			L'association VVA (Village Vacances Alpes) se situe dans les Alpes et vous propose des herbegements a en
			couper le souffle. Glaciers, moyennes montagnes, stations villages et grandes stations internationales
			composent les Alpes du nord. Avec un séjour au ski dans les Alpes du nord, vous pourrez ainsi profiter
			de
			magnifiques paysages et de pistes tous niveaux. Chez <font size="3" color="green">VVA</font>, vous
			trouverez des hébergements situés au cœur de nombreuses stations dans les Alpes du nord. De plus, nous
			proposons de nombreux logements skis aux pieds qui vous permettront de profiter pleinement des pistes.
			Découvrez sans plus attendre nos chalets tout confort, nos résidences avec piscine, ou encore nos
			établissements haut de gamme, pour un séjour au ski exceptionnel dans les Alpes du nord !

		</strong></p>

</div>

<!-- FIN A PROPOS -->


<!-- HEBERGEMENT-->
<p align="center" id="hebergement">
	<img src="../image/heberg.png" alt="..." class="imgheber">

<div class="card-deck">
	<div class="card">
		<img class="card-img-top" src="../image/appart1.jpg" alt="Card image cap" height="342px" width="160px">
		<div class="card-body">
			<a href="user_consulter.php?type=AP" class="btn btn-primary">Appartement</a>
		</div>
	</div>


	<div class="card">
		<img class="card-img-top" src="../image/bungalow1.jpg" alt="Card image cap" height="342px" width="160px">
		<div class="card-body">

			<a href="user_consulter.php?type=BU" class="btn btn-primary">Bungalow</a>
		</div>
	</div>

	<div class="card">
		<img class="card-img-top" src="../image/home1.jpg" alt="Card image cap" height="342px" width="160px">
		<div class="card-body">
			<a href="user_consulter.php?type=MH" class="btn btn-primary">Mobil-Home</a>
		</div>
	</div>

	<div class="card">
		<img class="card-img-top" src="../image/chalet1.jpg" alt="Card image cap" height="342px" width="160px">
		<div class=" card-body">
			<a href="user_consulter.php?type=CH" class="btn btn-primary">Chalet</a>
		</div>
	</div>
</div>

<!-- FIN HEBERGEMENT -->


<!-- GALERIE -->
<p align="center" id="galerie">
	<img src="../image/gale.png" alt="..." class="galerie">



<div class="cadre-diapo">
	<img class="diapo" src="../image/index.jpg" alt>
	<img class="diapo" src="../image/appart3.jpg" alt>
	<img class="diapo" src="../image/index.jpg" alt>
	<img class="diapo" src="../image/neige.jpg" alt>
	<img class="diapo" src="../image/index.jpg" alt>
	<img class="diapo" src="../image/jour1.jpg" alt>
	<img class="diapo" src="../image/jour2.jpg" alt>
	<img class="diapo" src="../image/neigesoir.jpg" alt>
	<button class="precedent" aria-label="précédent" onclick="boutons(-1)">❮</button>
	<button class="suivant" aria-label="suivant" onclick="boutons(1)">❯</button>
</div>
<div class=cadre-demo>
	<button class="demo" onclick="actifIndic(1)">1</button>
	<button class="demo" onclick="actifIndic(2)">2</button>
	<button class="demo" onclick="actifIndic(3)">3</button>
	<button class="demo" onclick="actifIndic(4)">4</button>
	<button class="demo" onclick="actifIndic(5)">5</button>
	<button class="demo" onclick="actifIndic(6)">6</button>
	<button class="demo" onclick="actifIndic(7)">7</button>
	<button class="demo" onclick="actifIndic(8)">8</button>
</div>


<!-- JAVA DIAPO-->
<script>
	var diaporama = 1;
	affichage(diaporama);

	function boutons(n) {
		affichage(diaporama += n);
	}

	function actifIndic(n) {
		affichage(diaporama = n);
	}

	function affichage(n) {
		var i;
		var diapoImg = document.getElementsByClassName("diapo");
		var indic = document.getElementsByClassName("demo");
		if (n > diapoImg.length) {
			diaporama = 1
		}
		if (n < 1) {
			diaporama = diapoImg.length
		}
		for (i = 0; i < diapoImg.length; i++) {

			diapoImg[i].style.opacity = "0";
		}
		for (i = 0; i < indic.length; i++) {
			indic[i].className = indic[i].className.replace(" numeros", "");
		}
		diapoImg[diaporama - 1].style.opacity = "1";
		indic[diaporama - 1].className += " numeros";
	}
</script>
<!-- FIN JAVA DIAPO-->

<br>
</body>

<?php
include "../includes/footer.php";
//include "includes/footer.php";


?>


</html>