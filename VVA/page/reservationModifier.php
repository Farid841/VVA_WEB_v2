<?php
$title = "Modifier Reservation";
require_once('../includes/session.php');
require_once('../includes/fonctions.php');
require_once('../includes/header.php');

?>

<?php


$res = GetHebergementNoresa($_GET['NORESA']);
$count = mysqli_num_rows($res);
if ($count == 0) {
  echo "lE NUMERO DE RESERVATION N'EXISTE PAS ";   //A FAIRE
} else if ($count == 1) {
  $row = mysqli_fetch_array($res);
  if (isset($_GET["enregistrement"]) && $_GET["enregistrement"] == "ok") {
    echo "changements De la reservation " . $_GET['noresa'] . " a été effectué"; //A FAIRE
  }
?>

  <font size="10pt">
    <p align="center" style="color: #40A497" ;><strong>Modification Reservation</strong></p>
  </font>

  <form class="forme" method="Post" action="../traitement/trt_modifier_resa.php">

    <input type="hidden" name="NORESA" max="" value="<?php echo $_GET['NORESA']; ?>">

    NBOCCUPANT : <input type="int" name="NBOCCUPANT" value="<?php echo $row['NBOCCUPANT']; ?>"><br>
    <br>


    <label for="DATEDEBSEM">
      <span>DATEDEBSEM : &nbsp </span>
      <input type='radio' name='date' value="<?php echo $row['DATEDEBSEM'] ?>" required>
    </label>

    <?php
    $NOHEB = isset($_POST['NOHEB']) ? $_POST['NOHEB'] : '';

    $SEMAINES = GETSEMAINE();
    $i = 0;
    while ($row = mysqli_fetch_array($SEMAINES)) {
      if ($i % 5 == 0) {
        if ($i > 0) {
          echo "</tr>";
        }
        echo "<tr class='tr'>";
      }
      echo "<td class='td'>";
      $etatresa = SavoirReservation($NOHEB, $row['DATEDEBSEM']);
      echo $row['DATEDEBSEM'];
      if ($etatresa == 0) {
        echo " LIBRE ";
        echo "<input type='radio' name='date' value='" . $row['DATEDEBSEM'] . "' required ></input>";   //  A CONTUNIER
      } else {
        echo " NON LIBRE";
      }

      echo "</td>";
      $i++;
      sleep(0.1);
    }

    ?>
    <br>


    <!-- CODE ETAT DE LA Reservation -->

    <label for="CODEETATRESA">
      <span>ETATRESA : &nbsp </span>
    </label>
    <select type="text" name="CODEETATRESA">
      <option value="V" <?php if ($row['CODEETATRESA'] == "V") echo "selected";
                        ?>>INDISPONIBLE</option>
      <option value="N" <?php if ($row['ETATHEB'] == "N") echo "selected";
                        ?>>DISPONIBLE</option>
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