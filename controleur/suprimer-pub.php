<?php
    include "./base-donne.php";
    
        if (isset($_POST['form_delete']))
        {   $getid = $_GET['id_pub'];
            $requser = $dbh->prepare('DELETE FROM publication WHERE id_pub = ? ');
            $requser ->execute(array($getid));
                header("Location:../interfaces/acceuil.php?MET=".$getid);
                
        }

?>