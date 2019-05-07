<?php $this->title = 'Administration'; ?>

<head>
  <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=agywk2mah7awl6s8vypttkkgp2xc4ucqg246fwcg207z8emv"></script>
  <script src="tinymce/tinymce.min.js"></script>
  <script>tinymce.init({ selector: '#mytextarea' });</script>
</head>

<div class="container contentPage">
  <header>
    <a href="http://projet4.alwaysdata.net"><button type="button" class="btn btn-primary">Retour</button></a>
    <h1 class="titleAdmin">Administration</h1>
    <div id="btnAddPost"><button id="btnAdd" type="button" class="btn btn-primary">Ajouter un article</button>
    <button id="btnHide" type="button" class="btn btn-primary">Masquer l'éditeur</button></div>
  </header>
  <div id ="formAdd">
    <form method="POST" action="index.php?action=addpost">
      <input type="text" name="titre" placeholder="Titre" required/>
      <textarea id="mytextarea" name="article" placeholder="Article" required></textarea>
      <input id="post" type="submit" name="valider" class="btn btn-primary" value="Poster l'article"/>
    </form>
  </div>
  <hr/>
  <table class="table table-striped table-dark" id="tableArticle">
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
          <td><?= substr($post['contenu'],0,20) ?>...</td>
          <td><?= $post['date'] ?></td>
          <td><a href="<?= "index.php?action=edit&id=" . $post['id'] ?>"><button type="button" class="btn btn-primary">Modifier</button></a>
              <a href="index.php?action=delete&id=<?= $post['id'] ?>"><button type="button" class="btn btn-danger" onclick="return(confirm('Voulez-vous vraiment supprimer cet article ?'));">Supprimer</button></a></td>
        </tr>
            
      <?php } 
        $posts->closeCursor(); 
      ?>

    </tbody>
  </table>
  <hr/>
  <section>
    <h1 class="titleAdmin">Commentaires signalés</h1>
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
        <td><?= $report['content'] ?></td>
        <td><?= $report['date'] ?></td>
        <td><a href="index.php?action=approval&id=<?= $report['id'] ?>"><button type="button" class="btn btn-primary" onclick="return(confirm('Approuver ce commentaire ?'));">Approuver</button></a>
            <a href="index.php?action=deletecom&id=<?= $report['id'] ?>"><button type="button" class="btn btn-danger" onclick="return(confirm('Voulez-vous vraiment supprimer ce commentaire ?'));">Supprimer</button></a></td>
      </tr>

      <?php endforeach; ?>

      </tbody>
    </table>
  </section>
</div>


   

