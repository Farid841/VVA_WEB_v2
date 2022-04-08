<?php

require_once('../includes/session.php');
require_once('../includes/fonctions.php');


if (Deletehebergement($_GET['noheb'])) {

	header("location:../page/ges_consulter?delete=1");
} else {
	header("location:../page/ges_consulter.php?delete=0");
}
