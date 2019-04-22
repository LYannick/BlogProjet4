<?php

require_once 'model/fAdmin.php';
require_once 'view/view.php';

class ControlerEdit{

    private $edit;
    private $editPost;

    public function __construct(){
        
        $this->edit = new Admin();
        $this->editPost = new Admin();
    }

    public function edit($edit_id){

        $post = $this->edit->editPosts($edit_id);
        $view = new View('EditPost');
        $view->generated(array('edit' => $edit));
    }

    public function editPost($edit_title, $edit_content, $edit_id){

        $this->editPost->updatePost($edit_title, $edit_content, $edit_id);
        $this->index();
    }

    public function index(){
        
        $posts = $this->post->getPosts();
        $view = new View("Index");
        $view->generated(array('posts' => $posts));
    }
}