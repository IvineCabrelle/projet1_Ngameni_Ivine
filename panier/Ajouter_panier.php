<?php
session_start();
// inclure la page de connexion
require_once "../utils/connexion.php";
// Vérifier si une session existe
if (!isset($_SESSION)){
    // SI non demarrer la session
    session_start();
}
// créer la session
if(!isset ($_SESSION['panier'])){
//s'il n'existe pas une session on va créer une et on mets un tableau a l'intérieur
$_SESSION['panier']=array();
}

//Récupération de l'id dans le lien
if(isset($_GET['id'])){
    //Si un id a été envoyé alors:
    $id=$_GET['id'];
    // Vérifier grace a l'id si le produit  existe dans la base de données
    $product=mysqli_query($conn,"SELECT * FROM product WHERE id = $id");
    if(empty(mysqli_fetch_assoc($product))){
        // si le produit n'existe pas 
        die("ce produit n'existe pas");
    }
    //Ajouter le produit dans le panier (le tableau)
    if (isset($_SESSION['panier'][$id])){
        // si le produit est déja dans le panier
        $_SESSION['panier'][$id]++;
    }// répresente la quantité
    else{
        // sinon on ajoute le produit
        $_SESSION['panier']['id']=1;
       //redirection vers la page indexPanier.php
       header("Location:./indexPanier.php");
     

    }
}

?>