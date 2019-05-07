<?php

class Vue{
    
    private $fichier;
    private $titre;

    public function __construct($action){
        $this->fichier = "vue/vue" . $action . ".php";   // Création d'un chemin pour les vue
    }
   
    public function generer($donnees){                              
        $contenu = $this->genererFichier($this->fichier, $donnees);     // Génère et affiche la vue
        $vue = $this->genererFichier('vue/gabarit.php',                 // Génère le gabarit commun
                array('titre' => $this->titre, 'contenu' => $contenu));
        echo $vue;                                                      // Renvoi la vue au navigateur
    }
  
    private function genererFichier($fichier, $donnees){            // Permet de générer une vue et de renvoyer le résultat
        if (file_exists($fichier)){ 
            extract($donnees);          // Rend les élements du tableau $donnees accessibles dans la vue
            ob_start();                 // Démarrage de la temporisation de sortie
            require $fichier;           // Inclut le fichier vue - le résultat est placé dans le tampon de sortie
            return ob_get_clean();      // Arrêt de la temporisation et renvoi du tampon de sortie
        }
        else {
            throw new Exception("Fichier '$fichier' introuvable");
        }
    }
}