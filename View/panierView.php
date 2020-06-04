<html>
<body>
<section>
<div class="container">
<div class="col-lg-8">
    <?php
    if(!(empty($Panier))) {
        $total = 0;
    echo"<table class='table'>
    <thead>
        <tr><th scope='col'>Nom du produit</th>
            <th scope='col'>Description</th>
            <th scope='col'>Prix</th>
            <th scope='col'>Quantité</th>
        </tr>
    </thead>
    <tbody>";
        foreach ($Panier as $i) {
            echo "<tr><td>" . $i["name"] . "</td>
                    <td>".$i['description']."</td>
                    <td>" . $i["price"] . " </td>
                    <td><form action='index.php?action=panier' method='post'/>
                            <div class='form-row'>
                                <div class='form-group col-lg-4'>
                                    <input type='number' class='form-control' name='quantity' value='" . $i['quantity'] . "'/>
                                    <input type='text' name='id' value=".$i['id']." hidden/>
                                </div>
                                <div class='form-group col-lg-2'>
                                    <button class='btn btn-secondary btn-lg center-block col-lg-14' type='submit'><i class=\"fas fa-sync-alt\"></i></button> 
                                </div>
                            </div>
                         </form>
                    </td>
                    <td>
                        <form action='index.php?action=panier&id=".$i['id']."' method='post'/>
                        <button class=' btn btn-secondary btn-lg center-block col-lg-12' type='submit' ><i class=\"fas fa-trash-alt\"></i></button>
                        </form></td>
                   </tr> ";
            $total += $i['price'] * $i['quantity'];
        }
        echo"      <tr><th scope='col-lg-5'> Total </th><td>$total</td></tr>
    </tbody></table>
</div>
</div>";
    }
    else{
        echo"<h1 class='my-4'> Panier Vide </h1>";
    }
    if(isset($total)) {
        $_SESSION['total'] = $total;
    }
    if(isset($_SESSION['SESS_ORDERNUM'])) {
        echo"<div class='col-lg-8'>
                </br><a href ='index.php?action=livraison' ><p class=\"text-center\">Confirmer la commande </p></a >
            </div>
            </div>";
    }
    ?>
</section>
</body>
</html>