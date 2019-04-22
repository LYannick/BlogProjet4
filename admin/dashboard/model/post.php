<?php 

require_once 'model/model.php';

class Post extends Model{

    public function getPosts(){
    
        $sql = 'SELECT BIL_ID as id, BIL_DATE as date, BIL_TITRE as titre, 
        BIL_CONTENU as contenu FROM T_BILLET ORDER BY BIL_ID DESC';
        $posts = $this->executerRequete($sql);
        return $posts;
    }

    public function getPost($idPost){

        $sql = 'SELECT BIL_ID as id, BIL_DATE as date, BIL_TITRE as title, 
        BIL_CONTENU as content FROM T_BILLET WHERE BIL_ID = ?';
        $post = $this->executerRequete($sql, array($idPost));
        if($post->rowCount() == 1)
            return $post->fetch();
        else
            throw new Exception("Aucun billet ne correspond à l'identifiant '$idPost'");
    }
}