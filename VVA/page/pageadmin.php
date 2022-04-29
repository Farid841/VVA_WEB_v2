<?php $title = "VVA - Espace administrateur";


require_once('../includes/session.php');
require_once('../includes/fonctions.php');
require_once('../includes/header.php');
require_once('../includes/verif_adm.php');

?>



<div class="jumbotron jumbotron-fluid justify">
    <div class="container">
        <h1 class="display-4">Vous êtes connecté en tant qu'administrateur.</h1>
    </div>
</div>


<button class="btn btn-primary" onclick="seePasswords()">Voir les mots de passes et les identifiant de connexion</button>
<script>
    var mdpFields = document.getElementsByTagName("input");

    function seePasswords() {
        for (let field of mdpFields) {
            if (field.type == "text") {
                field.type = "password";
            } else {
                field.type = "text";
            }
        }
    }
</script>

<div class="row">

    <?php $listAccounts = GetComptes();
    foreach ($listAccounts as $account) : ?>

        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <?= $account['PRENOMCPTE'] . " " . $account['NOMCPTE'] . " (" . $account['TYPECOMPTE'] . ")" ?>
                    </h5>

                    <p class="card-text">Inscrit depuis le <?= $account['DATEINSCRIP']; ?></p>
                    <p class"card-text>
                        Statut du compte :
                        <?php echo $account['DATEFERME'] != "null" ? "Actif" : "Fermé";  ?>
                    </p>


                    <input type="password" disabled="disabled" value="<?= $account['MDP'] ?>" />
                    <input type="password" disabled="disabled" value="<?= $account['USER'] ?>" />
                </div>
            </div>
        </div>

    <?php endforeach ?>

</div>

<?php include "../includes/footer.php"; ?>