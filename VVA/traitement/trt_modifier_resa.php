<?php
require_once('../includes/session.php');
require_once('../includes/fonctions.php');
require_once('../includes/header.php');

//Isset  : est ce que la valeur est definie
$noresa = isset($_POST['NORESA']) ? $_POST['NORESA'] : '';
$nocupant = isset($_POST['NBOCCUPANT']) ? $_POST['NBOCCUPANT'] : '';
$datedebsem = isset($_POST['date']) ? $_POST['date'] : '';
$etat_resa = isset($_POST['CODEETATRESA']) ? $_POST['CODEETATRESA'] : '';

if (modifierResa($noresa, $datedebsem, $etat_resa, $nocupant)) {
  header("Location:../page/reservationModifier.php?NORESA=$noresa&enregistrement=ok");
}
