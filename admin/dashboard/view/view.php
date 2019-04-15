<?php

class View{

    private $file;
    private $title;

    public function __construct($action){

        $this->file = "view/view" . $action . ".php";
    }

    public function generated($data){

        $content = $this->generatedFile($this->file, $data);
        $view = $this->generatedFile("view/template.php",
            array('title' => $this->title, 'content' => $content));

        echo $view;
    }

    private function generatedFile($file, $data){
        
        if(file_exists($file)){
            extract($data);
            ob_start();
            require $file;
            return ob_get_clean();
        }
        else{
            throw new Exception("Fichier '$file' introuvable");
        }
    }
}