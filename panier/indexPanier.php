<!DOCTYPE >
<?php
session_start();
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
    <?php // Afficher le nombre de produit dans le panier ?>
    
  <a href="panier.php" class="link">Panier<span><?array_sum($_SESSION['panier'])?></span></a>
  <section class="products_list">
    <?php
   
    //Afficher la liste des produits
    $req=mysqli_query($conn,"SELECT * FROM product");
     while($row=mysqli_fetch_assoc($req)){
    ?>
    <form action="" class="product">
        <div class="image_product">
        <img src="../Images/<?=$row['img_url']?>">
        </div>
        <div class="content">
            <h4 class="name"><?=$row['name']?></h4>
            <h2 class="price"><?=$row['price']?></h2>
            
            <a href="Ajouter_panier.php ?id=<?=$row['id']?>" class="id_product">Ajouter au panier</a>
        </div>
  
    </form>
    <?php }
     ?>
  </section>
</body>
</html>
<?php // ?>