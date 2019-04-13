<?php

require 'model.php';

try{
   if(isset($_GET['id']) AND !empty($_GET['id'])) {
      $delete = deletePost();
      $delete_id = htmlspecialchars($_GET['id']);  
      header('Location: http://projet4.alwaysdata.net/admin/dashboard/index.php');
   } else
      throw new Exception("Impossible de supprimer ce billet");
} catch (Exception $e){
   $msgError = $e->getMessage();
   require 'viewError.php';
}

