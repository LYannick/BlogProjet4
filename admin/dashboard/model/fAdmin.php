<?php 

require_once 'model.php';

class Admin extends Model{

    function addPost(){

        $bdd = getBdd();
        $req = $bdd->prepare('INSERT INTO T_BILLET (BIL_TITRE, BIL_CONTENU, BIL_DATE)
                              VALUES (?, ?, NOW())');
        $req->execute(array($post_title, $post_content));
        return $req;
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

    function deletePost(){

        $bdd = getBdd();
        $delete = $bdd->prepare('DELETE FROM T_BILLET WHERE BIL_ID = ?');
        $delete->execute(array($delete_id));
        return $delete;
    }
}