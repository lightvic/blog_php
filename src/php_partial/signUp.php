<?php
$pdo = new PDO("mysql:host=database:3306;dbname=db_blog","root","root");
$message="";
session_start();
// inscription
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $identifiant = filter_input(INPUT_POST, "identifiant");
    $mdp =  filter_input(INPUT_POST, "password");
    $confirmMdp = filter_input(INPUT_POST, "confirmPassword");

    // if no result, create new user
    if ($mdp == $confirmMdp) {
        $maRequete = $pdo->prepare("INSERT INTO `users` (`identifiant`, `password`, `admin`) VALUES(:identifiant ,:mdp, false);");
        $maRequete->execute([
            ":identifiant" => $identifiant,
            ":mdp" => $mdp
        ]);

        $user = $maRequete->fetch();
        // set session witch new user infos
        $_SESSION["user"] = $user;

        // got to timeline
        
    }
        else {
        $message = "Les mots de passe ne correspondent pas";
        http_response_code(403);
    }
}
?>