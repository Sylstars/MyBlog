<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Mon blog</title>
    <link href="public/css/style.css" rel="stylesheet" />
</head>

<body>
    <h1>Mon super blog !</h1>
    <p><a href="/view/frontend/postView.php">Retour à la liste des billets</a></p>

    <form action="/index.php?action=changeComment&id=<?= $comment->id ?>" method="post">
        <div>
            <label for="author">Auteur</label><br />
            <input value="<?=$comment->author?>" type="text" id="author" name="author" />
        </div>
        <div>
            <label for="comment">Commentaire</label><br />
            <textarea id="comment" name="comment"><?=$comment->comment?></textarea>
        </div>
        <div>
            <input type="submit" />
        </div>
    </form>
    
</body>

</html>