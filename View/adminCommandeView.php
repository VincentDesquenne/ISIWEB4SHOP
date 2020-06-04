<html>
    <body>
        <table class="table">
            <tr>
                <th scope="col">Numero de Commande </th>
                <th scope="col">Numero produit</th>
                <th scope="col">Quantité</th>
                <th scope="col">Enrengistré</th>
            </tr>
                <?php
                if(!(empty($Orderadmin))){
                     foreach ($Orderadmin as $i){
                        echo"<tr>";
                        if($i['status'] == 10){
                        echo"<td>".$i['order_id']." (Validé)</td> ";
                        }
                        else{
                            echo"<td>".$i['order_id']."</td>";
                        }
                        echo"<td>".$i['product_id']."</td>
                            <td>".$i['quantity']."</td>
                            <td>".$i['registered']."</td>
                            </tr>";
                     }
                }
                ?>
        </table>
        <br>
                <form action="index.php?action=adminC" method="post">
                    <div class='form-group col-lg-5'>
                        <div class="form-row">
                            <div class="col">
                                <select class='form-control' name='id'>
                                    <?php   if(!(empty($Order))){
                                        foreach($Order as $i){
                                                echo"<option value='".$i['id']."'>Commande ".$i['id']."</option> ";
                                            }
                                    }       ?>
                                </select>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-secondary btn-lg center-block">Valider la commande</button>
                            </div>
                        </div>
                     </div>
                </form>
    </body>
</html>
