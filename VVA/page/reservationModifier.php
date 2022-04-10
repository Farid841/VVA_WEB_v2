<?php
$title = "Modifier Reservation";

require_once('../includes/session.php');
require_once('../includes/fonctions.php');
require_once('../includes/header.php');
require_once('../includes/verif_ges.php');

?>

<?php


$res = GetHebergementNoresa($_GET['NORESA']);
$count = mysqli_num_rows($res);
if ($count == 0) {
  echo "lE NUMERO DE RESERVATION N'EXISTE PAS ";
} else if ($count == 1) {
  $row = mysqli_fetch_array($res);
  if (isset($_GET["enregistrement"]) && ($_GET["enregistrement"] == "ok")) {
    echo "changements de la reservation " . $_GET['noresa'] . " a été effectué";
  }
?>

  <font size="10pt">
    <p align="center" style="color: #40A497" ;><strong>Modification Reservation</strong></p>
  </font>

  <form class="forme" method="POST" action="../traitement/trt_modifier_resa.php">

    <input type="hidden" name="NORESA" value="<?php echo $_GET['NORESA']; ?>">

    NBOCCUPANT : <input type="int" name="NBOCCUPANT" value="<?php echo $row['NBOCCUPANT']; ?>"><br>
    <br>


    <label for="DATEDEBSEM">
      <span>DATEDEBSEM : &nbsp </span>
    </label>
    <table class="resa">
      <tr class='tr-resa'>
        <td class='td-resa'>
          <? echo "<input type='radio' name='date' checked='yes' value='" . $row["DATEDEBSEM"] . "' required >" . $row["DATEDEBSEM"] . " CECI</input>"; ?>
        </td>
      </tr>

      </tr>
    </table>

    <table class="resa">
      <?php
      echo "<tr class='tr-resa'>";

      $semaine = GETSEMAINE();
      $i = 0;
      while ($lignesemaine = mysqli_fetch_array($semaine)) {
        if ($i % 5 == 0) {
          if ($i > 0) {
            echo "</tr>";
          }
          echo "<tr class='tr-resa'>";
        }
        echo "<td class='td-resa'>";
        $savoirReservation = SavoirReservation($row['NOHEB'], $lignesemaine['DATEDEBSEM']);
        //var_dump($savoirReservation);
        echo $lignesemaine['DATEDEBSEM'];
        if ($savoirReservation == 0) {
          echo " LIBRE ";
          echo "<input type='radio' name='date' value='" . $lignesemaine['DATEDEBSEM'] . "' required ></input>";   //  A CONTUNIER
        } else {
          echo " NON LIBRE";
        }
        echo "</td>";
        $i++;
      }
      ?>
      </tr>
    </table>
    <br>


    <!-- CODE ETAT DE LA Reservation -->

    <label for="CODEETATRESA">
      <span>ETATRESA : &nbsp </span>
    </label>
    <select type="text" name="CODEETATRESA">
      <option value="AR" <?php if ($row['CODEETATRESA'] == "AR") echo "selected";
                          ?>>Arrhes versées</option>
      <option value="BL" <?php if ($row['CODEETATRESA'] == "BL") echo "selected";
                          ?>>Bloquée</option>
      <option value="CL" <?php if ($row['CODEETATRESA'] == "CL") echo "selected";
                          ?>>Clés retirés</option>
      <option value="SO" <?php if ($row['CODEETATRESA'] == "SO") echo "selected";
                          ?>>Solde</option>
      <option value="TE" <?php if ($row['CODEETATRESA'] == "TE") echo "selected";
                          ?>>Terminée</option>
      <option value="AN" <?php if ($row['CODEETATRESA'] == "AN") echo "selected";
                          ?>>Annulée</option>
    </select><br>
    <br>

    <!-- FIN CODE ETAT RESA  -->
    <center>
      <input type="submit" value="Valider">
    </center>


  </form>
<?php } ?>




<style>
  form.forme {
    margin: 0 auto;

    width: 800px;
    height: 800px;
    /*Encadré pour voir les limites du formulaire */
    padding: 1em;
    border: 3px solid #CCC;
    border-radius: 1em;
    border-color: #070A13;
  }

  #card {
    display: inline;
    border: 3px solid #CCC;
    border-radius: 1em;
    border-color: #070A13;
  }
</style>



<?php include "../includes/footer.php"; ?>