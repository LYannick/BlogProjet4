<?php
    
function getBdd(){

    $bdd = new PDO(,
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
}  


function getBillets(){
    
    $bdd = getBdd();
    $billets = $bdd->query('SELECT BIL_ID as id, BIL_DATE as date, BIL_TITRE as titre, 
    BIL_CONTENU as contenu FROM T_BILLET ORDER BY BIL_ID DESC');
    return $billets;
}

function getPost($idPost){

    $bdd = getBdd();
    $post = $bdd->prepare('SELECT BIL_ID as id, BIL_DATE as date, BIL_TITRE as title, 
    BIL_CONTENU as content FROM T_BILLET WHERE BIL_ID = ?');
    $post->execute(array($idPost));
    if($post->rowCount() == 1)
        return $post->fetch();
    else
        throw new Exception("Aucun billet ne correspond à l'identifiant '$idPost'");
}

function addPost(){

    $bdd = getBdd();
    $req = $bdd->prepare('INSERT INTO T_BILLET (BIL_TITRE, BIL_CONTENU, BIL_DATE)
                          VALUES (?, ?, NOW())');
    $req->execute(array($post_title, $post_content));
    return $req;
}

function deletePost(){

    $bdd = getBdd();
    $delete = $bdd->prepare('DELETE FROM T_BILLET WHERE BIL_ID = ?');
    $delete->execute(array($delete_id));
    return $delete;
}

function editPost(){

    $bdd = getBdd($edit_id);
    $edit_post = $bdd->prepare('SELECT * FROM T_BILLET WHERE BIL_ID = ?');
    $edit_post->execute(array($edit_id));
    if($edit_post->rowCount() == 1){
        return $edit_post->fetch();
    }
}

function updatePost(){

    $bdd = getBdd();
    $update = $bdd->prepare('UPDATE T_BILLET SET BIL_TITRE = ?, BIL_CONTENU = ?, 
                             BIL_DATE_EDITION = NOW() WHERE BIL_ID = ?');
    $update->execute(array($post_title, $post_content, $edit_id));
    return $update;
}



