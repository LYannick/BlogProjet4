<?php

require_once 'modele/modele.php';

class Commentaire extends Modele{

    public function getCommentaires($idBillet){                             // Renvoie la liste des commentaires associés à un billet
        $sql = 'SELECT COM_ID as id, DATE_FORMAT(COM_DATE, "%d/%m/%Y à %Hh%i") as date, 
        COM_AUTEUR as auteur, COM_CONTENU as contenu FROM T_COMMENTAIRE WHERE BIL_ID=?';
        $commentaires = $this->executerRequete($sql, array($idBillet));
        return $commentaires;
    }
    
    public function ajouterCommentaire($auteur, $contenu, $idBillet){       // Permet d'ajouter un commentaire dans la BDD
        $sql = 'INSERT INTO T_COMMENTAIRE(COM_DATE, COM_AUTEUR, COM_CONTENU, BIL_ID) VALUES(?, ?, ?, ?)';
        $date = date('Y-m-d H:i:s');           
        $this->executerRequete($sql, array($date, $auteur, $contenu, $idBillet));
    }

    public function reportCom($idReport){                                     // Passe la valeur par défaut d'un 
        $sql = 'UPDATE T_COMMENTAIRE SET COM_REPORTED = 1 WHERE COM_ID = ?';  // commentaire signalé à 1
        $this->executerRequete($sql, array($idReport));
    }
}
