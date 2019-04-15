<?php 

require ('controler/controler.php');

try {
    if (isset($_GET['action'])){
        if ($_GET['action'] == 'billet'){
            if (isset($_GET['id'])){
                $idBillet = intval ($_GET['id']);
                if ($idBillet != 0)
                    getPost($idPost);
                else
                    throw new Exception("Identifiant de billet invalide");
            }
            else    
                throw new Exception("Identifiant de billet non défini");
        }
        else    
            throw new Exception("Action non valide");
    }
    else    
        index();
}

catch (Exception $e){
    error($e->getMessage());
}

try{

}



