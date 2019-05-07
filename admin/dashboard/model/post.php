<?php 

require_once 'model/model.php';

class Post extends Model{

    public function getPosts(){             // Renvoie la liste des billets du site
        $sql = 'SELECT BIL_ID as id, DATE_FORMAT(BIL_DATE, "%d/%m/%Y à %Hh%i") as date, BIL_TITRE as titre, BIL_CONTENU as contenu FROM T_BILLET ORDER BY BIL_ID DESC';
        $posts = $this->executerRequete($sql);
        return $posts;
    }

    public function getPost($idPost){       // Renvoie les informations sur un billet
        $sql = 'SELECT BIL_ID as id, BIL_DATE as date, BIL_TITRE as title, BIL_CONTENU as content FROM T_BILLET WHERE BIL_ID = ?';
        $post = $this->executerRequete($sql, array($idPost));
        if($post->rowCount() == 1)
            return $post->fetch();      // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun billet ne correspond à l'identifiant '$idPost'");
    }
}