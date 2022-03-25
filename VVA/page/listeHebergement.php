<?php
include("fonctions.php");
require_once('includes/header.php');
?>

<table class="listeH">
    <?php
    //Appel de la fonction 
    $listeH = GetLesHebergement();
    while ($row = mysqli_fetch_row($listeH)) {
        printf("%s (%s)\n", $row[0], $row[1]);
    }
    echo "
    <p><strong>" . $row['NOMHEB'] . "</strong></p>
    <p>Description: " . $row['DESCRIHEB'] . "</p>
    <p>Nombre de place: " . $row['NBPLACEHEB'] . "</p>
    <p>Surface d'hébergement: " . $row['SURFACEHEB'] . "</p>
    <p>Année de construction: " . $row['ANNEEHEB'] . "</p>
    <p>" . $internet . "</p>
    <p>Secteur: " . $row['SECTEURHEB'] . "</p>
    <p>Orientation de l'hébergement: " . $row['ORIENTATIONHEB'] . "</p>
    <p>Etat: " . $row['ETATHEB'] . "</p>
    <p>Tarif par semaine: " . $row['TARIFSEMHEB'] . "</p>";

    ?>

</table>


</body>
<br>
<br>
<?php include "IndicatinUtilisateur.php"; ?>