<div class="col-lg-12">
  <div class="card h-100">
    <div class="card-body bg-light">

      <form method="POST">
        <?php
        $hebergementMN = rechechemn();

        ?>

        <div class="form-row">

          <div class="form-group col-md-3">
            <label>
              <font class='hebCSS'> Nombre de places : </font>
            </label>
            <input type="number" name="NBPLACEHEB" min="<?php echo $hebergementMN['MIN(NBPLACEHEB)']; ?>" max="<?php echo $hebergementMN['MAX(NBPLACEHEB)']; ?>" class="form-control" placeholder="Entrer le minimum">
          </div>

          <div class="form-group col-md-3">
            <label>
              <font class='hebCSS'> Surface : </font>
            </label>
            <div class="input-group mb-2">
              <input type="number" name="SURFACEHEB" min="<?php echo $hebergementMN['MIN(SURFACEHEB)']; ?>" max="<?php echo $hebergement['MAX(SURFACEHEB)']; ?>" class="form-control" placeholder="Entrer le minimum">
              <div class="input-group-prepend">
                <div class="input-group-text">m²</div>
              </div>
            </div>
          </div>

          <div class="form-group col-md-3">
            <label>
              <font class='hebCSS'> Tarif (hebdomadaire): </font>
            </label>
            <div class="input-group mb-2">
              <input type="number" name="TARIFSEMHEB" min="<?php echo $hebergementMN['MIN(TARIFSEMHEB)']; ?>" max="<?php echo $hebergementMN['MAX(TARIFSEMHEB)']; ?>" class="form-control" placeholder="Entrer le maximum">
              <div class="input-group-prepend">
                <div class="input-group-text">€</div>
              </div>
            </div>
          </div>

          <div class="form-group col-md-2.5">
            <label>
              <font class='hebCSS'> Type d'hébergement : </font>
            </label>
            <select name="CODETYPEHEB" class="form-control">
              <option <? if (empty($_GET['type'])) {
                        echo "selected";
                      }  ?> value='%'>Tous</option>
              <option value="CH" <? if ((isset($_GET['type']) && $_GET['type'] == 'CH')) {
                                    echo "selected";
                                  }  ?>>Chalet</option>
              <option value="AP" <? if ((isset($_GET['type']) && $_GET['type'] == 'AP')) {
                                    echo "selected";
                                  } ?>>Appartement</option>
              <option value="BU" <? if ((isset($_GET['type']) && $_GET['type'] == 'BU')) {
                                    echo "selected";
                                  } ?>>Bungalow</option>
              <option value="MH" <? if ((isset($_GET['type']) && $_GET['type'] == 'MH')) {
                                    echo "selected";
                                  } ?>>Mobil home</option>
            </select>
          </div>

          <div class="form-group col-md-1.5">
            <label>
              <font class='hebCSS'> Internet : </font>
            </label>
            <select name="INTERNET" class="form-control">
              <option selected value='%'>Oui/non</option>
              <option value="1">Oui</option>
              <option value="0">Non</option>
            </select>
          </div>

          <div class="form-group col-md-3">
            <label>
              <font class='hebCSS'> Secteur : </font>
            </label>
            <select name="SECTEURHEB" class="form-control">
              <option selected value='%'>Tous</option>
              <option>Plaine</option>
              <option>Torrent</option>
              <option>Piste</option>
              <option>Montagne</option>
            </select>
          </div>

          <div class="form-group col-md-1.5">
            <label>
              <font class='hebCSS'> Orientation : </font>
            </label>
            <select name="ORIENTATIONHEB" class="form-control">
              <option selected value='%'>Toutes</option>
              <option>Sud</option>
              <option>Nord</option>
              <option>Est</option>
              <option>Ouest</option>
            </select>
          </div>

        </div>

        <button type="submit" name="Recherche" class="btn btn-primary">Rechercher</button>

      </form>
    </div>
  </div>
</div>

</div>
<div class="heb3CSS">
  <hr>