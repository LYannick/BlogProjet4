<?php

require_once 'model/post.php';
require_once 'model/fAdmin.php';
require_once 'view/view.php';

class ControlerIndex{

    private $post;
    private $admin;

    public function __construct(){

        $this->post = new Post();
        $this->admin = new Admin();
    }

    public function index(){
        
        $reports = $this->admin->getReportCom();
        $posts = $this->post->getPosts();
        $view = new View("Index");
        $view->generated(array(
            'posts' => $posts,
            'reports' => $reports
        ));
    }

    public function add($title, $content){

        $this->admin->addPost($title, $content);
        $this->index();
    }

    public function delete($delete_id){

        $this->admin->deletePost($delete_id);
        $this->index();
    }

}