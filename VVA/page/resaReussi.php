<?php
$title = "reservation reussite";

require_once('../includes/session.php');
require_once('../includes/fonctions.php');
require_once('../includes/header.php');

//Reserver 
CreateSemaine();
if (isset($_POST['Valider'])) {

  if (Reserver($_POST['noheb'], $_POST['date'], $_POST['nombrePersonne'], $_POST['prix'])) {
    $idresa = (int) GetLastIdResa();
    $subTitle = "Reservation reussite";
    $description = "L'identifiant de votre reservation est " . $idresa . " Nous vous informons de la fin de la transaction";
    include "../includes/message_template.php";
  } else {
    echo "Reservation echoué";
  }
}

?>


<?php include "../includes/footer.php"; ?>
