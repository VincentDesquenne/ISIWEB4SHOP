<html xmlns="http://www.w3.org/1999/html">
<body>
<div class="container">
<div class="col-lg-8">
    <form action="index.php?action=registered" method="post" >
        <div class="form-row">
            <div class="col">
                <label for="forname">Prenom </label>
                <input type="text" class="form-control" name="forname" required/>
            </div>
            <div class="col">
                <label for="surname">Nom </label>
                <input type="text" class="form-control" name="surname" required/>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <label for="username"> Identifiant </label>
                <input type="text" class="form-control" name="username" required/>
            </div>
            <div class="col">
                <label for="pwd">Mot de passe  </label>
                <input type="password" class="form-control" name="pwd" required/>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-lg-8">
                <label for="add1"> Adresse </label>
                <input type="text" class="form-control" name="add1" required/>
            </div>
            <div class="form-group col-lg-4">
                <label for="add2">Complement d'adresse</label>
                <input type="text" class="form-control" name="add2"/>
            </div>
        </div>

        <div class="form-row">
            <div class="col-lg-3">
                <label for="city">Ville</label>
                <input type="text" class="form-control" name="city" required/>
            </div>
            <div class="col-lg-3">
                <label for="postcode">Code postal </label>
                <input type="text" class="form-control" name="postcode" required/>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col">
                <label for="phone" > Numero de telephone </label>
                <input type="text" class="form-control" name="phone" required/>
            </div>
            <div class="form-group col">
                <label for="mail"> Email </label>
                <input type="email" class="form-control" name="mail" placeholder="your@email.com" required />
            </div>
        </div>
            <button type="submit" class="btn btn-primary"> Creer le compte </button>
    </form>
</div>
</div>
</body>
</html>