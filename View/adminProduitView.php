<html>
<body>
<table class="table">
    <tr>
        <th scope="col">Numero produit </th>
        <th scope="col">Nom</th>
        <th scope="col">Description</th>
        <th scope="col">Prix</th>
    </tr>
    <?php
    if(!(empty($Orderadmin))){
        foreach ($Orderadmin as $i){
            echo"<tr>
                      <td>".$i['id']."</td>
                      <td>".$i['name']."</td>
                      <td>".$i['description']."</td>
                      <td>".$i['price']."</td>
                  </tr>";
        }
    }
    ?>
</table>
</body>
</html>
