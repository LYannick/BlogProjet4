<?php 

require 'model/model.php';

function index(){
    $billets = getBillets();
    require 'view/viewIndex.php';
}

function post($id){
    $post = getPosts($idPost);
    require 'view/viewReadPost.php';
}

function edit(){
    $edit_post = editPost();
    require 'view/viewEditPost.php';
}

function add(){
    $req = addPost($post_title, $post_content);
    require 'view/viewAddPost.php';
}

function update(){
    $update = updatePost();
    require 'view/viewEditPost.php';
}

function delete(){
    $delete = deletePost();
}

function error($msgError){
    require 'view/viewError.php';
}