<?php

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
             return [
                'isValid' => true,
                'msg' => ''
             ];

    if (preg_match('/^[a-zA-Z]+$/',$fname)) {
            
        if(strlen($fname)<2){
            return [
                        'isValid' => false,
                        'msg' => "Format de first name invalide",
            ];

        }
    }
}
function lastnameValidation($lname){
    // validation du last name
    if (! preg_match ('/^[a-zA-z]*$/', $lname) ) {
        
        if(strlen($lname)<2){
        return [
            'isValid' => false,
            'msg' => 'format de last name invalide'
        ];
        
        } else {
            return [
                'isValid' => true,
                'msg' => ''
            ];
        }    
    }
}

?>