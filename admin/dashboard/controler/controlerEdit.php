<?php

require_once 'model/fAdmin.php';
require_once 'view/view.php';

class ControlerEdit{

    private $edit;

    public function __construct(){          // Création d'une nouvelle class "Admin"
        $this->edit = new Admin();
    }

    public function edit($edit_id){                     // Création d'une vue "EditPost" et affiche le post à éditer
        $edit = $this->edit->editPosts($edit_id);       // Appel la fonction qui va éditer les posts
        $view = new View('EditPost');                   // Création de la vue EditPost
        $view->generated(array('edit' => $edit));       // Génère les posts à éditer
    }

    public function editPost($edit_title, $edit_content, $edit_id){     // Edit le post sélectionné
        $this->edit->updatePost($edit_title, $edit_content, $edit_id);  // Appel de la fonction qui va éditer un post
    }
}   
