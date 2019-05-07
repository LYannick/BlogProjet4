<?php

require_once 'modele/billet.php';
require_once 'modele/commentaire.php';
require_once 'vue/vue.php';

class ControleurBillet{
    
    private $billet;                                
    private $commentaire;
    
    public function __construct(){                  // Création d'une nouvelle class "Billet" & "Commentaire"
        $this->billet = new Billet();
        $this->commentaire = new Commentaire();
    }
    
    public function billet($idBillet){                                              // Création d'une vue "Billet" et affiche les Billets et Commentaires
        $billet = $this->billet->getBillet($idBillet);                              // Appel la fonction qui va afficher les billets
        $commentaires = $this->commentaire->getCommentaires($idBillet);             // Appel la fonction qui va afficher les commentaires
        $vue = new Vue("Billet");                                                   // Création de la vue Billet
        $vue->generer(array('billet' => $billet, 'commentaires' => $commentaires)); // Génère les Billets et Commentaires
    }
    
    public function commenter($auteur, $contenu, $idBillet){                    // Ajoute un commentaire à un billet
        $this->commentaire->ajouterCommentaire($auteur, $contenu, $idBillet);   // Appel la fonction qui va ajouter un commentaire
        $this->billet($idBillet);                                               // Actualise l'affichage du billet
    }

    public function report($idReport){                  // Signal un commentaire
        $this->commentaire->reportCom($idReport);       // Appel de la fonction qui va signaler un commentaire
    }
}