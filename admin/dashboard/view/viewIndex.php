<?php $this->title = 'Administration'; ?>
 
 <head>
  <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=agywk2mah7awl6s8vypttkkgp2xc4ucqg246fwcg207z8emv"></script>
    <script src="tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector: '#mytextarea' });</script>
  </head>

  <div id="global" class="container">
      <header>
        <h1 id="titreBlog">Administration</h1>
        <div id="btnAddPost"><button id="btnAdd" type="button" class="btn btn-primary">Ajouter un article</button><button id="btnHide" type="button" class="btn btn-primary">Masquer l'éditeur</button></div>
      </header>
      <div id ="formAdd">
        <form method="post" action="index.php?action=addpost" enctype="multipart/form-data">
          <input type="text" name="titre" required/>
          <textarea id="mytextarea" name="article" required>Hello, World!</textarea>
          <input id="post" type="submit" name="valider" value="Poster l'article"/>
          <input type="file" name="miniature"/>
      </form>
      </div>
      
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
        
        <?php  while ($post = $posts->fetch()){ ?>
         
              <tr>
                <th scope="row"><?= $post['id'] ?></th>
                <td><a href="<?= "index.php?action=post&id=" . $post['id'] ?>"><?= $post['titre'] ?></td>
                <td><?= substr($post['contenu'],0,20) ?></td>
                <td><?= $post['date'] ?></td>
                <td><a href="<?= "index.php?action=edit&id=" . $post['id'] ?>"><button type="button" class="btn btn-primary">Modifier</button></a>
                    <a href="index.php?action=delete&id=<?= $post['id'] ?>"><button type="button" class="btn btn-primary">Supprimer</button></a></td>
            </tr>
            
        <?php } 
        
        $posts->closeCursor(); 
        ?>
      </tbody>
      </table>
      
      

      <table class="table table-hover table-dark">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Auteur</th>
            <th scope="col">Contenu</th>
            <th scope="col">Date</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>

      <?php foreach ($reports as $report): ?>
          
      <tr>
          <th scope="row"><?= $report['id'] ?></th>
          <td><?= $report['author'] ?></td>
          <td><?= substr($report['content'],0,20) ?></td>
          <td><?= $report['date'] ?></td>
          <td><a href="index.php?action=delete&id=<?= $report['id'] ?>"><button type="button" class="btn btn-primary">Supprimer</button></a>
              <a href="index.php?action=delete&id=<?= $report['id'] ?>"><button type="button" class="btn btn-primary">Approuver</button></a></td>
      </tr>
      <?php endforeach; ?>

      </tbody>
      </table>
      </div>

      <footer>
        <a href="http://projet4.alwaysdata.net"><button type="button" class="btn btn-primary">Retour</button></a>
      </footer>
      

   

