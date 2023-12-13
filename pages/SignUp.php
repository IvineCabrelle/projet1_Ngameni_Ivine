<?php
session_start();
var_dump($_SESSION);
$user_name = '';
if (isset($_SESSION['signup_form']['user_name'])) {
    $user_name = $_SESSION['signup_form']['user_name'];
}
$email = '';
if (isset($_SESSION['signup_form']['email'])) {
    $email = $_SESSION['signup_form']['email'];
}
$pwd = '';
if (isset($_SESSION['signup_form']['pwd'])) {
    $pwd = $_SESSION['signup_form']['pwd'];
}
$fname= '';
if (isset($_SESSION['signup_form']['fname'])) {
    $fname = $_SESSION['signup_form']['fname'];
}
$lname= '';
if (isset($_SESSION['signup_form']['lname'])) {
    $lname = $_SESSION['signup_form']['lname'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'acceuil</title>
</head>
<body>
    <h1> Veuillez enregistrer vos informations</h1>
    <form method="post" action='../resultats/SignUpResults.php'>
        <fieldset>
        <legend><b>signUp </b></legend>
        <label for="user_name"> <b> User name </b></label>
        <input type="text" name="user_name" id="user_name" placeholder=" Entrez votre user name">
        <p style="color: red; font-size: 0.8rem;"><?php echo isset($_SESSION['signup_errors']['user_name'])? $_SESSION['signup_errors']['user_name'] : '' ?></p> <br><br>
    
        <label for="email"><b> Email</b> </label>
        <input type="email" name="email" id="email" placeholder=" Entrez votre email">
        <p style="color: red; font-size: 0.8rem;"><?php echo isset($_SESSION['signup_errors']['email'])? $_SESSION['signup_errors']['email'] : '' ?></p><br><br>
        
        <label for="pwd"> <b> Mot de passe</b></label>
        <input type="pwd" name="pwd" id="pwd" placeholder=" Entrez votre pwd">
        <p style="color: red; font-size: 0.8rem;"><?php echo isset($_SESSION['signup_errors']['pwd'])? $_SESSION['signup_errors']['pwd'] : '' ?></p><br><br>
        
        <label for="fname"><b> First name</b> </label>
        <input type="text" name="fname" id="fname" placeholder=" Entrez votre first name"><br><br>
        <p style="color: red; font-size: 0.8rem;"><?php echo isset($_SESSION['signup_er rors']['fname'])? $_SESSION['signup_errors']['fname'] : '' ?></p><br><br>
        
        <label for="lname"><b> Last name </b></label>
        <input type="text" name="lname" id="lname" placeholder=" Entrez votre last name"><br><br>
        <p style="color: red; font-size: 0.8rem;"><?php echo isset($_SESSION['signup_errors']['lname'])? $_SESSION['signup_errors']['lname'] : '' ?></p><br><br>
        
      <button type ="submit" name="Soumettre">Soumettre</button>
    </fieldset>
    </form>
</body>
</html>