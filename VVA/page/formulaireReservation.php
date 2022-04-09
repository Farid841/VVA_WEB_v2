<?php
if (!isset($_GET['noheb']))
  header('Location: accueil.php');

require_once('../includes/session.php');
require_once('../includes/fonctions.php');
require_once("../includes/header.php");

$noheb = $_GET['noheb'];
$row = GetHebergementChoisi($noheb);

if (!$row)
  header('Location: accueil.php');
?>

<!-- Formulaire de reservation -->
<font size="10pt">
  <p align="center" style="color: #40A497"><strong>Formulaire de Réservation</strong></p>
</font>


<form class="formulaire" method="POST" action="resaReussi.php">

  <!-- JE MET LE NUMERO D'HEBERGEMENT DANS LE FORMULAIRE -->
  <input type="hidden" name="noheb" value="<?php echo $noheb; ?>">
  <input type="hidden" name="prix" value="<?php echo $row['TARIFSEMHEB']; ?>">

  <!--  Rajout de la reservation concerné -->

  <!--<div class='card'> -->
  <img class='card-img-top' src='image/<?php echo $row['PHOTOHEB']; ?>' alt='Card image cap' height='342px' width='160px'>
  <div class='card-body'>
    <p><strong><?php echo $row['NOMHEB']; ?></strong></p>
    <p>Description: <?php echo $row['DESCRIHEB']; ?></p>
    <p>Nombre de place: <?php echo $row['NBPLACEHEB']; ?></p>
    <p>Surface d'hébergement: <?php echo $row['SURFACEHEB']; ?></p>
    <p>Année de construction: <?php echo $row['ANNEEHEB']; ?></p>
    <p>Internet disponible: <?php if ($row['INTERNET']) {
                              echo 'OUI';
                            } else {
                              echo 'NON';
                            }; ?></p>
    <p>Secteur: <?php echo $row['SECTEURHEB']; ?></p>
    <p>Orientation de l'hébergement: <?php echo $row['ORIENTATIONHEB']; ?></p>
    <p>Etat: <?php echo $row['ETATHEB']; ?></p>
    <p>Tarif par semaine: <?php echo $row['TARIFSEMHEB']; ?></p>
  </div>
  </div>

  <!--  Fin Rajout de la reservation concerné -->
  <br>
  <p><strong>
      <font size="5pt"> Informations de reservation</font>
    </strong></p>
  <br>

  <label for="">Nombre de personne : &nbsp</label>
  <input id="nombrePersonne" type="number" name="nombrePersonne" step="1" min="1" max=<?php echo $row['NBPLACEHEB']; ?> required>

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
      $savoirReservation = SavoirReservation($noheb, $lignesemaine['DATEDEBSEM']);
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


  </section>
  <br>
  <br>
  <center>
    <input name="Valider" type="submit" value="Valider">
  </center>

  </section>

</form>

<style>
  form.formulaire {
    margin: 0 auto;

    width: 1200px;
    height: 1400px;
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