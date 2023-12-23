<h2>Se connecter</h2>
<form method="post" action="../resultats/loginResults.php">

<fieldset>
<legend><b>login</b></legend>
<fieldset>
<h2>Connexion</h2>
<?php
 $user_name = '';
 if (isset($_SESSION['login_form']['user_name'])) {
     $user_name = $_SESSION['login_form']['user_name'];
 }
 $pwd = '';
 if (isset($_SESSION['login_form']['pwd'])) {
     $pwd = $_SESSION['login_form']['pwd'];
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Votre Titre</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    form {
      max-width: 400px;
      margin: 0 auto;
    }

    label {
      display: block;
      margin-bottom: 8px;
    }

    input {
      width: 100%;
      padding: 8px;
      margin-bottom: 16px;
      box-sizing: border-box;
    }

    p.error-message {
      color: red;
      font-size: 0.8rem;
      margin-bottom: 16px;
    }

    button {
      background-color: #4caf50;
      color: white;
      padding: 10px 15px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    button:hover {
      background-color: #45a049;
    }

    a {
      text-decoration: none;
      color: #007bff;
      margin-right: 16px;
    }
  </style>
</head>
<body>

  <form action="votre_action.php" method="post">
    <label for="user_name">Nom d'utilisateur</label>
    <input id="user_name" type="text" name="user_name" value="" placeholder="Entrez votre nom d'utilisateur">

    <p class="error-message"><?php echo isset($_SESSION['errorLogin']['user_name'])? $_SESSION['errorLogin']['user_name'] : '' ?></p>

    <label for="pwd">Mot de passe</label>
    <input id="pwd" type="password" name="pwd" value="" placeholder="Entrez votre mot de passe">

    <p class="error-message"><?php echo isset($_SESSION['errorLogin']['pwd'])? $_SESSION['errorLogin']['pwd'] : '' ?></p>

    <button type="submit">Me connecter</button>

    <a href="../">Accueil</a>
    <a href="./SignUp.php">S'enregistrer</a>
  </form>

</body>
</html>