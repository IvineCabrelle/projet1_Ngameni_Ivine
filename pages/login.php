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
<label for="user_name">Nom d'utilisateur</label>
<input id="user_name" type="text" name="user_name" value="" placeholder=" Entrez votre user name"><br><br>
<p style="color: red; font-size: 0.8rem;"><?php echo isset($_SESSION['errorLogin']['user_name'])? $_SESSION['errorLogin']['user_name'] : '' ?></p> <br><br>

<label for="pwd">Mot de passe</label>
<input id="pwd" type="text" name="pwd" value="" placeholder=" Entrez votre mot de passe"><br><br>
<p style="color: red; font-size: 0.8rem;"><?php echo isset($_SESSION['errorLogin']['user_name'])? $_SESSION['errorLogin']['user_name'] : '' ?></p> <br><br>
<button type="submit">Me connecter</button> <br> 

<a href="../">Accueil</a><br><br>
<a href="./SignUp.php">S'enregistrer</a>
</form>