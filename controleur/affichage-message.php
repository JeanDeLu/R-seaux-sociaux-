<?php
$id = $_SESSION['id'];
$msg = $dbh->prepare('SELECT * FROM messages WHERE id_expediteur = ?  ');
$msg ->execute(array($id));
?>