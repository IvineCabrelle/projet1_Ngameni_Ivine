<?php
// Validation du signUp
function usernameIsValid(string $username): array
{
    $result = [
        'isValid' => true,
        'msg' => ''

    ];

    $userInDB = getUserByUsername($username);

    if (strlen($username) < 2) {
        $result = [
            'isValid' => false,
            'msg' => 'Le nom utilisé est trop court'

        ];
    } elseif (strlen($username) > 30) {
        $result = [
            'isValid' => false,
            'msg' => 'Le nom utilisé est trop long'

        ];
    } elseif ($userInDB) {
        $result = [
            'isValid' => false,
            'msg' => 'Ce nom existe déja dans la base de données'
        ];
    }
    return $result;
}
// validation de l'email

function emailIsValid( string $email):array
{

    $email_validation_regex = "/^[a-z0-9!#$%&'*+\\/=?^_`{|}~-]+(?:\\.[a-z0-9!#$%&'*+\\/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/";
    if (!preg_match($email_validation_regex, $email)) {
        return [
            'isValid' => false,
            'msg' => "Format d'email invalide",
        ];
    }
    return [
        'isValid' => true,
        'msg' => '',
    ];
}

function pwdLenghtValidation(string $pwd):array
{
    //minimum 6 max 20
    $length = strlen($pwd);

    if ($length < 6) {
        return [
            'isValid' => false,
            'msg' => 'Votre mot de passe est trop court. Il doit être supérieur à 8 caractères'
        ];
    } elseif ($length > 20) {
        return [
            'isValid' => false,
            'msg' => 'Votre mot de passe est trop long. Il doit être inférieur à 16 caractères'
        ];
    }
    return [
        'isValid' => true,
        'msg' => ''
    ];
}
// faudrait adapter la validation du nom face au contenu
function firstNameValidation($fname) {
    
    if(empty($fname)){        
        return [
            'isValid' => false,
            'msg' => "Doit etre rempli",
        ];
    }
    
    if(strlen($fname)<2){
        return [
            'isValid' => false,
            'msg' => "Format de first name invalide",
        ];
        
    }
    
    return [
       'isValid' => true,
       'msg' => ''
    ];
}
function lastnameValidation($lname){
    // validation du last name
        
        if(strlen($lname)<2){
        return [
            'isValid' => false,
            'msg' => 'format de last name invalide'
        ];
        
        } 

            return [
                'isValid' => true,
                'msg' => ''
            ];
          
    
}
// function pour valiser l'user_name du login
function usernameValidation($data){
    $userInDB=getUserByUsername($data);
    $result=[
        'isValid'=>true,
        'msg' => "Ce user_name n'existe pas dans notre base de données"

    ];
    if($userInDB){
        $result=[
            'isValid'=>true,
            'msg' => ''
    
        ];
    }
    else{
        $result=[
            'isValid'=>false,
            'msg' => "Ce user_name n'existe pas dans notre base de données"
    
        ];
    }
    return $result;

}
require_once("addressCrud.php");

//validation de street_name de l'address
function  street_nameIsValid($street_name): array
{
    $result = [
        'isValid' => true,
        'msg' => ''
    ];
    echo '<br><br>';
    if (strlen($street_name) > 50) {
        $result = [
            'isValid' => false,
            'msg' => "Le nom de rue ($street_name) utilisé est trop long."
        ];
    }
    return $result;
}

//validation des adresses: verifié si elle est deja dans la base de donnees 
function addressIsValid($country, $zip_code): array
{
    $result = [
        'isValid' => true,
        'msg' => ''
    ];
    $addressInDB=getUserBycountryAndzip_code($country,$zip_code);

    if ($addressInDB) {

        $result = [
            'isValid' => false,
            'msg' => "cette adresse dont la country est $country et zip_code est $zip_code est deja utilisée ."
        ];
    }
    return $result;
}

//validation du country
function countryIsValid($country): array
{
    $result = [
        'isValid' => true,
        'msg' => ''
    ];
    echo '<br><br>';

    if (strlen($country) !=4) {
        $result = [
            'isValid' => false,
            'msg' => "le nom du pays utilisé ($country) contient plus ou moins de 4 caracteres."
        ];
    }
    return $result;
}
// validation du zipcode
function zip_codeIsValid($zip_code): array
{
    $result = [
        'isValid' => true,
        'msg' => ''
    ];
    echo '<br><br>';
    if (strlen($zip_code) !=6 ) {
        $result = [
            'isValid' => false,
            'msg' => "le code postale utilisé ($zip_code) contient plus ou moins de 6 caracteres."
        ];
    }
    return $result;
}
// validation de la province
function provinceIsValid($province): array
{
    $result = [
        'isValid' => true,
        'msg' => ''
    ];
    echo '<br><br>';
    if (strlen($province) !=5 ) {
        $result = [
            'isValid' => false,
            'msg' => "le nom de la province utilisé ($province) contient plus ou moins de 5caracteres."
        ];
    }
    return $result;
}

function addressNbIsValid($word){
// Vérifier si l'entrée est un nombre
if (is_numeric($word)) {
    return true; // L'entrée est un nombre
} else {
    return false; // L'entrée n'est pas un nombre
}
}






?>