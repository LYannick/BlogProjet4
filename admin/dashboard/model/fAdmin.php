<?php 

require_once 'model/model.php';

class Admin extends Model{

    public function addPost($title, $content){

        $sql = 'INSERT INTO T_BILLET (BIL_TITRE, BIL_CONTENU, BIL_DATE) VALUES (?, ?, NOW())';
        $this->executerRequete($sql, array($title, $content));
    }

    public function editPosts($edit_id){

        $sql = 'SELECT * FROM T_BILLET WHERE BIL_ID = ?';
        $edit_article = $this->executerRequete($sql, array($edit_id));
        if($edit_article->rowCount() == 1){
            return $edit_article->fetch();
        }
    }

    public function updatePost($edit_title, $edit_content, $edit_id){

        $sql = 'UPDATE T_BILLET SET BIL_TITRE = ?, BIL_CONTENU = ?, BIL_DATE_EDITION = NOW() WHERE BIL_ID = ?';
        $this->executerRequete($sql, array($edit_title, $edit_content, $edit_id));
    }

    public function deletePost($delete_id){

        $sql = 'DELETE FROM T_BILLET WHERE BIL_ID = ?';
        $this->executerRequete($sql, array($delete_id));
    }
}