<?php
$title = "VVA - Espace vacancier";

require_once('../includes/session.php');
require_once('../includes/fonctions.php');
require_once('../includes/header.php');
require_once('../includes/verif_user.php');


if ((isset($_GET['annulation']) && $_GET['annulation'] == 1)) {
    echo "<script>alert('L'annulation été pris en compte')</script>";
} else {
    echo "<script>alert('Probléme lors de l'annulation veillez reessayze plus tard')</script>";
}


?>



<div class="jumbotron jumbotron-fluid justify">
    <div class="container">
        <h1 class="display-4">Vous êtes connecté en tant que vacancier.</h1>
    </div>
</div>

<?php
$resevations = GetresevationByUser($_SESSION['login']);
var_dump($resevations);
if ($resevations != NULL) { ?>
    <?php foreach ($resevations as $revervation) :  ?>
        <?php $hebergement = $revervation['NOHEB'] ?>

        <div class="card" style="width: 18rem; margin: 0 auto; margin-bottom: .3em;">
            <div class="card-body">
                <h5 class="card-title"><? $hb = GetHebergementChoisi($hebergement);
                                        echo $hb['NOMHEB']; ?></h5>
                <h6 class="card-subtitle mb-2">Reservation prévu le <strong> <? echo $revervation['DATEDEBSEM'];
                                                                                ?> </strong></h6>
                <h6 class="card-subtitle mb-2">Votre reservation est en etat de <strong> <? $etat = GetNomByTypeResa($revervation['CODEETATRESA']);
                                                                                            echo $etat['NOMETATRESA']; ?> </strong></h6>

                <a href="../traitement/trt_annuler_resa.php?NORESA='<? echo $revervation['NORESA'] ?>'"><button type="submit" class="btn btn-secondary" name="annulation" value="Désinscription">Désinscription </button> </a>
                </form>
            </div>
        </div>
    <?php endforeach ?>
<?php } else echo "no data"; ?>

<?php include "../includes/footer.php"; ?>