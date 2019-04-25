<?php 

require_once 'controler/controlerIndex.php';
require_once 'controler/controlerPost.php';
require_once 'controler/controlerEdit.php';
require_once 'view/view.php';

class Router {
    private $ctrlIndex;
    private $ctrlPost;
    private $ctrlEdit;

    public function __construct(){
        $this->ctrlIndex = new ControlerIndex();
        $this->ctrlPost = new ControlerPost();
        $this->ctrlEdit = new ControlerEdit();
    }

    public function routReq(){
        try{
            if (isset($_GET['action'])){
                if($_GET['action'] == 'post'){
                    if(isset($_GET['id'])){
                        $idPost = intval($_GET['id']);
                        if($idPost != 0){
                            $this->ctrlPost->post($idPost);
                        }
                        else
                            throw new Exception("Identifiant de billet invalide");
                    }
                    else    
                        throw new Exception("Identifiant de billet non défini");
                } 
                else if ($_GET['action'] == 'addpost'){
                    $title = $this->getParametre($_POST, 'titre');
                    $content = $this->getParametre($_POST, 'article');
                    $this->ctrlIndex->add($title, $content);
                }
                else if($_GET['action'] == 'editpost'){
                    if(isset($_POST['titre'], $_POST['article'])){
                        if(!empty($_POST['titre']) AND !empty($_POST['article'])){
                            $edit_title = htmlspecialchars($_POST['titre']);
                            $edit_content = htmlspecialchars($_POST['article']);
                            $edit_id = intval($_POST['id']);
                            $this->ctrlEdit->editPost($edit_title, $edit_content, $edit_id);
                        }
                    }
                }
                else if ($_GET['action'] == 'edit'){
                   if(isset($_GET['id']) AND !empty($_GET['id'])){
                       $edit_id = htmlspecialchars($_GET['id']);
                       $this->ctrlEdit->edit($edit_id);
                    }else
                        throw new Exception("Identifiant de billet invalide");
                
                } else if ($_GET['action'] == 'delete'){
                    if(isset($_GET['id']) AND !empty($_GET['id'])){
                        $delete_id = htmlspecialchars($_GET['id']);
                        $this->ctrlIndex->delete($delete_id);
                    }
                }
                else    
                    throw new Exception("Action non valide");
            }
            else{
                $this->ctrlIndex->index();
            }
        }
        catch (Exception $e){
           $this->error($e->getMessage());
        }
    }

    private function error($msgError){
        $view = new View("Error");
        $view->generated(array('msgError' => $msgError));
    }

    private function getParametre($tableau, $nom) {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        }
        else
            throw new Exception("Paramètre '$nom' absent");
    }
 }