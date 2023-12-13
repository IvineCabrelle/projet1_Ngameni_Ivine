<a href="../">Accueil</a>
<?php
require_once '../functions/validation.php';
require_once '../functions/userCrud.php';
require_once '../functions/functions.php';
require_once '../utils/connexion.php';
session_start();

 var_dump($token);

if (isset($_POST)) {
    $_SESSION['signup_form'] = $_POST;

    unset($_SESSION['signup_errors']);
    $fieldValidation = true;

    // validation de l' user name
    if (isset($_POST['user_name'])) {
        $nameIsValidData = usernameIsValid($_POST['user_name']);

        if ($nameIsValidData['isValid'] == false) {
            $fieldValidation = false;
        }
    }

    //validation de l' email
    if (isset($_POST['user_name'])) {
        $emailIsValidData = emailIsValid($_POST['email']);

        if ($emailIsValidData['isValid'] == false) {
            $fieldValidation = false;
        }
    }
    // validation du  password
    if (isset($_POST['user_name'])) {
        $pwdIsValidData = pwdLenghtValidation($_POST['pwd']);

        if ($pwdIsValidData['isValid'] == false) {
            $fieldValidation = false;
        }
    }
     // validation du firstname
    if (isset($_POST['fname'])) {
        $firstNameValidationData = firstNameValidation($_POST['fname']);

        if ($firstNameValidationData['isValid'] == false) {
            $fieldValidation = false;
        }
    }
    // validation du last name
    if (isset($_POST['lname'])) {
        $lastnameValidationData = lastnameValidation($_POST['lname']);
        
        if ($lastnameValidationData['isValid'] == false) {
            $fieldValidation = false;
        }
    }
    
    if ($fieldValidation == true) {
        //envoie des informations vers la base de données
        
        $encodedPwd = encodePwd($_POST['pwd']);
        $data = [
            'user_name' => $_POST['user_name'],
            'email' => $_POST['email'],
            'pwd' => $encodedPwd,
            'fname'=>$_POST['fname'],
            'lname'=>$_POST['lname'],
            "billing_address_id"=> 0, 
            "shipping_address_id"=>0,
            "token"=>"", 
            "role_id"=>3,
            
        ];
        $newUser = createUser($data);
    } else {

        // redirect to signup et donner les messages d'erreur si la validation n'est pas bonne
       
        $_SESSION['signup_errors'] = [
            'user_name' => $nameIsValidData['msg'],
            'email' => $emailIsValidData['msg'],
            'pwd' => $pwdIsValidData['msg'],
            'fname'=> $firstNameValidationData['msg'],
            'lname'=>$lastnameValidationData['msg']     
        ];
        var_dump("$_SESSION ['signup_errors']");
        $url = '../pages/SignUp.php';
        header('Location: ' . $url);
    }
} else {
    //redirect vers signup
    $url = '../pages/SignUp.php';
    header('Location: ' . $url);
}
