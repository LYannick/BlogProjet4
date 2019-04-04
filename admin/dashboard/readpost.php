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

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Accueil</title>
    </head>
    <body>

        <h1><?= $titre ?></h1>
        <p><?= $contenu ?></p>
        
    </body>
    </html>