<?php
include "./base-donne.php";
if (isset($_POST['submit-update']))
{      
    $newpub = $_POST['newpub'];
    $insertpub = $dbh->prepare("UPDATE publication SET publication = ? WHERE id_pub = ?");
    $insertpub ->execute(array($newpub,$_GET['id_pub']));
    header("Location: ../interfaces/acceuil.php");
}
?>