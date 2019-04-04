<?php

    $bdd = new PDO();

    $mode_edition = 0;

    if(isset($_GET['edit']) AND !empty($_GET['edit'])){
        $mode_edition = 1;
    
        $edit_id = htmlspecialchars($_GET['edit']);
        
        $edit_article = $bdd->prepare('SELECT * FROM T_BILLET WHERE BIL_ID = ?');
        $edit_article->execute(array($edit_id));
    
        if($edit_article->rowCount() == 1){
    
            $edit_article = $edit_article->fetch();
    
        } else {
            die("Erreur : l'article concerné n'éxsiste pas");
        }
    } 
    

if(isset($_POST['titre'], $_POST['article'])){
    if(!empty($_POST['titre']) AND !empty($_POST['article'])){
        $article_titre = htmlspecialchars($_POST['titre']);
        $article_contenu = htmlspecialchars($_POST['article']);

        if($mode_edition == 0){
        $ins = $bdd->prepare('INSERT INTO T_BILLET (BIL_TITRE, BIL_CONTENU, BIL_DATE)
                              VALUES (?, ?, NOW())');
        $ins->execute(array($article_titre, $article_contenu));
        header('Location: http://projet4.alwaysdata.net/admin/dashboard/index.php');

        } else {
            $update = $bdd->prepare('UPDATE T_BILLET SET BIL_TITRE = ?, BIL_CONTENU = ?, BIL_DATE_EDITION = NOW() WHERE BIL_ID = ?');
            $update->execute(array($article_titre, $article_contenu, $edit_id));
            header('Location: http://projet4.alwaysdata.net/admin/dashboard/index.php');
        }

        $message = 'Votre article à bien été posté';

    } else {
        $message = 'Veuillez remplir tous les champs';
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Redaction - Edition</title>

    <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=agywk2mah7awl6s8vypttkkgp2xc4ucqg246fwcg207z8emv"></script>
    <script>
  tinymce.init({
    selector: '#mytextarea'
  });
  </script>
</head>
<body>
<form method="post" action="">
    <input type="text" name="titre" required <?php if($mode_edition == 1) { ?> value="<?= 
      $edit_article['BIL_TITRE'] ?>"<?php } ?>/>
    <textarea id="mytextarea" name="article" required><?php if($mode_edition == 1) { ?><?= 
      $edit_article['BIL_CONTENU'] ?><?php } ?></textarea>
    <input type="submit" name="valider" value="Poster l'article"/>
  </form>

    <?php if(isset($message)){
        echo $message;
    }
    ?>
    
</body>
</html>

