<!DOCTYPE html>
<html lang="fr">
<head>
    <?php $this->title = 'Edition'; ?>

    <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=agywk2mah7awl6s8vypttkkgp2xc4ucqg246fwcg207z8emv"></script>
    <script>tinymce.init({ selector: '#mytextarea' });</script>
</head>

 

        <form method="post" action="">
            <input type="text" name="titre" required  value="<?= $edit_post['BIL_TITRE'] ?>"/>
            <textarea id="mytextarea" name="article" required><?= $edit_post['BIL_CONTENU'] ?></textarea>
            <input type="submit" name="valider" value="Modifier l'article"/>
        </form>

</html>

