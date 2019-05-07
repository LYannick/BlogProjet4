<?php

class View{

    private $file;
    private $title;

    public function __construct($action){
        $this->file = "view/view" . $action . ".php";               // Création d'un chemin pour les view
    }

    public function generated($data){
         $content = $this->generatedFile($this->file, $data);       // Génère et affiche la vue
        $view = $this->generatedFile('view/template.php',           // Génère le template commun
            array('title' => $this->title, 'content' => $content));
        echo $view;                                                 // Renvoi la view au navigateur
    }

    private function generatedFile($file, $data){       // Permet de générer une view et de renvoyer le résultat
        if (file_exists($file)){
            extract($data);             // Rend les élements du tableau $data accessibles dans la view
            ob_start();                 // Démarrage de la temporisation de sortie
            require $file;              // Inclut le fichier view - le résultat est placé dans le tampon de sortie
            return ob_get_clean();      // Arrêt de la temporisation et renvoi du tampon de sortie
        
        }
        else{
            throw new Exception("Fichier '$file' introuvable");
        }
    }
}
