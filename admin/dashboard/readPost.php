<?php

require 'model.php';

try{
    if (isset($_GET['id'])){
        $id = intval($_GET['id']);
        if ($id != 0) {
            $post = getPost($id);
            require 'viewReadPost.php';
        } else
            throw new Exception("Identifiant de billet incorrect");
    } else 
        throw new Exception("Aucun identifiant de billet");
} catch (Exception $e){
    $msgError = $e->getMessage();
    require 'viewError.php';
}