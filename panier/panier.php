<?php
session_start();
require_once("../utils/connexion.php")
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Panier</title>
    <link rel="stylesheet" href="../styles/stylePanier.css" />
  </head>
  <body class="Panier">
    <a href="indexPanier.php" class="link">Boutique</a>
    <section>
      <table>
        <tr>
          <th></th>
          <th>Nom</th>
          <th>prix</th>
          <th>quantité</th>
          <th>action</th>
        </tr>
        <?php
        // liste  des produits 
        //récupérer les clés du tableau session
          
        $ids=array_keys($_SESSION['panier']);
          //s'il n'y'a aucune clé dans le tableau
        if(empty($ids)){
          echo "votre panier est vide";
        }
        else{
          // si il y a quelque chose dans le panier
          $products = mysqli_query($conn, "SELECT id, name, price, img_url FROM PRODUCT WHERE id IN (" . implode(',', $ids) . ")");
        // liste des produits avec un boucle foreach
      
        while ($product = mysqli_fetch_assoc($products)){
        ?>
        <tr>
        <td><img src="../Images/<?=$product['img_url']?>"></td>
        <td><?=$product['name']?></td>
        <td><?=$product['price']?></td>
        <td><?= isset($_SESSION['panier'][$product['id']]) && $_SESSION['panier'][$product['id']] !== 0 ? $_SESSION['panier'][$product['id']] : 0 ?></td>
        <td><img src="./OIP.jpeg"></td>
        </tr>
        <?php }}?>
        <tr class="total">
          <th>Total : 25</th>
        </tr>
        </tr>
      </table>
      </body>
      </html>
       
        
        
        
        
        









        
        
        
     
     
        

        
         

   
          
   

