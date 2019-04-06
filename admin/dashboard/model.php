<?php
    
function getBdd(){

    $bdd = new PDO();
    return $bdd;
}  


function getBillets(){
    
    $bdd = getBdd();
    
    $billets = $bdd->query('SELECT BIL_ID as id, BIL_DATE as date, BIL_TITRE as titre, 
    BIL_CONTENU as contenu FROM T_BILLET ORDER BY BIL_ID DESC');
    
    return $billets;
} 



