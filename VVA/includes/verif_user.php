<?php
if (empty($_SESSION['type_compte'])) {
    header("Location: ../page/connexion.php");
}
