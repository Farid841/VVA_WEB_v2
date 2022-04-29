<?php
$title = "Reservation";
require_once('../includes/session.php');
require_once('../includes/fonctions.php');
require_once('..//includes/header.php');

if ((isset($_GET['annulation']) && $_GET['annulation'] == 1)) {
    echo "<script>alert('L'annulation été pris en compte')</script>";
} else {
    echo "<script>alert('Probléme lors de l'annulation veillez reessayze plus tard')</script>";
}

?>

<strong>
    <h3 align="center"> LES RESERVATIONS
</strong>

<?php
$res = GetReservations();


?>

<div class="container" align='center'>
    <table class='table table-bordered table-condensed table-body-center table-hover table-striped'>
        <tr style='background-color:#60B8CA'>
            <th style='border-right:1px solid #C0C0C0 ;'>
                <h5 align='center' style='color:white'>No.resa</h5>
            </th>
            <th style='border-right:1px solid #C0C0C0 ;'>
                <h5 align='center' style='color:white'>No.hebergement</h5>
            </th>
            <th style='border-right:1px solid #C0C0C0 ;'>
                <h5 align='center' style='color:white'>Utilisateur </h5>
            </th>
            <th style='border-right:1px solid #C0C0C0 ;'>
                <h5 align='center' style='color:white' td='padding: 35px'>Arrivé </h5>
            </th>
            <!-- <th style='border-right:1px solid #C0C0C0 ;'><h5 align='center' style='color:white'>Départ </h5></th> -->
            <th style='border-right:1px solid #C0C0C0 ;'>
                <h5 align='center' style='color:white'>Avance payé</h5>
            </th>
            <th style='border-right:1px solid #C0C0C0 ;'>
                <h5 align='center' style='color:white'>Nb.occupant</h5>
            </th>
            <th style='border-right:1px solid #C0C0C0 ;'>
                <h5 align='center' style='color:white'>Tarif</h5>
            </th>
            <th style='border-right:1px solid #C0C0C0 ;'>
                <h5 align='center' style='color:white'>Etat.resa</h5>
            </th>
            <th style='border-right:1px solid #C0C0C0 ;'>
                <h5 align='center' style='color:white'>Modification</h5>
            </th>
            <th style='border-right:1px solid #C0C0C0 ;'>
                <h5 align='center' style='color:white'>Annulation</h5>
            </th>
        </tr>
        </br>

        <?php
        if ($res != null) {
            while ($ligne = mysqli_fetch_array($res)) {
                echo "<tr>";
                echo "<td>";
                echo $ligne['NORESA'];
                echo "</td>";

                echo "<td>";
                echo $ligne['NOHEB'];
                echo "</td>";

                echo "<td>";
                echo $ligne['USER'];
                echo "</td>";

                echo "<td>";
                echo $ligne['DATEDEBSEM'];
                echo "</td>";

                echo "<td>";
                echo $ligne['MONTANTARRHES'];
                echo "</td>";

                echo "<td>";
                echo $ligne['NBOCCUPANT'];
                echo "</td>";

                echo "<td>";
                echo $ligne['TARIFSEMRESA'];
                echo "</td>";

                echo "<td>";
                echo $ligne['CODEETATRESA'];
                echo "</td>";

                echo '<td><a href="reservationModifier.php?NORESA=' . $ligne['NORESA'] . '">';
                if ($ligne['CODEETATRESA'] != 'N')
                    echo "<input type='submit' name='Modifier' value='Modifier' class='btn btn-warning'>";
                echo "</a></td>";

                echo '<td><a href="trt_annuler_resa.php?NORESA=' . $ligne['NORESA'] . '">';
                if ($ligne['CODEETATRESA'] != 'AN')
                    echo "<input type='submit' name='Suprimer' value='Annuler' class='btn btn-danger'>";
                echo "</a></td>";
            }
        } else {
            echo "NO DATA";
        }
        ?>
    </table>
    <br>
</div>
<?php include "../includes/footer.php"; ?>

</html>