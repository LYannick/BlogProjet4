<?php

$bdd = new PDO();

    if(isset($_GET['id']) AND !empty($_GET['id'])) {
        $get_id = htmlspecialchars($_GET['id']);

        $article = $bdd->prepare('SELECT * FROM T_BILLET WHERE BIL_ID = ?');
        $article->execute(array($get_id));

        if($article->rowCount() == 1){
            $article = $article->fetch();
            $titre = $article['BIL_TITRE'];
            $contenu = $article['BIL_CONTENU'];

            
        } else {
            die("Cet article n'éxiste pas");
        }

    } else {
        die('Erreur');
    }

require 'viewReadPost.php';