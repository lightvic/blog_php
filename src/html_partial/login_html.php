<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php if (!isset($_SESSION["user"]["identifiant"])):?>
   
    <form method="post">
        <h2> Connexion </h2>
        <label class="identifiantLog" for="text">Identifiant :</label>
        <input class="identifiantLog" type="text" id="identifiantLog" name="identifiantLog" placeholder="">
        <label class="mdp" for="mdpLog">Mot de passe :</label>
        <input class="inputSign" type="password" id="mdpLog" name="mdpLog" placeholder="">
            <button class="validate" type="submit" id="valider" name="valider" >Valider</button>
    </form>
    <br>
    <br>
    
    <h2> S'inscrire </h2>
    <form action="/../php_partial/signUp.php" method="POST">
        <label class="test" for="identifiant">Identifiant :</label>
        <input class="inputSign" type="text" id="identifiant" name="identifiant" placeholder="">
        <label class="test" for="password">Mot de passe :</label>
        <input class="inputSign" type="password" id="password" name="password" placeholder="">
        <label class="test" for="confirmPassword">Confirmer le mot de passe :</label>
        <input class="inputSign" type="password" id="confirmPassword" name="confirmPassword" placeholder="">
        <input class="validate" type="submit" id="valider" value="Valider"/>
    </form>
<?php endif; ?>
</body>
</html>
