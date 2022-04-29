<?php
require_once('../includes/session.php');
require_once('../includes/fonctions.php');
if (isset($_GET['NORESA'])) {
    if (annulerResa($_GET['NORESA'])) {    ///Si l'annulation reussit
        header('location: ../page/mes_reservation.php?annulation=1');
    } else {
        header('location: reservation.php?annulation=0');
    }
}
