<?php
session_start();

$pdo = new PDO("mysql:host=database:3306;dbname=db_blog","root","root");
// Connexion
if (!isset($_SESSION["user"]["identifiant"])){

    $identifiantLog = filter_input(INPUT_POST, "identifiantLog");
    $mdp = hash("sha512", filter_input(INPUT_POST, "mdpLog"));
    $messageLog = "";
    
    // get user info by checking mail
    $maRequete = $pdo->prepare("SELECT * FROM `users` WHERE `identifiant` = :identifiant;");
        $maRequete->execute([
            ":identifiant" => $identifiantLog
        ]);
    $user = $maRequete->fetch();

    // if no result, error message
    if (!$user || hash("sha512",$user["password"]) !== $mdp) {
        $messageLog = "Utilisateur invalide";
        http_response_code(403);
    }
        else{
        $_SESSION["user"]= $user;
        // go to timeline
        require_once __DIR__ . "/php_partial/timeline.php";
    }
    require_once __DIR__ . "/html_partial/login_html.php";
}
    else{
    require_once __DIR__ . "/php_partial/timeline.php";
}
    

    ?>