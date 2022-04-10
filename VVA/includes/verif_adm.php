<?php
if ((isset($_SESSION['type_compte'])) && ($_SESSION['type_compte'] != "Adm")) {
    header("Location: ../page/connexion.php");
}
