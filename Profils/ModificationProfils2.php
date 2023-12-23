<?php
session_start();
require_once("../functions/userCrud.php");
require_once("../functions/validation.php");
require_once("../utils/connexion.php");
require_once("../functions/functions.php");
var_dump(($_POST["user_name"]));
?><li class="nav-item">
            <a class="nav-link" href="./supprimerProfilsClients.php">Supprimer vos produits</a>
            <?php
$user_name=$_POST["user_name"];
$verification=true;
if(isset($user_name)){
   
    
    if (!empty($user_name)){
        $recuperationInformation=getUserByUsername($user_name);
        var_dump($recuperationInformation);
       
        if($recuperationInformation){
            //Préremplie le champs avec les anciennes valeurs
            ?>
            <form method="post" action="../resultats/resultatsPropfils.php">
            <h1> Quelles informations souhaitez-vous modifier?</h1>
            <h2>Entrez la valeur que vous aimeriez s'il vous plait !</h2>
            <form action="" method="post">
                <input type="text" value="<?php echo ($recuperationInformation["id"]) ?>" id="id" name="id" hidden>
                <input type="text" value="<?php echo ($recuperationInformation["user_name"]) ?>" id="user_name" name="user_name">
                <input type="text" value="<?php echo ($recuperationInformation["email"]) ?>" id="email" name="email">
                <input type="text" value="<?php echo ($recuperationInformation["fname"]) ?>" id="fname" name="fname">
                <input type="text" value="<?php echo ($recuperationInformation["lname"]) ?>" id="lname" name="lname">
                <button type="submit" value="Valider">valider vos informations</button>
            </form>
            <?php
        }
        else{
            //si les informations n'existent pas dans la base données, elle affiche l'erreur
            echo "<span>N'existe pas dans la base de données</span>";

        }
    
    }
    
}else{
    //Si la valeur de votre user_name est vide 
    echo "error!!!!La valeur de votre user_name est vide";
}
?>

