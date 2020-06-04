<html>
<body>

    <form action="index.php?action=livraison" method="post">
            <?php if(!empty($Adresse)){ ?>
    <div class="form-group col-lg-5">

          <div class="form-group">
                  <label for="SelectAdr">Liste d'adresses </label>
                  <select class="form-control" name="SelectAdr"><?php foreach ($Adresse as $i) {
                          echo "<option value='" . $i['id'] . "'> " . $i['add1'] . " " . $i['add2'] . " " . $i['city'] . "  " . $i['postcode'] . " </option> ";
                      }
                      echo"</select>
           </div>
            <div class=\"form-check\">
                    <input class=\"form-check-input\" type=\"checkbox\" name='nouvadresse'>
                    <label class=\"form-check-label\" for=\"nouvadresse\">
                             Ou une nouvelle adresse
                     </label>
            </div>
            </br>
             ";}?>
        <div class="form-group col-lg-3">
            <input type="text" name="surname" placeholder="Prenom" required/>
            <input type="text" name="forname" placeholder="Nom" required/>
            <input type="text" name="add1" placeholder="Adresse" required/>
            <input type="text" name="add2" placeholder="Complement d'adresse" required/>
            <input type="text" name="city" placeholder="Ville" required/>
            <input type="text" name="postcode" placeholder="Code postale" required/>
        </div>
             <button type="submit" class="btn btn-secondary btn-lg center-block">Continuer au payement </button>
    </div>
    </form>
</body>
</html>
