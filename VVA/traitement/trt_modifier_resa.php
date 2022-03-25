<?php
require_once('../includes/session.php');
require_once('../includes/fonctions.php');
require_once('../includes/header.php');

//Isset  : est ce que la valeur est definie
$no = isset($_POST['NORESA']) ? $_POST['NORESA'] : '';
if (SetResrvation()) {
  // CODE ORIGINE  // $req = "UPDATE resa SET DATEDEBSEM = '$DATE', NBOCCUPANT='$nbre_place' WHERE NORESA = '$no'";
  header("Location:reservationModifier.php?NORESA=$no&enregistrement=ok");
}
