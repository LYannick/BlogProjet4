<?php

require_once 'model/post.php';
require_once 'model/fAdmin.php';
require_once 'view/view.php';

class ControlerIndex{

    private $post;
    private $admin;

    public function __construct(){                  // Création d'une nouvelle class "Post" & "Admin"
        $this->post = new Post();
        $this->admin = new Admin();
    }

    public function index(){                        // Création d'une vue "Index" et affiche tous les posts et les commentaires signalés
        $reports = $this->admin->getReportCom();    // Appel la fonction qui va afficher les commentaires signalés
        $posts = $this->post->getPosts();           // Appel la fonction qui va afficher les posts
        $view = new View("Index");                  // Création de la vue Index
        $view->generated(array(                     // Génère les posts et les commentaires signalés
            'posts' => $posts,  
            'reports' => $reports
        ));
    }

    public function add($title, $content){          // Permet d'ajouter un post
        $this->admin->addPost($title, $content);    // Appel de la fonction qui va ajouter un post
        $this->index();                             // Permet de revenir à l'index après avoir ajouté un post
    }

    public function delete($delete_id){         // Permet de supprimer un post  
        $this->admin->deletePost($delete_id);   // Appel de la fonction qui va supprimer un post
        $this->index();                         // Permet de revenir à l'index après avoir supprimé un post
    }

    public function deleteC($delete_com){       // Permet de supprimer un commentaire signalé
        $this->admin->deleteCom($delete_com);   // Appel de la fonction qui va supprimer un commentaire signalé
    }

    public function approveC($approve_com){     // Permet d'approuver un commentaire signalé
        $this->admin->approveCom($approve_com); // Appel de la fonction qui va approuver un commentaire signalé
    }
}