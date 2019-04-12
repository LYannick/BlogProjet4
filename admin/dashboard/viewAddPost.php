<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php $title = 'Ajouter un article'; ?>
        <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=agywk2mah7awl6s8vypttkkgp2xc4ucqg246fwcg207z8emv"></script>
        <script src="tinymce/tinymce.min.js"></script>
        <script>tinymce.init({ selector: '#mytextarea' });</script>
      </head>
      
      <?php ob_start(); ?>
          
          <form method="post" action="addPost.php">
              <input type="text" name="titre" required/>
              <textarea id="mytextarea" name="article" required>Hello, World!</textarea>
              <input type="submit" name="valider" value="Poster l'article"/>
          </form>
      
      <?php $content = ob_get_clean(); ?>
      <?php require 'template.php'; ?>
</html>