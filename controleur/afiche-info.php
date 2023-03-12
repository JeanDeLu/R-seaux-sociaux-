<?php
  $id = $_GET['id_pub'];
  $requser = $dbh->prepare('SELECT p.* ,m.* FROM publication AS p,membres AS m WHERE p.id_user = m.id AND id_pub = ?' );
  $requser ->execute(array($id));
  $userinfo = $requser->fetch(); 
?>