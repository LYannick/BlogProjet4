
<div class="container contentPage">
    <head>
        <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=agywk2mah7awl6s8vypttkkgp2xc4ucqg246fwcg207z8emv"></script>
        <script>tinymce.init({ selector: '#mytextarea' });</script>
    </head>

    <a href="http://projet4.alwaysdata.net/admin/dashboard/"><button type="button" class="btn btn-primary" id="aEditPost">Retour</button></a>

    <form method="post" action="index.php?action=editpost&id=<?= $_GET['id'];?>">
        <input type="hidden" name="id" id="id" value="<?= $_GET['id'];?>"/>
        <input type="text" name="titre" required  value="<?= $edit['BIL_TITRE'] ?>"/>
        <textarea id="mytextarea" name="article" required><?= $edit['BIL_CONTENU'] ?></textarea>
        <input type="submit" name="valider" class="btn btn-primary" value="Modifier l'article"/>
    </form>
</div>


