<?php

$bdd = new PDO();

if(isset($_GET['id']) AND !empty($_GET['id'])) {
   $suppr_id = htmlspecialchars($_GET['id']);
   $suppr = $bdd->prepare('DELETE FROM T_BILLET WHERE BIL_ID = ?');
   $suppr->execute(array($suppr_id));
   header('Location: http://projet4.alwaysdata.net/admin/dashboard/index.php');
}
?>