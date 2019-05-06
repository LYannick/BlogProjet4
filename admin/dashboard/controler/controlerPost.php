<?php

require_once 'model/post.php';
require_once 'view/view.php';

class ControlerPost{

    private $post;

    public function __construct(){
        
        $this->post = new Post();
    }

    public function post($idPost){

        $post = $this->post->getPost($idPost);
        $view = new View('ReadPost');
        $view->generated(array('post' => $post));
    }

    public function report($report_id){

        $this->post->reportCom($report_id);
    }
}