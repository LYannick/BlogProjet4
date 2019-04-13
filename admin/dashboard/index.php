<?php 

require 'model.php';

try{
    $billets = getBillets();
    require 'viewIndex.php';
}
 catch (Exception $e){
     $msgErreur = $e->getMessage();
     require 'viewError.php';
 }





