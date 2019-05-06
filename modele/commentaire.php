<?php
require_once 'modele/modele.php';

class Commentaire extends Modele {
// Renvoie la liste des commentaires associés à un billet
    public function getCommentaires($idBillet) {
        $sql = 'SELECT COM_ID as id, DATE_FORMAT(COM_DATE, "%d/%m/%Y a %Hh%imin%ss") as date, COM_AUTEUR as auteur, COM_CONTENU as contenu FROM T_COMMENTAIRE WHERE BIL_ID=?';
        $commentaires = $this->executerRequete($sql, array($idBillet));
        return $commentaires;
    }
    
    // Ajoute un commentaire dans la base
    public function ajouterCommentaire($auteur, $contenu, $idBillet) {
        $sql = 'INSERT INTO T_COMMENTAIRE(COM_DATE, COM_AUTEUR, COM_CONTENU, BIL_ID) VALUES(?, ?, ?, ?)';
        $date = date('Y-m-d H:i:s');  // Récupère la date courante
        $this->executerRequete($sql, array($date, $auteur, $contenu, $idBillet));
    }

    public function reportCom($idReport){

        $sql = 'UPDATE T_COMMENTAIRE SET COM_REPORTED = 1 WHERE COM_ID = ?';
        $this->executerRequete($sql, array($idReport));
    }
}
