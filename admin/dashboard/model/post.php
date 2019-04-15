<?php 

require_once 'model.php';

class Post extends Model{

    function getBillets(){
    
        $bdd = getBdd();
        $billets = $bdd->query('SELECT BIL_ID as id, BIL_DATE as date, BIL_TITRE as titre, 
        BIL_CONTENU as contenu FROM T_BILLET ORDER BY BIL_ID DESC');
        return $billets;
    }

    function getPost($idPost){

        $bdd = getBdd();
        $post = $bdd->prepare('SELECT BIL_ID as id, BIL_DATE as date, BIL_TITRE as title, 
        BIL_CONTENU as content FROM T_BILLET WHERE BIL_ID = ?');
        $post->execute(array($idPost));
        if($post->rowCount() == 1)
            return $post->fetch();
        else
            throw new Exception("Aucun billet ne correspond à l'identifiant '$idPost'");
    }
}