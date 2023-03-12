<?php
    if(isset($_GET['id']) AND isset($_GET['id']) > 0)
    {
        $getid = intval($_GET['id']);
        $requser = $dbh->prepare('SELECT * FROM membres WHERE id = ?');
        $requser ->execute(array($getid));
        $userinfo = $requser->fetch();
    }
?>