<?php 

require_once 'model/model.php';

class Admin extends Model{

    public function addPost($title, $content){      // Permet d'ajouter un post
        $sql = 'INSERT INTO T_BILLET (BIL_TITRE, BIL_CONTENU, BIL_DATE) VALUES (?, ?, NOW())';
        $this->executerRequete($sql, array($title, $content));
    }

    public function editPosts($edit_id){            // Permet d'afficher les posts à éditer
        $sql = 'SELECT * FROM T_BILLET WHERE BIL_ID = ?';
        $edit_article = $this->executerRequete($sql, array($edit_id));
        if($edit_article->rowCount() == 1){
            return $edit_article->fetch();
        }
    }

    public function updatePost($edit_title, $edit_content, $edit_id){       // Permet de mettre à jour les posts
        $sql = 'UPDATE T_BILLET SET BIL_TITRE = ?, BIL_CONTENU = ?, BIL_DATE_EDITION = NOW() WHERE BIL_ID = ?';
        $this->executerRequete($sql, array($edit_title, $edit_content, $edit_id));
    }

    public function deletePost($delete_id){             // Supprime un post
        $sql = 'DELETE FROM T_BILLET WHERE BIL_ID = ?';
        $this->executerRequete($sql, array($delete_id));
    }

    public function getReportCom(){                 // Affiche les commentaires signalés
        $sql = 'SELECT COM_ID AS id, DATE_FORMAT(COM_DATE, "%d/%m/%Y à %Hh%i") AS date, COM_AUTEUR AS author, COM_CONTENU AS content FROM T_COMMENTAIRE WHERE COM_REPORTED = 1';
        $reports = $this->executerRequete($sql);
        return $reports;
    }

    public function approveCom($approve_com){       // Permet d'approuver les commentaires signalés
        $sql = 'UPDATE T_COMMENTAIRE SET COM_REPORTED = 0 WHERE COM_ID = ?';
        $this->executerRequete($sql, array($approve_com));
    }
    
    public function deleteCom($delete_com){         // Supprime les commentaires signalés
        $sql = 'DELETE FROM T_COMMENTAIRE WHERE COM_ID = ?';
        $this->executerRequete($sql, array($delete_com));
    }
}