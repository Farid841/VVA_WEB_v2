<?php
session_start();
	$con = mysqli_connect("localhost", "farid", "123", "resa");
    mysqli_set_charset($con, 'utf8');
    
    //Isset  : est ce que la valeur est definie
    $no =isset($_POST['NOHEB'])?$_POST['NOHEB']:'';
    $code = isset($_POST['CODETYPEHEB'])?$_POST['CODETYPEHEB']:'';
	$nom = isset($_POST['NOMHEB'])?$_POST['NOMHEB']:'';
	$nbre_place = (int)isset($_POST['NBPLACEHEB'])?$_POST['NBPLACEHEB']:'';
    $surface = (int)isset($_POST['SURFACEHEB'])?$_POST['SURFACEHEB']:'';
    $internet = (int)isset($_POST['INTERNET'])?$_POST['INTERNET']:'';
	$annee_heb = (int)isset($_POST['ANNEEHEB'])?$_POST['ANNEEHEB']:'';
	$secteur_heb =isset($_POST['SECTEURHEB'])?$_POST['SECTEURHEB']:'';
	$orientation_heb = isset($_POST['ORIENTATIONHEB'])?$_POST['ORIENTATIONHEB']:'';
	$etat_heb =isset($_POST['ETAHEB'])?$_POST['ETAHEB']:'';
    $desc_heb =isset($_POST['DESCRIHEB'])?$_POST['DESCRIHEB']:'';
    $photo = isset($_POST['PHOTOHEB'])?$_POST['PHOTOHEB']:'';
	$tarif_sem =isset($_POST['TARIFSEMHEB'])?$_POST['TARIFSEMHEB']:'';

	
	$req = "UPDATE hebergement SET NOMHEB='$nom', NBPLACEHEB=$nbre_place, SURFACEHEB =$surface, INTERNET=$internet, ANNEEHEB=$annee_heb, SECTEURHEB ='$secteur_heb',ORIENTATIONHEB='$orientation_heb',ETATHEB='$etat_heb', DESCRIHEB='$desc_heb',TARIFSEMHEB='$tarif_sem', CODETYPEHEB='$code' WHERE NOHEB='$no'";
    
    $res = mysqli_query($con,$req);
    
    
    header("Location:hebergementModifier.php?noheb=$no&enregistrement=ok");
