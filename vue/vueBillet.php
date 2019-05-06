<?php $this->titre = "Jean-Forteroche - " . $billet['titre']; ?>

<div class="container" id="contentBillet">
    <a href="http://projet4.alwaysdata.net"><button type="button" class="btn btn-primary">Retour</button></a>
<article>
    <header>
        <h1 id="titlePost"><?= $billet['titre'] ?></h1>
    </header>
    <?= $billet['date'] ?>
    <hr/>
    <p><?= $billet['contenu'] ?></p>
</article>
<hr />
<h2>Laissez un commentaire :</h2><br/>
<form method="post" action="index.php?action=commenter">
    <p><input id="formAuthor" name="auteur" type="text" placeholder="Votre pseudo" required /></p>
    <p><textarea id="formCom" name="contenu" rows="4" placeholder="Votre commentaire" required></textarea></p>
    <p><input type="hidden" name="id" value="<?= $billet['id'] ?>" /></p>
    <p><input type="submit" value="Commenter" class="btn btn-primary"/></p>
</form>
<hr />
<header>
    <h2>Commentaires :</h2><br/>
</header>

<?php foreach ($commentaires as $commentaire): ?>
    <div id="cAround">
        <p id="cAuthor"><?= $commentaire['auteur'] ?> <span id="cDate">le <?=$commentaire['date']?></span></p>
        <p id="cContent"><?= $commentaire['contenu'] ?></p>
        <a href="index.php?action=report&id=<?= $commentaire['id'] ?>"><button id="btnReport" type="button" class="btn btn-danger">Signaler</button></a>
    </div>
<?php endforeach; ?>
<div>
