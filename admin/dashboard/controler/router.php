<?php 

require_once 'controler/controlerIndex.php';
require_once 'controler/controlerPost.php';
require_once 'controler/controlerEdit.php';
require_once 'view/view.php';

class Router{
    
    private $ctrlIndex;
    private $ctrlPost;
    private $ctrlEdit;

    public function __construct(){                  // Création d'une nouvelle class "ControlerIndex" , "ControlerPost" & "ControlerEdit"
        $this->ctrlIndex = new ControlerIndex();
        $this->ctrlPost = new ControlerPost();
        $this->ctrlEdit = new ControlerEdit();
    }

    public function routReq(){                   // Fonction qui va permettre d'appeler la bonne action demandé par l'utilisateur
        try{
            if (isset($_GET['action'])){                        
                if($_GET['action'] == 'post'){              // Action appelée quand l'admin veut LIRE un post
                    if(isset($_GET['id'])){                 // On vérifie que la variable éxiste
                        $idPost = intval($_GET['id']);      // On stock l'id du billet dans une variable --- intval : retourne une valeur numérique entière
                        if($idPost != 0){                   // SI le n° du post est différent ou égale à 0 ALORS :
                            $this->ctrlPost->post($idPost); // On appel la fonction qui va afficher les posts
                        }
                        else
                            throw new Exception("Identifiant de billet invalide");  // Message d'erreur si l'id du billet n'est pas valide
                    }
                    else    
                        throw new Exception("Identifiant de billet non défini");    // Message d'erreur si l'id du billet n'est pas définis
                } 
                else if ($_GET['action'] == 'addpost'){                             // Action appelée quand l'admin AJOUTE un post
                    if(isset($_POST['titre'], $_POST['article'])){                  // On vérifie que les variables éxistent
                        if(!empty($_POST['titre']) AND !empty($_POST['article'])){  // On vérifie que les champs ne sont pas vide
                            $title = $this->getParametre($_POST, 'titre');          // Recherche dans un tableau
                            $content = $this->getParametre($_POST, 'article');      // les différentes données
                            $this->ctrlIndex->add($title, $content);                // Appel de la fonction qui va permettre d'ajouter un post
                        }
                    }
                }
                else if($_GET['action'] == 'editpost'){                                         // Action appelée quand l'admin EDIT un post
                    if(isset($_POST['titre'], $_POST['article'])){
                        if(!empty($_POST['titre']) AND !empty($_POST['article'])){
                            $edit_title = $_POST['titre'];                                      //
                            $edit_content = $_POST['article'];                                  // On stock les données dans des variables
                            $edit_id = intval($_GET['id']);                                     //
                            $this->ctrlEdit->editPost($edit_title, $edit_content, $edit_id);    // Appel de la fonction qui va permettre d'éditer un post
                            $this->ctrlIndex->index();                                          // Permet de revenir à l'index une fois l'action éxécuté
                        }
                    }
                }   
                else if ($_GET['action'] == 'edit'){                    // Action appelée quand pour AFFICHER LES VALEURS du post à éditer
                   if(isset($_GET['id']) AND !empty($_GET['id'])){
                       $edit_id = htmlspecialchars($_GET['id']);        // Stock et protége l'id en convertissant les caractères spéciaux en entité HTML
                       $this->ctrlEdit->edit($edit_id);                 // Appel de la fonction qui va permettre d'afficher la vue EditPost
                    }else
                        throw new Exception("Identifiant de billet invalide"); // Message d'erreur si l'id d'un post est invalide
                
                } 
                else if ($_GET['action'] == 'delete'){                  // Action appelée quand l'admin SUPPRIME UN POST
                    if(isset($_GET['id']) AND !empty($_GET['id'])){
                        $delete_id = htmlspecialchars($_GET['id']);     // Stock et protége l'id en convertissant les caractères spéciaux en entité HTML
                        $this->ctrlIndex->delete($delete_id);           // Appel de la fonction qui va supprimer un post
                    }
                }   
                else if ($_GET['action'] == 'deletecom'){               // Action appelée quand l'admin SUPPRIME UN COMMENTAIRE 
                    if(isset($_GET['id']) AND !empty($_GET['id'])){
                        $delete_com = htmlspecialchars($_GET['id']);    // Stock et protége l'id en convertissant les caractères spéciaux en entité HTML
                        $this->ctrlIndex->deleteC($delete_com);         // Appel la fonction qui va supprimer un commentaire signalé
                        $this->ctrlIndex->index();                      // Permet de revenir à l'index une fois l'action éxécuté
                    }
                }
                else if ($_GET['action'] == 'approval'){                // Action appelée quand l'admin APPROUVE UN COMMENTAIRE 
                    if(isset($_GET['id']) AND !empty($_GET['id'])){
                        $approve_com = htmlspecialchars($_GET['id']);   // Stock et protége l'id en convertissant les caractères spéciaux en entité HTML
                        $this->ctrlIndex->approveC($approve_com);       // Appel la fonction qui va approuver un commentaire signalé
                        $this->ctrlIndex->index();                      // Permet de revenir à l'index une fois l'action éxécuté
                    }
                }

                else    
                    throw new Exception("Action non valide");  // Message d'erreur quand l'action n'est pas valide
            }
        
            else{
                $this->ctrlIndex->index();  // Si aucune action n'est appelée, celle-ci sera appelée par défaut (Affichage de l'index)
            }
        } 
        catch (Exception $e){
           $this->error($e->getMessage()); // Attrape les erreurs et affiche les messages correspondant
        }
    }

    private function error($msgError){                      // Affiche une erreur
        $view = new View("Error");                          // Créer la vue Error 
        $view->generated(array('msgError' => $msgError));   // Génère le message d'erreur
    }

    private function getParametre($tableau, $nom){      // Recherche un paramètre dans un tableau
        if (isset($tableau[$nom])){                     // isset : Vérifie que les variable éxiste
            return $tableau[$nom];
        }
        else
            throw new Exception("Paramètre '$nom' absent");
    }
 }


