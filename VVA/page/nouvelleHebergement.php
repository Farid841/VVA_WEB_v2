<?php
$title = "Nouvelle hebergement";
require_once('../includes/session.php');
require_once('../includes/header.php');
require_once('../includes/fonctions.php');

if ((isset($_GET['ajout']) && ($_GET['ajout'] != 0))) {
  echo "<script>alert('Un probleme lors de l'ajout de l'hebergement reesayer plus tard')</script>";
}
?>


<!DOCTYPE html>
<html>

<body>

  <font size="10pt">
    <p align="center" style="color: #40A497" ;><strong>Formulaire d'ajout</strong></p>
  </font>

  <form class="forme" method=Post action="../traitement/trt_ajouter.php">
    NOHEB : <input type="int" name="NOHEB"><br>
    <br>

    <label for="CODETYPEHEB">
      <span>CODETYPEHEB : &nbsp </span>
    </label>
    <select type="text" name="CODETYPEHEB">
      <option value="CH">CHALET</option>
      <option value="AP">APPARTEMENT</option>
      <option value="BU">BUNGALOW</option>
      <option value="MH">MOBIL-HOME</option>
    </select><br> &nbsp &nbsp &nbsp
    <br>

    NOMHEB : <input type="text" name="NOMHEB" required><br>
    <br>
    NBPLACEHEB : <input type="int" name="NBPLACEHEB" required><br>
    <br>
    SURFACEHEB : <input type="int" name="SURFACEHEB" required><br>
    <br>

    <label for="INTERNET">
      <span>INTERNET : &nbsp </span>
    </label>
    <select type="int" name="INTERNET">
      <option value="1">OUI</option>
      <option value="0">NON</option>
    </select><br>
    <br>

    ANNEEHEB : <input type="int" name="ANNEEHEB" required><br>
    <br>

    <label for="SECTEURHEB">
      <span>SECTEURHEB : &nbsp </span>
    </label>
    <select type="text" name="SECTEURHEB">
      <option value="Plaine">Plaine</option>
      <option value="Torrent">Torrent</option>
    </select><br>
    <br>


    <label for="ORIENTATIONHEB">
      <span>ORIENTATIONHEB : &nbsp </span>
    </label>
    <select type="text" name="ORIENTATIONHEB">
      <option value="sud">Sud</option>
      <option value="nord">Nord</option>
      <option value="est">EST</option>
      <option value="ouest">Ouest</option>
    </select><br>
    <br>

    <label for="ETATHEB">
      <span>ETATHEB : &nbsp </span>
    </label>
    <select type="text" name="ETATHEB">
      <option value="Neuf">Neuf</option>
      <option value="Bon">Bon</option>
      <option value="Endommagé">Endommagé</option>
    </select><br>
    <br>

    DESCRIHEB : <input type="text" name="DESCRIBHEB"><br>
    <br>
    PHOTOHEB : <input type="text" name="PHOTOHEB"><br>
    <br>
    TARIFSEMHEB : <input type="int" name="TARIFSEMHEB" required><br>
    <br>
    <center>
      <input type="submit" class="btn-primary" value="Valider">
    </center>


  </form>

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