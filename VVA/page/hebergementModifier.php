<?php
$title = "Modifier hebergement";
require_once('../includes/session.php');
require_once('../includes/fonctions.php');
require_once('..//includes/header.php');

if (isset($_GET)) {
  $res = GetHebergementNoheb($_GET['noheb']);
  $count = mysqli_num_rows($res);
  if ($count == 0) {
    echo "lE NUMERO D'HEBERGEMENT N'EXISTE PAS ";   //A FAIRE
  } else if ($count == 1) {
    $row = mysqli_fetch_array($res);
    if (isset($_GET["enregistrement"]) && $_GET["enregistrement"] == "ok") {
      echo "<script>alert('Votre modification a été pris en compte')</script>";
    }
  }
}

?>

<!DOCTYPE html>
<html>

<body>

  <font size="10pt">
    <p align="center" style="color: #40A497" ;><strong>Formulaire de modification</strong></p>
  </font>

  <form class="forme" method="Post" action="../traitement/trt_modifier.php">
    <!-- NOHEB : <input type="int" name="NOHEB"><br>
<br> -->
    <input type="hidden" name="NOHEB" value="<?php echo $_GET['noheb']; ?>">
    <label for="CODETYPEHEB">
      <span>CODETYPEHEB : &nbsp </span>
    </label>
    <select type="text" name="CODETYPEHEB">
      <option value="CH" <?php if ($row['CODETYPEHEB'] == "CH") echo "selected"; ?>>CHALET</option>
      <option value="AP" <?php if ($row['CODETYPEHEB'] == "AP") echo "selected"; ?>>APPARTEMENT</option>
      <option value="BU" <?php if ($row['CODETYPEHEB'] == "BU") echo "selected"; ?>>BUNGALOW</option>
      <option value="MH" <?php if ($row['CODETYPEHEB'] == "MH") echo "selected"; ?>>MOBIL-HOME</option>
    </select><br> &nbsp &nbsp &nbsp
    <br>

    NOMHEB : <input type="text" name="NOMHEB" value="<?php echo $row['NOMHEB']; ?>"><br>
    <br>
    NBPLACEHEB : <input type="int" name="NBPLACEHEB" value="<?php echo $row['NBPLACEHEB']; ?>"><br>
    <br>
    SURFACEHEB : <input type="int" name="SURFACEHEB" value="<?php echo $row['SURFACEHEB']; ?>"><br>
    <br>

    <label for="INTERNET">
      <span>INTERNET : &nbsp </span>
    </label>
    <select type="int" name="INTERNET">
      <option value="1" <?php if ($row['INTERNET'] == 1) echo "selected"; ?>>OUI</option>
      <option value="0" <?php if ($row['INTERNET'] == 0) echo "selected"; ?>>NON</option>
    </select><br>
    <br>

    ANNEEHEB : <input type="int" name="ANNEEHEB" value="<?php echo $row['ANNEEHEB']; ?>"><br>
    <br>

    <label for="SECTEURHEB">
      <span>SECTEURHEB : &nbsp </span>
    </label>
    <select type="text" name="SECTEURHEB">
      <option value="Plaine" <?php if ($row['SECTEURHEB'] == "Plaine") echo "selected"; ?>>Plaine</option>
      <option value="Torrent" <?php if ($row['SECTEURHEB'] == "Torrent") echo "selected"; ?>>Torrent</option>
    </select><br>
    <br>


    <label for="ORIENTATIONHEB">
      <span>ORIENTATIONHEB : &nbsp </span>
    </label>
    <select type="text" name="ORIENTATIONHEB">
      <option value="sud" <?php if ($row['ORIENTATIONHEB'] == "sud") echo "selected"; ?>>Sud</option>
      <option value="nord" <?php if ($row['ORIENTATIONHEB'] == "nord") echo "selected"; ?>>Nord</option>
      <option value="est" <?php if ($row['ORIENTATIONHEB'] == "est") echo "selected"; ?>>EST</option>
      <option value="ouest" <?php if ($row['ORIENTATIONHEB'] == "ouest") echo "selected"; ?>>Ouest</option>
    </select><br>
    <br>

    <label for="ETATHEB">
      <span>ETATHEB : &nbsp </span>
    </label>
    <select type="text" name="ETATHEB">
      <option value="Neuf" <?php if ($row['ETATHEB'] == "Neuf") echo "selected"; ?>>Neuf</option>
      <option value="Bon" <?php if ($row['ETATHEB'] == "Bon") echo "selected"; ?>>Bon</option>
      <!-- <option value="Endommagé">Endommagé</option> -->
    </select><br>
    <br>

    DESCRIHEB : <input type="text" name="DESCRIHEB" value="<?php echo $row['DESCRIHEB']; ?>"><br>
    <br>
    PHOTOHEB : <input type="text" name="PHOTOHEB" value="<?php echo $row['PHOTOHEB']; ?>"><br>
    <br>
    TARIFSEMHEB : <input type="int" name="TARIFSEMHEB" value="<?php echo $row['TARIFSEMHEB']; ?>"><br>
    <br>

    <!-- Afficher nombre de reservation de cette heberg -->


    <center>
      <input type="submit" value="Valider">
    </center>



  </form>

  <?php
  /* echo $req = " SELECT COUNT(NOHEB) as nombretotal FROM RESA WHERE NOHEB='" . $_GET['noheb'] . "' ";
  $res = mysqli_query($con, $req);
  $row = mysqli_fetch_assoc($res);

  echo " <p><strong>" . $row['nombretotal'] . "</strong></p>";

  */ ?>

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

</body>
<br>
<br>
<?php include "../includes/footer.php"; ?>

</html>