<?php

require 'model/model.php';

try{
    if(isset($_GET['edit']) AND !empty($_GET['edit'])){
        
        $edit_id = htmlspecialchars($_GET['edit']);
    } if(isset($_POST['titre'], $_POST['article'])){
            if(!empty($_POST['titre']) AND !empty($_POST['article'])){
          
            $post_title = htmlspecialchars($_POST['titre']);
            $post_content = htmlspecialchars($_POST['article']);
            
            header('Location: http://projet4.alwaysdata.net/admin/dashboard/index.php');
     } else
        throw new Exception("Veuillez remplir tous les champs");
    } else
        throw new Exception("L'article concerné n'éxiste pas");
} catch (Exception $e){
        $msgError = $e->getMessage();
        require 'view/viewError.php';
}



