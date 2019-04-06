<?php

    $bdd = new PDO();


    if(isset($_POST['titre'], $_POST['article'])){
        if(!empty($_POST['titre']) AND !empty($_POST['article'])){
            $article_titre = htmlspecialchars($_POST['titre']);
            $article_contenu = htmlspecialchars($_POST['article']);
    
            
            $ins = $bdd->prepare('INSERT INTO T_BILLET (BIL_TITRE, BIL_CONTENU, BIL_DATE)
                                  VALUES (?, ?, NOW())');
            $ins->execute(array($article_titre, $article_contenu));
            header('Location: http://projet4.alwaysdata.net/admin/dashboard/index.php');
        
        } else {
            $message = 'Veuillez remplir tous les champs';
        }
    }