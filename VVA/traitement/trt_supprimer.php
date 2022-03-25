<?php
	$con = mysqli_connect("localhost", "farid", "123", "resa");
	mysqli_set_charset($con, 'utf8');
	$req2 = "DELETE	FROM hebergement
			WHERE NOHEB=".$_GET['noheb']."";

	$res2 = mysqli_query($con,$req2);
	
	header("location:accueil.php?page=consulter");
