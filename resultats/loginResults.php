<a href="../">Accueil</a>
<h2>Login result</h2>
<?php
session_start();
require_once '../functions/validation.php';
require_once '../functions/userCrud.php';
require_once '../functions/functions.php';
require_once '../utils/connexion.php';

//var_dump($_POST);
?>
<form method='post' action='accueil.php'>

</form>
<?php

//Authentification

if (isset($_POST)) {

    //vérifier si username dans DB
    if (!empty($_POST['user_name'])) {
        $userData = getUserByUsername($_POST['user_name']);
    } else {
        //Erreur rien entré
        //redirect vers login
        $url = '../pages/login.php';
        header('Location: ' . $url);
    }

    //si l'utilisateur exist dans la DB
    if ($userData) {
        // comparer pwd avec DB (version encodée)
        $enteredPwdEncoded = encodePwd($_POST['pwd']);
        if ($userData['pwd'] == $enteredPwdEncoded) {
            //traitement si mdp correct
            //créeer un token
            $token = hash('sha256', random_bytes(32));
            echo '</br></br>Mon token : </br>';
            //enregistrer le token en Session et dans la DB

            echo "C'est le bon mdp ";

        }
        else {
            echo "C'est pas le bon mot de passe  ";        }
    }
} else {
    //redirect vers login
    $url = '../pages/login.php';
    header('Location: ' . $url);
}

    if($userData){
    $enteredPwdEncoded = encodePwd($_POST['pwd']);  
    $data=[
            'id'=>$userData['id'], 
        ' token'=>$token
    ];

        // ajout dans la base de données
        $AjoutToken=ChangerToken($data);
        if($userData['pwd']==$enteredPwdEncoded){
            $_SESSION['auth']=[
            'id'=>$userData['id'],
            'role_id'=>$userData['role_id'],
            'token'=>$token
            ];
            //var_dump("$token");
            // Récupération des informations sur l'administrateur connecté
            $connectedAdmin = $_SESSION['auth'];
            if (!isset($_SESSION['auth']) || ($_SESSION['auth']['role_id'] != 1 && $_SESSION['auth']['role_id'] != 2)) {
              
                header("Location:../accueil/accueilClients.php");
                exit();
            }
            
            else {
                $_SESSION['login_errors']=[
                    'errors_username'=>true
    
                ];
                $url = '../accueil/accueil.php';
                header('location:'.$url);
            }
          
        }
        
         // Redirection vers la page de panier si l'utilisateur n'est pas connecté en tant qu'admin ou super-admin
            else {
                $_SESSION['login_errors']=[
                    'errors_username'=>true
    
                ];
                $url = '../accueil/acceuil.php';
                header('location:'.$url);
            }
          
            

        }
         
    else {
            $_SESSION['login_errors']=[
                'errors_username'=>true

            ];
            $url = '../pages/SignUp.php';
            header('location:'.$url);
        }
       
      
        
        

    
?>


    ?>
    <a href='../index.php'>Retour<a>

