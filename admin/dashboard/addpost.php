<?php

require 'model.php';

try{
    if(isset($_POST['titre'], $_POST['article'])){
        if(!empty($_POST['titre']) AND !empty($_POST['article'])){
            $req = addPost($post_title, $post_content);
            $post_title = htmlspecialchars($_POST['titre']);
            $post_content = htmlspecialchars($_POST['article']);
            require 'viewAddPost.php';
            header('Location: http://projet4.alwaysdata.net/admin/dashboard/index.php');
        } 
        else 
            throw new Exception("Veuillez remplir tous les champs");
    } 
    else 
        throw new Exception("Champs non disponible");
   } 
    catch (Exception $e){
        $msgError = $e->getMessage();
        require 'viewError.php';
}