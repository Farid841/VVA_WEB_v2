<?php

/**
 * Bonjour ce fichier est en requeried one dans toutes les autre page car certaine fonction sont obligatoire pour le bon fonctionnement
 */
?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CDN BOOTSTRAP -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- CDN FONT AWESOME -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style.css" />
    <title><? $title ?></title>


</head>

<body>


    <!-- BARRE DE NAVIGATION-->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <!-- LOGO --> <i class="fa fa-home fa-2x" style="color: green; margin-right: 10px">
        </i><a class="navbar-brand" href="Accueil.php" style="margin-right: 550px"><strong> VVA</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="Accueil.php">Accueil</a>
                </li>

                <!-- LE BOUTON CONSULTER S'AFFICHE QUE LORSQUE L'ON EST ADMIN OU GEST -->


                <li class="nav-item active">
                    <?php
                    if (isset($_SESSION['type_compte']) && ($_SESSION['type_compte'] == 'Ges')) {
                        echo "<a class='nav-link' href='ges_consulter.php'> Consulter </a>";
                    } else {

                        echo "<a class='nav-link' href='user_consulter.php'> Consulter  </a>";
                    }
                    ?>

                </li>
                <li class="nav-item active">
                    <?php
                    if (isset($_SESSION['type_compte']) && ($_SESSION['type_compte'] == 'Ges')) {
                        echo "<a href='../page/reservation.php' class='nav-link'>Les Réservation</a>";
                    }
                    ?>
                    <?php
                    if (isset($_SESSION['type_compte']) && ($_SESSION['type_compte'] == 'Vac')) {
                        echo "<a href='../page/mes_reservation.php' class='nav-link'>Mes Réservation</a>";
                    }
                    ?>
                    <?php
                    if (isset($_SESSION['type_compte']) && ($_SESSION['type_compte'] == 'Adm')) {
                        echo "<a href='../page/pageadmin.php' class='nav-link'>Utilisateurs & MDPs</a>";
                    }
                    ?>
                </li>

            </ul>

            <!-- FIN DU BOUTON CONSULTER QUI S'AFFICHE QUE LORSQUE L'ON EST ADMIN OU GEST -->
            <?php
            if (!isset($_SESSION['login'])) {
                echo '  <a href="connexion.php" class=" form-inline my-2 my-lg-0 btn btn-primary btn-lg active" role="button" aria-pressed="true">Connexion</a>';
            } else {
                echo ' <a href="#connexion.php" class=" form-inline my-2 my-lg-0 primary btn-lg active" role="button" aria-pressed="true">Bonjour ' . $_SESSION["login"] . '!</a>';
                echo ' <a href="deconnexion.php" class=" form-inline my-2 my-lg-0 btn btn-danger btn-lg active" role="button" aria-pressed="true">Deconnexion! </a>';
            }
            ?>


        </div>
    </nav>
    <br>
    <!-- FIN BARRE DE NAVIGATION -->