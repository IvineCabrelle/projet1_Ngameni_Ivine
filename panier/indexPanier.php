<!DOCTYPE >
<?php
// inclure la page de connexion
    require_once("../utils/connexion.php");
    ?>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device=width, initial-scale=1.0" />
  <title>Boutique</title>
  <link rel="stylesheet" href="../styles/stylePanier.css" />
  <a href="../accueil/accueil.php" class="link">Retour</a>
</head>
<body>
  <a href="panier.php" class="link">Panier<span><?php //array_sum($_SESSION['panier'])?></span></a>
  <section class="products_list">
    <?php
   
    //Afficher la liste des produits
    //$req=mysqli_query($conn,"SELECT * FROM product");
    // while($row=mysqli_fetch_assoc($req)){
    ?>
    <form action="" class="product">
        <div class="image_product">
        <img src="../Images/41fwuBEiDL._SX326_BO1204203200_-1-150x200.jpg">
        </div>
        <div class="content">
            <h4 class="name">Disciple coute que coute</h4>
            <h2 class="price">10€</h2>
            <a href="" class="id_product">Ajouter au panier</a>
        </div>
    </form>
    <form action="" class="product">
        <div class="image_product">
        <img src="../Images/41klCoeJ9xL-225x300.jpg">
        </div>
        <div class="content">
            <h4 class="name">centré sur Dieu</h4>
            <h2 class="price">12€</h2>
            <a href="" class="id_product">Ajouter au panier</a>
        </div>
    </form>
    <form action="" class="product">
        <div class="image_product">
        <img src="../Images/aucun-echec-n-a-besoin-d-etre-final-1-1-150x200.jpg">
        </div>
        <div class="content">
            <h4 class="name">Aucun échec n'a besoin d'etre final</h4>
            <h2 class="price">8€</h2>
            <a href="" class="id_product">Ajouter au panier</a>
        </div>
    </form>
    <form action="" class="product">
        <div class="image_product">
        <img src="../Images/Combat-pratique-1-150x200.jpg">
        </div>
        <div class="content">
            <h4 class="name">Combat Pratique</h4>
            <h2 class="price">15€</h2>
            <a href="" class="id_product">Ajouter au panier</a>
        </div>
    </form>
    <form action="" class="product">
        <div class="image_product">
        <img src="../Images/Delivrance-1-1-150x200.jpg">
        </div>
        <div class="content">
            <h4 class="name">la délivrance</h4>
            <h2 class="price">14€</h2>
            <a href="" class="id_product">Ajouter au panier</a>
        </div>
    </form>
        <form action="" class="product">
        <div class="image_product">
        <img src="../Images/La-Celebrite-un-Masque-1-1-150x200.jpg">
        </div>
        <div class="content">
            <h4 class="name">La celebrité un masque</h4>
            <h2 class="price">20€</h2>
            <a href="" class="id_product">Ajouter au panier</a>
        </div>
    </form>
    <form action="" class="product">
        <div class="image_product">
        <img src="../Images/La-Centralite-de-la-Priere-1-225x300.jpg">
        </div>
        <div class="content">
            <h4 class="name">la centralité de la prière</h4>
            <h2 class="price">25€</h2>
            <a href="" class="id_product">Ajouter au panier</a>
        </div>
    </form>
    <form action="" class="product">
        <div class="image_product">
        <img src="../Images/La-Conscience-du-Croyant-150x200.jpg">
        </div>
        <div class="content">
            <h4 class="name">La conscience du croyant</h4>
            <h2 class="price">30€</h2>
            <a href="" class="id_product">Ajouter au panier</a>
        </div>
    </form>
    <form action="" class="product">
        <div class="image_product">
        <img src="../Images/Lutilisation-du-Temps-1-1-150x200.jpg">
        </div>
        <div class="content">
            <h4 class="name">Utilisation du temps</h4>
            <h2 class="price">7€</h2>
            <a href="" class="id_product">Ajouter au panier</a>
        </div>
    </form>
    <form action="" class="product">
        <div class="image_product">
        <img src="../Images/Peche-de-la-paresse-1-225x300.jpg">
        </div>
        <div class="content">
            <h4 class="name">le Péché de la paresse</h4>
            <h2 class="price">20€</h2>
            <a href="" class="id_product">Ajouter au panier</a>
        </div>
    </form>
  </section>
</body>
</html>
<?php //} ?>