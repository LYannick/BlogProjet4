<?php

require_once 'modele/billet.php';
require_once 'vue/vue.php';

class ControleurAccueil{
    
    private $billet;                    

    public function __construct(){                     // Création d'une nouvelle class "Billet"
        $this->billet = new Billet();
    }

    public function accueil(){                         // Création d'une vue "Accueil" et affiche tous les billets
        $billets = $this->billet->getBillets();        // Appel la fonction qui va afficher les billets
        $vue = new Vue("Accueil");                     // Création de la vue Accueil
        $vue->generer(array('billets' => $billets));   // Génère les Billets
    }
}