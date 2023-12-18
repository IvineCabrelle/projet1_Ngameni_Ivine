<?php
require_once('../functions/userCrud.php');
require_once('../utils/connexion.php');
require_once('../functions/productCrud.php');
var_dump($_POST);
$AJOUTER=createProduct($_POST);
echo "Produit ajouté avec succès";
$Delete=deleteProduct($_POST);
echo "Produit supprimé avec succès";
$Modifier=updateProduct($_POST);
echo "Produit modifié avec succès";