<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php $title = 'Article'; ?>
    </head>
    
    <?php ob_start(); ?>
        
        <h1><?= $post['title'] ?></h1>
        <p><?= $post['content'] ?></p>
    
    <?php $content = ob_get_clean(); ?>
    <?php require 'view/template.php'; ?>
</html>