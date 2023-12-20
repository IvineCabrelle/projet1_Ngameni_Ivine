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
          <th>Nom</th>
          <th>prix</th>
          <th>quantité</th>
          <th>action</th>
        </tr>
        <?php
        // liste  des produits 
        //récupérer les clés du tableau session

        var_dump("Je suis dans mon panier");
        if (isset($_SESSION['panier'])) {
          $ids=array_keys($_SESSION['panier']);
        }
        //s'il n'y'a aucune clé dans le tableau
        if(empty($ids)){
          echo "votre panier est vide";
        }
        else{
          // si il y a quelque chose dans le panier
        $products =[];
        foreach ($ids as $id ) {
        $products[$id] = getProductById($id);
        }
var_dump($products);
die;
          //$produits = mysqli_query($conn,"SELECT * FROM product WHERE id in(.implode('',$ids)");
        
        foreach($products as $product):
        ?>
        <tr>
          <td>
            <img
              src="../Images/<?=$product['img_url']?>"
            />
          </td>
          <td><?=$product['price']?></td>
          <td><?=$product['quantity']?>/td>
          <td><?=$product['description']?>/td>
          <td><img src="delete.png" alt=""></td>
          </td>
        </tr>

        
        <tr>
            <td>
              <img
                src="../Images/41klCoeJ9xL-225x300.jpg"
              />
            </td>
            <td>12€</td>
            <td>4</td>
            <td><img src="delete.png" alt=""></td>
            </td>
          </tr>
          <tr>
            <td>
              <img
                src="../Images/aucun-echec-n-a-besoin-d-etre-final-1-1-150x200.jpg"
              />
            </td>
            <td>8€</td>
            <td>1</td>
            <td><img src="delete.png" alt=""></td>
            </td>
          </tr>
          <tr>
            <td>
              <img
                src="../Images/Combat-pratique-1-150x200.jpg"
              />
            </td>
            <td>15€</td>
            <td>3</td>
            <td><img src="delete.png" alt=""></td>
            </td>
          </tr>
          <tr>
            <td>
              <img
                src="../Images/Delivrance-1-1-150x200.jpg"
              />
            </td>
            <td>14€</td>
            <td>2</td>
            <td><img src="delete.png" alt=""></td>
            </td>
          </tr>
          <tr>
            <td>
              <img
                src="../Images/La-Celebrite-un-Masque-1-1-150x200.jpg"
              />
            </td>
            <td>20€</td>
            <td>1</td>
            <td><img src="delete.png" alt=""></td>
            </td>
          </tr>
          <tr>
            <td>
              <img
                src="../Images/La-Centralite-de-la-Priere-1-225x300.jpg"
              />
            </td>
            <td>25€</td>
            <td>2</td>
            <td><img src="delete.png" alt=""></td>
            </td>
          </tr>
          <tr>
            <td>
              <img
                src="../Images/La-Conscience-du-Croyant-150x200.jpg"
              />
            </td>
            <td>30€</td>
            <td>1</td>
            <td><img src="delete.png" alt=""></td>
            </td>
          </tr>
          <tr>
            <td>
              <img
                src="../Images/Lutilisation-du-Temps-1-1-150x200.jpg"
              />
            </td>
            <td>7€</td>
            <td>5</td>
            <td><img src="delete.png" alt=""></td>
            </td>
          </tr>
          <tr>
            <td>
              <img
                src="../Images/Peche-de-la-paresse-1-225x300.jpg"
              />
            </td>
            <td>20€</td>
            <td>5</td>
            <td><img src="delete.png" alt=""></td>
            </td>
          </tr>
          <?php endforeach ; }?>

          <tr class="total">
            <th>Total:25€</th>
          </tr>
          
      </table>
    </section>
  </body>
</html>
