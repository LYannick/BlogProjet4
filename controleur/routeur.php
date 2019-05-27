<?php

require_once 'controleur/controleurAccueil.php';
require_once 'controleur/controleurBillet.php';
require_once 'vue/vue.php';

class Routeur{
    
    private $ctrlAccueil;
    private $ctrlBillet;
    
    public function __construct(){                      // Création d'une nouvelle class "ControleurBillet" & "ControleurAccueil"
        $this->ctrlAccueil = new ControleurAccueil();
        $this->ctrlBillet = new ControleurBillet();
    }
    
    public function routerRequete(){      // Fonction qui va permettre d'appeler la bonne action demandé par l'utilisateur
        try {
            if (isset($_GET['action'])){
                if ($_GET['action'] == 'billet'){                 // Action appelée quand l'utilisateur veut LIRE un article
                    $idBillet = intval($_GET['id']);              // On stock l'id du billet dans une variable --- intval : retourne une valeur numérique entière
                    if ($idBillet != 0){                          // SI le n° du billet est différent ou égale à 0 ALORS :
                        $this->ctrlBillet->billet($idBillet);     // On appel la fonction qui va afficher le billet et les commentaires
                    }
                    else
                        throw new Exception("Identifiant de billet non valide");
                }
                else if ($_GET['action'] == 'commenter'){                    // Action appelée quand l'utilisateur AJOUTE un commentaire
                    $auteur = htmlspecialchars($_POST['auteur']);            //
                    $contenu = htmlspecialchars($_POST['contenu']);          //  Stock et protége l'id en convertissant les caractères spéciaux en entité HTML
                    $idBillet = intval($_POST['id']);                        // 
                    $this->ctrlBillet->commenter($auteur, $contenu, $idBillet); // Appel de la fonction qui va permettre de commenter
                }
                else if ($_GET['action'] == 'report'){                          // Action appelée quand l'utilisateur SIGNALE un commentaire
                    if(isset($_GET['com']) AND !empty($_GET['com']) AND isset($_GET['billet']) AND !empty($_GET['billet'])){             // On vérifie que les variables éxistent
                        $idReport = htmlspecialchars($_GET['com']);             // Stock et protége l'id en convertissant les caractères spéciaux en entité HTML
                        $idBillet = htmlspecialchars($_GET['billet']);          //
                        $this->ctrlBillet->report($idReport, $idBillet);        // Appel de la fonction qui va signaler un commentaire
                    }
                }
                else
                    throw new Exception("Action non valide"); // Message d'erreur si l'action appelée n'est pas valide
            }
            else {  
                $this->ctrlAccueil->accueil();  // Si aucune action n'est appelée, celle-ci sera appelée par défaut (Affichage de l'accueil)
            }
        }
        catch (Exception $e){
            $this->erreur($e->getMessage()); // Attrape les erreurs et affiche les messages correspondant
        }
    }
    
    private function erreur($msgErreur){                     // Affiche une erreur
        $vue = new Vue("Erreur");                            // Créer la vue Erreur 
        $vue->generer(array('msgErreur' => $msgErreur));     // Génère le message d'erreur
    }
}