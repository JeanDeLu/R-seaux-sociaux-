<?php
$requser = $dbh->prepare('SELECT * FROM membres ');
$requser ->execute();
$userinfo = $requser->fetchAll();
?>