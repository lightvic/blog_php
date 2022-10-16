<?php
session_start();
$pdo = new PDO("mysql:host=database:3306;dbname=db_blog","root","root");

if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(isset($_POST["article_id"])){

        $article_id = filter_input(INPUT_POST,"article_id");
        $user_id = $_SESSION["user"]["user_id"];

        $maRequete = $pdo -> prepare("SELECT * FROM `articles`");
        $maRequete -> execute();
        $articles = $maRequete->fetchAll(PDO::FETCH_ASSOC);

        $maRequete = $pdo->prepare("DELETE FROM `articles` WHERE `article_id` = :id");
        $maRequete->execute([
            ":id"=> $article_id
        ]);
    }
    
}
header("Location: /php_partial/timeline.php");

?>