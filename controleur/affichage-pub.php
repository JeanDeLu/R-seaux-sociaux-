<?php
 $requser = $dbh->prepare('SELECT p.* ,m.* FROM publication AS p,membres AS m WHERE p.id_user = m.id ORDER BY id_pub DESC ' );
 $requser ->execute();
 $userinfo = $requser->fetchAll(); 
?>