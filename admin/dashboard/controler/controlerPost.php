<?php

require_once 'model/post.php';
require_once 'view/view.php';

class ControlerPost{

    private $post;

    public function __construct(){                  // Création d'une nouvelle class "Post"
        $this->post = new Post();           
    }

    public function post($idPost){                  // Création d'une vue "ReadPost" et affiche les posts
        $post = $this->post->getPost($idPost);      // Appel de la fonction qui va afficher les posts
        $view = new View('ReadPost');               // Création de la vue ReadPost
        $view->generated(array('post' => $post));   // Génère les posts 
    }
}