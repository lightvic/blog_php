<?php
$pdo = new PDO("mysql:host=database:3306;dbname=db_blog","root","root");
$message="";
session_start();
// inscription
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $identifiant = filter_input(INPUT_POST, "identifiant");
    $mdp =  filter_input(INPUT_POST, "password");
    $confirmMdp = filter_input(INPUT_POST, "confirmPassword");

 
    if ($mdp == $confirmMdp) {
        $maRequete = $pdo->prepare("INSERT INTO `users` (`identifiant`, `password`, `admin`) VALUES(:identifiant ,:mdp, false);");
        $maRequete->execute([
            ":identifiant" => $identifiant,
            ":mdp" => $mdp
        ]);

        $user = $maRequete->fetch();
     
        $_SESSION["user"] = $user;

   
        
    }
        else {
        $message = "Les mots de passe ne correspondent pas";
        http_response_code(403);
    }
}
?>