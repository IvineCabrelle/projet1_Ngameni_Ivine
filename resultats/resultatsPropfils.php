<?php
require_once "../functions/userCrud.php";
require_once "../functions/validation.php";
require_once "../utils/connexion.php";
require_once "../functions/functions.php";

//Recupère toutes les données modifiées dans  le formulaire
if (isset($_POST["user_name"]) and isset($_POST["email"]) and isset($_POST["fname"]) and isset($_POST["lname"])) {
    $idRecupered = $_POST["id"];
    $changedUsername = $_POST["user_name"];
    $changedEmail = $_POST["email"];
    $changedFname = $_POST["fname"];
    $changedLname = $_POST["lname"];

    echo ($idRecupered);
    echo ($changedUsername);
    echo ($changedEmail);
    echo ($changedFname);
    echo ($changedLname);

    $data = [
        'id' => $idRecupered,
        'user_name' => $changedUsername,
        'email' => $changedEmail,
        'fname' => $changedFname,
        'lname' => $changedLname
    ];
    //modifie dans la base de données
    $save = updateUser($data);
    $url = "../accueil/accueilClients.php";
    header('Location:'.$url);
}
// recupère les données et demande s'il veut tout modifier
if (isset($_POST["user_name"]) and isset($_POST["email"]) and isset($_POST["fname"]) and isset($_POST["lname"])) {
    $idRecupered = $_POST["id"];
    $changedUsername = $_POST["user_name"];
    $changedEmail = $_POST["email"];
    $changedFname = $_POST["fname"];
    $changedLname = $_POST["lname"];

    echo ($idRecupered);
    echo ($changedUsername);
    echo ($changedEmail);
    echo ($changedFname);
    echo ($changedLname);

    $data = [
        'id' => $idRecupered,
        'user_name' => $changedUsername,
        'email' => $changedEmail,
        'fname' => $changedFname,
        'lname' => $changedLname
    ];
    //supprime dans la base de données
    if(isset($_POST)){
        $deleteUser=deleteUser($_POST['user_name']);

       echo "Vos informations ont été supprimées avec succès";
    
        
       }
       
       
    }

?>


