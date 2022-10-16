<?php 

session_start();
$pdo = new PDO("mysql:host=database:3306;dbname=db_blog","root","root");
// Connexion
    $identifiantLog = filter_input(INPUT_POST, "identifiantLog");
    $mdp = filter_input(INPUT_POST, "mdpLog");
    
    $maRequete = $pdo -> prepare("SELECT * FROM `articles`");
    $maRequete -> execute();
    $articles = $maRequete->fetchAll(PDO::FETCH_ASSOC);

    
    $maRequete = $pdo->prepare("SELECT `user_id`, `identifiant`, `password` FROM `users` WHERE `identifiant` = :identifiant;");
        $maRequete->execute([
            ":identifiant" => $identifiantLog
        ]);
    $user = $maRequete->fetch();

    if (!$user || $user["password"] != $mdp) {
        http_response_code(403);
    }
        else{
        $_SESSION["user"] = $user;
        http_response_code(302);
     
        header("Location: /timeline");
        exit();
    }

require_once "php_partial/login_html.php";
?>