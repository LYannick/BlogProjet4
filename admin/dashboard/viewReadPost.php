<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php $title = 'Article'; ?>
    </head>
    
    <?php ob_start(); ?>
        
        <h1><?= $titre ?></h1>
        <p><?= $contenu ?></p>
    
    <?php $content = ob_get_clean(); ?>
    <?php require 'template.php'; ?>
</html>