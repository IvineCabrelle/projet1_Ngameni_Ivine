<?php
require_once("../functions/userCrud.php");
require_once("../functions/validation.php");
require_once("../utils/connexion.php");
require_once("../functions/functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer vos informations</title>

</head>
<body>
    <form method="post" action="./SupprimerProfils2.php">
    <h1> Entrer votre user_name s'il vous plait que vous souhaitez supprimer</h1>
    <label for="user_name" class="form-label">Votre User_name</label>
    <input type="text" class="form-control" id="user_name" name="user_name" aria-describedby="emailHelp">
    <button type="submit" value="Envoyer">Envoyer</button>
    </form>
</body>
</html>