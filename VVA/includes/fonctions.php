<?php
function Connect()
{
    $con = mysqli_connect("localhost", "farid", "123", "resa");
    return $con;
}

function GetHebergementParType($CODETYPEHEB)
{
    $con = Connect();
    mysqli_set_charset($con, "utf8");
    $req = "SELECT NOHEB, NOMTYPEHEB, NOMHEB, NBPLACEHEB, SURFACEHEB, INTERNET, ANNEEHEB, SECTEURHEB, ORIENTATIONHEB, ETATHEB, DESCRIHEB, PHOTOHEB, TARIFSEMHEB FROM hebergement h, type_heb th WHERE h.CODETYPEHEB = th.CODETYPEHEB AND h.CODETYPEHEB ='" . $CODETYPEHEB . "' ";
    $res = mysqli_query($con, $req);
    return $res;
}

function GetHebergementChoisi($NOHEB)
{
    $con = Connect();
    mysqli_set_charset($con, "utf8");
    $sql = "SELECT * FROM hebergement WHERE NOHEB= '" . $NOHEB . "'";
    $resul = mysqli_query($con, $sql);
    return mysqli_fetch_assoc($resul);
}

function GetHebergementChoisiTYPECOMPTE($TYPECOMPTE)
{
    $con = Connect();
    mysqli_set_charset($con, "utf8");
    $sql = "SELECT * FROM hebergement WHERE TYPECOMPTE= '" . $TYPECOMPTE . "'";
    $resul = mysqli_query($con, $sql);
    return mysqli_fetch_assoc($resul);
}

function GetHebergementNoheb($NOHEB)
{
    $con = Connect();
    mysqli_set_charset($con, "utf8");
    $listeNoehb = "SELECT * FROM hebergement WHERE NOHEB='" . $NOHEB . "'";
    $resul = mysqli_query($con, $listeNoehb);
    return $resul;
}

function Sethebergement($no, $code, $nom, $nbre_place, $surface, $internet, $annee_heb, $secteur_heb, $orientation_heb, $etat_heb, $desc_heb, $photo,  $tarif_sem)
{

    $con = Connect();
    mysqli_set_charset($con, "utf8");

    $req = "UPDATE hebergement SET NOMHEB='$nom', NBPLACEHEB=$nbre_place, PHOTOHEB='$photo', SURFACEHEB =$surface, INTERNET=$internet, ANNEEHEB=$annee_heb, SECTEURHEB ='$secteur_heb',ORIENTATIONHEB='$orientation_heb',ETATHEB='$etat_heb', DESCRIHEB='$desc_heb',TARIFSEMHEB='$tarif_sem', CODETYPEHEB='$code' WHERE NOHEB='$no'";

    if (mysqli_query($con, $req)) {
        return true;
    } else {
        return false;
    }
}

function Deletehebergement($noheb)
{
    $con = Connect();
    mysqli_set_charset($con, "utf8");

    $req2 = "DELETE	FROM hebergement
			WHERE NOHEB=" . $noheb . "";

    $res2 = mysqli_query($con, $req2);
    if ($res2) {
        return true;
    } else
        return false;
}

function rechechemn()
{

    $con = Connect();
    mysqli_set_charset($con, "utf8");
    $req = "SELECT MAX(ANNEEHEB), MIN(ANNEEHEB),
    MAX(NBPLACEHEB), MIN(NBPLACEHEB),
    MAX(TARIFSEMHEB), MIN(TARIFSEMHEB),
    MAX(SURFACEHEB), MIN(SURFACEHEB)
    FROM hebergement";
    $resul = mysqli_query($con, $req);
    $resul = mysqli_fetch_array($resul, MYSQLI_ASSOC);
    return $resul;
}

///AFINIIR
function GetHebergementNoresa($NORESA)
{
    $con = Connect();
    mysqli_set_charset($con, "utf8");
    $listeNoresa = "SELECT * FROM resa WHERE NORESA='" . $NORESA . "'";
    $resul = mysqli_query($con, $listeNoresa);
    return $resul;
}
// A FINIR EN HAUT 


function CreateSemaine()
{
    $con = Connect();
    mysqli_set_charset($con, "utf8");
    for ($i = 0; $i < 55; $i++) {
        $dtDeb = strtotime("next saturday + $i weeks");
        $laDateDeb = date("Y-m-d", $dtDeb);

        $dtFin = strtotime("next saturday + $i weeks + 1 week");
        $laDateFin = date("Y-m-d", $dtFin);


        $req = "INSERT INTO semaine(DATEDEBSEM, DATEFINSEM) VALUES('$laDateDeb','$laDateFin')";
        $req = mysqli_query($con, $req);
        sleep(0.1); //Laise au serveur le temps de gerer les requetes et evite les bugs
    }
}



//SAVOIR SI LA RESERVATION EST DISPONIBLE 

