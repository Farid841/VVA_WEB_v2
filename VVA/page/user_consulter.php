<?php
$title = "Consulter hebergement";
require_once('../includes/session.php');
require_once('../includes/fonctions.php');
require_once("../includes/header.php");

?>

<strong>
    <h3 align="center"> CONSULTER LES HÉBERGEMENTS
</strong>
<br>
</h3>

<style>
    .col-lg-12 {
        height: 40%;
    }
</style>

<?php
// APPEL DE LA RECHERCHE
$action = "user_consulter.php";
include("../includes/recherche_heb.php");



?>


<div class="container" align="center" class="row col-sm-10 col-md-10 col-lg-10">
    <table class='table table-bordered table-condensed table-body-center table-hover table-striped'>
        <tr style='background-color:#60B8CA'>
            <th style='border-right:1px solid #C0C0C0 ;'>
                <h5 align='center' style='color:white'>Photo</h5>
            </th>
            <th style='border-right:1px solid #C0C0C0 ;'>
                <h5 align='center' style='color:white'>Nom </h5>
            </th>
            <th style='border-right:1px solid #C0C0C0 ;'>
                <h5 align='center' style='color:white'>Type </h5>
            </th>
            <th style='border-right:1px solid #C0C0C0 ;'>
                <h5 align='center' style='color:white'>Tarif </h5>
            </th>
            <th style='border-right:1px solid #C0C0C0 ;'>
                <h5 align='center' style='color:white'>Nombre de place</h5>
            </th>
            <th style='border-right:1px solid #C0C0C0 ;'>
                <h5 align='center' style='color:white'>Surface</h5>
            </th>
            <th style='border-right:1px solid #C0C0C0 ;'>
                <h5 align='center' style='color:white'>Description</h5>
            </th>
            <th style='border-right:1px solid #C0C0C0 ;'>
                <h5 align='center' style='color:white'>Orientation</h5>
            </th>
            <th style='border-right:1px solid #C0C0C0 ;'>
                <h5 align='center' style='color:white'>Details</h5>
            </th>

        </tr>
        <?php
        if (isset($_POST['Recherche'])) {

            $res = RechercheHebByRecherche($_POST);
            if ($res) {


                while ($hebergement = mysqli_fetch_array($res)) {
                    echo "<tr>";
                    echo "<td style='width:200px;'>";
                    echo "<img style='width:100%;'src=image/" . $hebergement['PHOTOHEB'] . ">";
                    echo "</td>";

                    echo "<td>";
                    echo $hebergement['NOMHEB'];
                    echo "</td>";

                    echo "<td>";
                    echo $hebergement['CODETYPEHEB'];
                    echo "</td>";

                    echo "<td>";
                    echo $hebergement['TARIFSEMHEB'];
                    echo "</td>";

                    echo "<td>";
                    echo $hebergement['NBPLACEHEB'];
                    echo "</td>";

                    echo "<td>";
                    echo $hebergement['SURFACEHEB'];
                    echo "</td>";

                    echo "<td>";
                    echo $hebergement['DESCRIHEB'];
                    echo "</td>";
                    echo "<td>";
                    echo $hebergement['ORIENTATIONHEB'];
                    echo "</td>";

                    echo '<td><a href="hebergement.php?noheb=' . $hebergement['NOHEB'] . '">';
                    echo "<input type='submit' name='Voir hebergement' value='Voir hebergement' class='btn btn-primary'> </a>";
                    echo "</td>";
                }
            } else
                echo 'NO-DATA';
        } else {
            $getHebs = GetLesHebergement();
            if ($getHebs) {

                while ($hebergement = mysqli_fetch_array($getHebs, MYSQLI_ASSOC)) {
                    echo "<tr>";
                    echo "<td style='width:200px;'>";
                    echo "<img style='width:100%;'src=image/" . $hebergement['PHOTOHEB'] . ">";
                    echo "</td>";

                    echo "<td>";
                    echo $hebergement['NOMHEB'];
                    echo "</td>";

                    echo "<td>";
                    echo $hebergement['CODETYPEHEB'];
                    echo "</td>";

                    echo "<td>";
                    echo $hebergement['TARIFSEMHEB'];
                    echo "</td>";

                    echo "<td>";
                    echo $hebergement['NBPLACEHEB'];
                    echo "</td>";

                    echo "<td>";
                    echo $hebergement['SURFACEHEB'];
                    echo "</td>";

                    echo "<td>";
                    echo $hebergement['DESCRIHEB'];
                    echo "</td>";

                    echo "<td>";
                    echo $hebergement['ORIENTATIONHEB'];
                    echo "</td>";

                    echo '<td><a href="hebergement.php?noheb=' . $hebergement['NOHEB'] . '">';
                    echo "<input type='submit' name='Voir' value='voir' class='btn btn-primary'> </a>";
                    echo "</td>";
                }
            } else
                echo "NO-DATA";
        }
        ?>
    </table>

    <br>
</div>

<?php include "../includes/footer.php"; ?>