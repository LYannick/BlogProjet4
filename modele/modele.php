<?php

abstract class Modele{
    
    private $bdd;
    
    protected function executerRequete($sql, $params = null){
        if ($params == null){
            $resultat = $this->getBdd()->query($sql); // exécution directe
        }
        else{
            $resultat = $this->getBdd()->prepare($sql);  // requête préparée
            $resultat->execute($params);
        }
        return $resultat;
    }
    
    private function getBdd(){              // Création de la connexion
        if ($this->bdd == null){
            $this->bdd = new PDO(,
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return $this->bdd;
    }
} 