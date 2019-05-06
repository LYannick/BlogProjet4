<?php

require_once 'model/fAdmin.php';
require_once 'view/view.php';

class ControlerEdit{

    private $edit;

    public function __construct(){
        
        $this->edit = new Admin();
    }

    public function edit($edit_id){

        $edit = $this->edit->editPosts($edit_id);
        $view = new View('EditPost');
        $view->generated(array('edit' => $edit));
    }

    public function editPost($edit_title, $edit_content, $edit_id){

        $this->edit->updatePost($edit_title, $edit_content, $edit_id);
    }
}   
