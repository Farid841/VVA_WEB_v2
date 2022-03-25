<?php
require_once('../includes/session.php');
if (isset($_SESSION["login"])) {
   session_destroy();
   echo "L'utilisateur " . $_SESSION['login'] . " a été déconnecté !";
   header('Location: Accueil.php');
} else {
   echo "Aucun utilisateur est connecté !";
}
