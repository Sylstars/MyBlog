<?php

require_once('model/Manager.php');

class CommentManager extends Manager
{

    public function getComments($postId)
    {
        $db = $this->dbConnect();

        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    // fonction qui post un commentaire
    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }

    // modifier un commentaire
    public function changeComments($commentId, $author, $comment)
    {
        $query = "
            UPDATE comments
            SET author  = ?,
                comment = ?,
                comment_date = NOW()
            WHERE id = ?
        ";
        $db = $this->dbConnect();
        $comments = $db->prepare($query);
        $affectedLines = $comments->execute(array($commentId, $author, $comment));

        return $affectedLines;
    }
}

/*
    // modification des commentaires
    public function changeComments($postId, $author, $comment)
    {
        // Ouverture en mode lecture-écriture
        $db = dbase_open('mysql:host=localhost;dbname=mini_blog;charset=utf8','root','root', 2);

        if ($db) {
            // Récupération de l'ancienne ligne
            $row = dbase_get_record_with_names($db, 1);

            // Supprime l'entrée effacée
            unset($row['deleted']);

            // Mise à jour de la date du champ avec le timestamp courant
            $row['date'] = date('Ymd');

            // Remplacer l'enregistrement
            dbase_replace_record($db, $row, 1);
            dbase_close($db);
        }
    }
}
*/

