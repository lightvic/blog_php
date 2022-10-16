<?php
    if($_SERVER["RESQUEST_METHOD"] === "POST"){
        if(isset($_POST["modify"])){
            $pdo = new PDO("mysql:host=database:3306;dbname=db_blog","root","root");

            $user_id = $_SESSION["user"]["user_id"];
            $content = filter_input(INPUT_POST, "modify");
            $article_id = filter_input(INPUT_POST,"article_id");

            $maRequete = $pdo->prepare("UPDATE `articles` SET `body` = :oneData WHERE `article_id` = :article_id");
            $maRequete->execute([
                ":oneData"=>$content,
                ":article_id"=>$article_id
            ]);
        }
    }

    header("Location: /php_partial/timeline.php");
?>