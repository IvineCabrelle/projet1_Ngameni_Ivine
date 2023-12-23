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
//s'il n'existe pas une session on créer une
$_SESSION['panier']=array();
}
//Récupération de l'id dans le lien
if(!isset($_GET['id'])){
    $id=$_GET['id'];
    // Vérifier grace a l'id si le produit  existe dans la base de données
    $produit=mysqli_query($conn,"SELECT * FROM product WHERE id=$id");
    if(empty(mysqli_fetch_assoc($produit))){
        // si le produit n'existe pas 
        die("ce produit n'existe pas");
    }
    //Ajouter le produit dans le pqnier (le tableau)
    if (isset($_SESSION['panier'][$id])){
        // si le produit est déja dans le panier
        $_SESSION['panier'][$id]++;
    }// répresente la quantité
    else{
        // sinon on ajoute le produit
        $_SESSION['panier']['id']=1;
        echo"Le produit a bien été mis dans le panier";
        var_dump($_SESSION['panier']);


    }
}

?>