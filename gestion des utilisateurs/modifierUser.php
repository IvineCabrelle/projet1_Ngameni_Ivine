

<?php
    require_once "../functions/userCrud.php";
        require_once "../functions/functions.php";
        require_once "../utils/connexion.php";

session_start();

if(isset($_POST)){
    if(isset($_SESSION['auth'])){
        $userData = getUserByUsername($_POST['user_name']);
        if($userData){
            $data=[
                'user_name'=>$_POST['user_name'],
                'role_id'=>$_POST['role_id']
            ];
            
            $updateRole=updateRoleId($data);

            $url='../accueil/accueil.php';
            header("location" .$url);
            exit();
        }
    }
}
