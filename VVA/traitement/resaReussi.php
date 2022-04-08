<?php
$title = "reservation reussite";

require_once('../includes/session.php');
require_once('../includes/fonctions.php');
//Reserver 
CreateSemaine();

if (isset($_POST['Valider'])) {

  if (Reserver($_POST['noheb'], $_POST['date'], $_POST['nombrePersonne'], $_POST['prix'])) {
    echo "Reservation reussi";
  } else {
    echo "Reservation echoué";
  }
}

?>


<?php include "../includes/footer.php"; ?>
