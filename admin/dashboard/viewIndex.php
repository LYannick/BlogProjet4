<!doctype html>
<html lang="fr">
  <head>
    <?php $title = 'Administration'; ?>
  </head>
  
  <?php ob_start(); ?>
    
    <div id="global">
      <header>
        <a href="http://projet4.alwaysdata.net">Retour</a>
        <h1 id="titreBlog">Administration</h1>
        <a href="viewAddPost.php">Ajouter un article</a>
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
        
        <?php  while ($billet = $billets->fetch()){ ?>
         
              <tr>
                <th scope="row"><?= $billet['id'] ?></th>
                <td><a href="viewReadPost.php?id=<?= $billet['id'] ?>"><?= $billet['titre'] ?></td>
                <td><?= $billet['contenu'] ?></td>
                <td><?= $billet['date'] ?></td>
                <td><a href="viewEditPost.php?edit=<?= $billet['id'] ?>">Modifier</a> | 
                    <a href="delete.php?id=<?= $billet['id'] ?>">Supprimer</a></td>
            </tr>
            
        <?php } ?>
      
      </tbody>
      </table>
      </div>
      </div>
      
      <?php $content = ob_get_clean(); ?>
      <?php require 'template.php'; ?>

      <footer id="piedBlog">
      </footer>
</html>