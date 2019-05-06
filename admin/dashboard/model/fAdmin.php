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

    public function getReportCom(){
        
        $sql = 'SELECT COM_ID AS id, COM_DATE AS date, COM_AUTEUR AS author, COM_CONTENU AS content FROM T_COMMENTAIRE WHERE COM_REPORTED = 1';
        $reports = $this->executerRequete($sql);
        return $reports;
    }

    public function approveCom($approve_com){

        $sql = 'UPDATE T_COMMENTAIRE SET COM_REPORTED = 0 WHERE COM_ID = ?';
        $this->executerRequete($sql, array($approve_com));
    }
    
    public function deleteCom($delete_com){

        $sql = 'DELETE FROM T_COMMENTAIRE WHERE COM_ID = ?';
        $this->executerRequete($sql, array($delete_com));
    }
}