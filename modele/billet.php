<?php

require_once 'modele/modele.php';

class Billet extends Modele{

  public function getBillets(){      // Renvoie la liste des billets du site
    $sql = 'SELECT BIL_ID AS id, DATE_FORMAT(BIL_DATE, "%d/%m/%Y") AS date, BIL_TITRE AS titre, BIL_CONTENU AS contenu FROM T_BILLET ORDER BY BIL_ID';
    $billets = $this->executerRequete($sql);
    return $billets;
  }

  
  public function getBillet($idBillet){     // Renvoie les informations sur un billet
    $sql = 'SELECT BIL_ID AS id, DATE_FORMAT(BIL_DATE, "%d/%m/%Y") AS date, BIL_TITRE AS titre, BIL_CONTENU AS contenu FROM T_BILLET WHERE BIL_ID=?';
    $billet = $this->executerRequete($sql, array($idBillet));
    if ($billet->rowCount() == 1)
      return $billet->fetch();    // Accès à la première ligne de résultat
    else
      throw new Exception("Aucun billet ne correspond à l'identifiant '$idBillet'");
    }
}