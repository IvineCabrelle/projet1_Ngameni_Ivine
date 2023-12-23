<?php
session_start();
require_once('../functions/userCrud.php');
require_once('../utils/connexion.php');
require_once('../functions/productCrud.php');

require_once("../functions/functions.php");
var_dump($_POST);
if($AJOUTER=createProduct($_POST)){
  echo "Produit ajouté avec succès";  
}

else if ($Delete=deleteProduct($_POST)){
    echo "Produit supprimé avec succès";
}

else if ($Modifier=updateProduct($_POST)){
    echo "Produit modifié avec succès";
}
