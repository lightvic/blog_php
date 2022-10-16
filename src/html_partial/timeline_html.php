<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="/../php_partial/new_article.php" method="post">
    <label for="newArticle" method="post">Nouvel article</label>
    <textarea name="newArticle" id="newArticle"></textarea>
    <button type="submit">Envoyer</button>
</form>
</form>
    <?php foreach($articles as $article):?>
        <p><?= $article["body"]; ?></p>
            
        <?php if(($user_id === $article["user_id"] || $_SESSION["user"]["admin"] == TRUE)): ?>
            <form action="/../php_partial/delete.php" method="POST">
                <button type="submit">Supprimer</button>
                <input type="hidden" name="article_id" value="<?= $article["article_id"] ?>">
            </form>
        <?php endif;?>
    <?php endforeach ?>

    <script src="/../script/timeline.js"></script>
</body>
</html>