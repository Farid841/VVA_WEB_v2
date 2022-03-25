<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<div class="card-footer text-muted">
    <footer>
        <div style="text-align: start; left: 10px; position: absolute;"><i class="fas fa-user"></i> Utilisateur connecté :
            <?php if (!empty($_SESSION["login"])) {
                echo $_SESSION['login'];
            } else {
                echo 'Non Connecté';
            }
            ?>
        </div>
        <div style="text-align: center; width: 100%; position: absolute; left: 0; font-weight: lighter; height: 30px;">Bienvenue à VVA</div>
        <a href="deconnexion.php" style="text-align: end; right: 10px; position: absolute; color:#f00"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </footer>
</div>

<style>