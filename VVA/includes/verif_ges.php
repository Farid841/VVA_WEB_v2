<?php
if ((isset($_SESSION['type_compte'])) && ($_SESSION['type_compte'] != "Ges")) {
    header("Location: ../page/connexion.php");
}
