<?php
$title = "reservation reussite";
require_once('fonctions.php');
require_once('includes/header.php');
//Reserver 

if (isset($_POST['Valider'])) {
  if (Reserver($_POST['noheb'], $_POST['date'], $_POST['nombrePersonne'], $_POST['prix'])) {
    echo "Reservation reussi";
  } else {
    echo "Reservation echoué";
  }
}

?>


<?php include "IndicatinUtilisateur.php"; ?>