function SavoirReservation($NOHEB, $DATE)
{
    $con = Connect();
    mysqli_set_charset($con, "utf8");
    $req = "SELECT NORESA FROM resa WHERE NOHEB='$NOHEB' AND DATEDEBSEM='$DATE' AND CODEETATRESA='V'";
    $resul = mysqli_query($con, $req);
    $count = mysqli_num_rows($resul);
    return $count;
}

//FONCTION QUI VA RECUPERER LES SEMAINE CHOISI

function GETSEMAINE()
{
    $con = Connect();
    mysqli_set_charset($con, "utf8");
    $date = date('Y-m-d');
    $req = "SELECT * FROM semaine WHERE DATEDEBSEM > '$date' ORDER BY DATEDEBSEM";
    $resul = mysqli_query($con, $req);
    return $resul;
}

//FONCTION QUI CREER L'HEBERGEMENT
function Reserver($NOHEB, $DATEDEBSEM, $NBOCCUPANT, $TARIF)
{
    $con = Connect();
    mysqli_set_charset($con, "utf8");
    $USER = $_SESSION['login'];
    $DATE = date('Y-m-d');
    $MONTANTARR =  $TARIF * 0.2;    //Montant verser en avance
    $req = "INSERT INTO `resa` (`NORESA`, `USER`, `DATEDEBSEM`, `NOHEB`, `CODEETATRESA`, `DATERESA`, `DATEARRHES`, `MONTANTARRHES`, `NBOCCUPANT`, `TARIFSEMRESA`)
     VALUES (NULL, '$USER', '$DATEDEBSEM', '$NOHEB', 'V', '$DATE', '$DATE', '$MONTANTARR', '$NBOCCUPANT', '$TARIF');";
    $res = mysqli_query($con, $req);
    return $res;
}

//FONCTION QUI RECUPERE TOUS LES HEBERGEMENTS
function GetLesHebergement()
{
    $con = Connect();
    $req = "SELECT * FROM hebergement ";
    $res = mysqli_query($con, $req);
    return $res;
}

function GetReservations()
{
    $con = Connect();
    $req = "SELECT * FROM resa";
    $res = mysqli_query($con, $req);
    return $res;
}

function modifierResa($resa)
{
    $con = Connect();
    if (isset($resa)) {
        $req = "UPDATE resa SET CODEETATRESA = 'N' 	WHERE NORESA=" . $resa . "";
        if (mysqli_query($con, $req))
            return true;
    } else {
        return false;
    }
}

function RechercheHebByRecherche($post)
{

    $con = Connect();

    $NBPLACEHEB = $post['NBPLACEHEB'];
    $SURFACEHEB = $post['SURFACEHEB'];
    $TARIFSEMHEB = $post['TARIFSEMHEB'];
    $CODETYPEHEB = $post['CODETYPEHEB'];
    $INTERNET = $post['INTERNET'];
    $SECTEURHEB = $post['SECTEURHEB'];
    $ORIENTATIONHEB = $post['ORIENTATIONHEB'];

    $requete = "SELECT *
		FROM hebergement ";

    if (isset($NBPLACEHEB) && $NBPLACEHEB > 0) {
        $tab[] = " NBPLACEHEB >= $NBPLACEHEB ";
    }
    if (isset($SURFACEHEB) && $SURFACEHEB > 0) {
        $tab[] = " SURFACEHEB >= $SURFACEHEB ";
    }
    if (isset($TARIFSEMHEB) && $TARIFSEMHEB > 0) {
        $tab[] = " TARIFSEMHEB >= $TARIFSEMHEB ";
    }
    if (isset($CODETYPEHEB) && $CODETYPEHEB != '%') {
        $tab[] = " CODETYPEHEB = '$CODETYPEHEB' ";
    }
    if (isset($INTERNET) && $INTERNET != '%') {
        $tab[] = " INTERNET = $INTERNET ";
    }
    if (isset($SECTEURHEB) && $SECTEURHEB != '%') {
        $tab[] = " SECTEURHEB = '$SECTEURHEB' ";
    }
    if (isset($ORIENTATIONHEB) && $ORIENTATIONHEB != '%') {
        $tab[] = "ORIENTATIONHEB  = '$ORIENTATIONHEB' ";
    }
    if (isset($tab)) {
        for ($i = 0; $i < count($tab); $i++) {
            if ($i == 0)
                $requete .= " WHERE ";
            else
                $requete .= " AND ";
            $requete .= $tab[$i]; // Avec insertion d'un espace entre 2 valeurs
        }
    }
    $res = mysqli_query($con, $requete);
    return $res;
}

function SetResrvation()
{
    $con = Connect();
    $no = isset($_POST['NORESA']) ? $_POST['NORESA'] : '';
    $nbre_place = (int)isset($_POST['NBOCCUPANT']) ? $_POST['NBOCCUPANT'] : '';
    $DATE = isset($_POST['DATEDEBSEM']) ? $_POST['DATEDEBSEM'] : '';
    $req = "UPDATE resa SET DATEDEBSEM = '" .  $DATE . "', NBOCCUPANT='$nbre_place' WHERE NORESA = '$no'";
    $res = mysqli_query($con, $req);
    if ($res)
        return true;
    else
        return false;
}
