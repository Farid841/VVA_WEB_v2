<?php
require_once('../includes/session.php');
require_once('../includes/fonctions.php');
$con = Connect();



$no = isset($_POST['NOHEB']) ? $_POST['NOHEB'] : '';
$code = isset($_POST['CODETYPEHEB']) ? $_POST['CODETYPEHEB'] : '';
$nom = isset($_POST['NOMHEB']) ? $_POST['NOMHEB'] : '';
$nbre_place = (int)isset($_POST['NBPLACEHEB']) ? $_POST['NBPLACEHEB'] : '';
$surface = (int)isset($_POST['SURFACEHEB']) ? $_POST['SURFACEHEB'] : '';
$internet = (int)isset($_POST['INTERNET']) ? $_POST['INTERNET'] : '';
$annee_heb = (int)isset($_POST['ANNEEHEB']) ? $_POST['ANNEEHEB'] : '';
$secteur_heb = isset($_POST['SECTEURHEB']) ? $_POST['SECTEURHEB'] : '';
$orientation_heb = isset($_POST['ORIENTATIONHEB']) ? $_POST['ORIENTATIONHEB'] : '';
$etat_heb = isset($_POST['ETATHEB']) ? $_POST['ETATHEB'] : '';
$desc_heb = isset($_POST['DESCRIBHEB']) ? $_POST['DESCRIBHEB'] : '';
$photo = isset($_POST['PHOTOHEB']) ? $_POST['PHOTOHEB'] : '';
$tarif_sem = isset($_POST['TARIFSEMHEB']) ? $_POST['TARIFSEMHEB'] : '';

//recherche si le numero d'hebergement existe dejà 
if (!GetHebergementChoisi($no)) {

    $req = "INSERT INTO hebergement VALUES ('$no', '$code', '$nom', '$nbre_place', '$surface', '$internet', '$annee_heb', '$secteur_heb', '$orientation_heb', '$etat_heb', '$desc_heb', '$photo', '$tarif_sem')";
    header('location: ../page/ges_consulter.php?ajout=1');

    $res = mysqli_query($con, $req);
} else {
    header('location: ../page/NouvelleHebergement.php?ajout=0');
}
