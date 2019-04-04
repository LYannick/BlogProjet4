<!doctype html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="style.css" />
    <title>Administration</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=agywk2mah7awl6s8vypttkkgp2xc4ucqg246fwcg207z8emv"></script>
    <script>
  tinymce.init({
    selector: '#mytextarea'
  });
  </script>
  </head>
  <body>
    <div id="global">
      <header>
        <a href="http://projet4.alwaysdata.net">Retour</a>
        <h1 id="titreBlog">Administration</h1>
      </header>
      <div id="contenu">
      <table class="table table-striped table-dark">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Titre</th>
            <th scope="col">Contenu</th>
            <th scope="col">Date</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
        <?php
      $bdd = new PDO();
      $billets = $bdd->query('SELECT BIL_ID as id, BIL_DATE as date, 
      BIL_TITRE as titre, BIL_CONTENU as contenu FROM T_BILLET ORDER BY BIL_ID DESC');
      
      
      while ($billet = $billets->fetch()){ ?>
         
              <tr>
                <th scope="row"><?= $billet['id'] ?></th>
                <td><a href="readpost.php?id=<?= $billet['id'] ?>"><?= $billet['titre'] ?></td>
                <td><?= $billet['contenu'] ?></td>
                <td><?= $billet['date'] ?></td>
                <td><a href="addpost.php?edit=<?= $billet['id'] ?>">Modifier</a> | 
      <a href="supprimer.php?id=<?= $billet['id'] ?>">Supprimer</a></td>
            </tr>
            
      <?php } ?>
      
      </tbody>
      </table>
      </div>
      </div>

      
  <form method="post" action="addpost.php">
    <input type="text" name="titre" required/>
    <textarea id="mytextarea" name="article" required>Hello, World!</textarea>
    <input type="submit" name="valider" value="Poster l'article"/>
  </form>

      <footer id="piedBlog">
      </footer>
    </div> 
  </body>
</html>
