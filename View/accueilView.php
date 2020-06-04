
<html>
<body>
    <div class="container">

        <div class="row">

            <div class="col-lg-3">
                <?php
            if (!(isset($_GET['categ']))){
               echo" <h1 class='my-4'>Accueil</h1>";
            }
            else{
                echo "<h1 class='my-4'>Séléction</h1>";
            }
               ?>
                    <div class="list-group">
                        <?php
                    if(isset($getCat)) {
                        foreach ($getCat as $cat) {
                            echo " <a class='list-group-item' href='index.php?categ=" . $cat['id'] . "&action=accueil'>" . $cat['name'] . "</a>";
                        }
                    }
                ?>
                    </div>
            </div>
            
            <div class="col-lg-9">
         <?php
        if (!(isset($_GET['categ']))){
    echo"<div id='carouselExampleIndicators' class='carousel slide my-4' data-ride='carousel'>
            <ol class='carousel-indicators'>
                <li data-target='#carouselExampleIndicators' data-slide-to='0' class='active'></li>
                <li data-target='#carouselExampleIndicators' data-slide-to='1'></li>
                <li data-target='#carouselExampleIndicators' data-slide-to='2'></li>
            </ol>
            
             <div class='carousel-inner' role='listbox'>
                    <div class='carousel-item active'>
                        <img class='d-block img-fluid' src='public/images/teatime.jpg' alt='First slide'>
                    </div>
                    <div class='carousel-item'>
                        <img class='d-block img-fluid' src='public/images/biscuitcaroussel.jpg' alt='Second slide'>
                    </div>
                    <div class='carousel-item'>
                        <img class='d-block img-fluid' src='public/images/chococaroussel.jpg' alt='Third slide'>
                    </div>
                </div>
                
                <a class='carousel-control-prev' href='#carouselExampleIndicators' role='button' data-slide='prev'>
                <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                <span class='sr-only'>Previous</span>
                </a>
                
                <a class='carousel-control-next' href='#carouselExampleIndicators' role='button' data-slide='next'>
                <span class='carousel-control-next-icon' aria-hidden='true'></span>
                <span class='sr-only'>Next</span>
                </a>
                
        </div>";

    echo"<div class='row'>
            <p class='lead text-center'>Bienvenue sur notre site ISIWEB4SHOP ! <br /> Découvrez notre gamme de produits en sélectionnant 
            la catégorie de votre choix à gauche de votre écran.<br />
            Nos produits proviennent de très bon producteurs passionnées.</p>
        </div>";
        }?>

            <div class='row'>
            <?php if(isset($getProduit)){
               //echo "<div><img src='public/images/banniere1' alt = banniere/></div>";

                foreach($getProduit as $produit){
                    echo "<div class='col-lg-4 col-md-6 mb-4 col'>
                                <div class='card h-100'>
                                    <img class='card-img' src='public/images/" . $produit['image'] . "' alt = image/>
                                    <div class='card-body'>
                                        <h4 class='card-title'> " . $produit['name'] . "</h4>
                                        <h5> " . $produit['price'] ."€</h5>
                                        <p class='card-text'> " . $produit['description'] . "</p>
                                        </div>
                                        <form action='index.php?action=panier&product_id=" . $produit['id'] . "' method=\"post\">
                                             <div class='form-row justify-content-lg-center'>
                                                <div class='form-group col-lg-5'>
                                                     <button class=' btn btn-secondary btn-lg center-block col-lg-12' type='submit'><i class='fas fa-cart-arrow-down'></i></button>
                                                 </div>
                                                 <div class='form-group col-lg-4'>
                                                      <input class='form-control text-center' name='quantite' type='number' min='1' max='100' value='1' />
                                                 </div>
                                             </div>
                                             </form>
                                </div>
                             </div>";
                }
            }?>
                </div>
            </div>
        </div>
    </div>

        <script src="public/bootstrap/vendor/jquery/jquery.min.js"></script>
  <script src="public/bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   </body>
</html>
