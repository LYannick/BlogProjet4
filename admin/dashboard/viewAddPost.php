<!doctype html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="style.css" />
    <title>Ajouter un article</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=agywk2mah7awl6s8vypttkkgp2xc4ucqg246fwcg207z8emv"></script>
    <script>
  tinymce.init({
    selector: '#mytextarea'
  });
  </script>
  </head>
  <body>
    <form method="post" action="addPost.php">
        <input type="text" name="titre" required/>
        <textarea id="mytextarea" name="article" required>Hello, World!</textarea>
        <input type="submit" name="valider" value="Poster l'article"/>
    </form>
  </body>