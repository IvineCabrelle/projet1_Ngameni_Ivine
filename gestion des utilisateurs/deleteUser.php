<?php
        require_once "../functions/userCrud.php";
        require_once "../functions/functions.php";
        require_once "../utils/connexion.php";

            if(isset($_POST)){
                        $deleteUser=deleteUser($_POST['user_name']);
            
                        $url='../accueil/accueil.php';
                        header("location" .$url);
                    }

            ?>
