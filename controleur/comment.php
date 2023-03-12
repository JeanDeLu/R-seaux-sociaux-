
<?php 
   include "./base-donne.php";
   if(isset($_SESSION['id']))
   {
    if (isset($_POST['form_com']))
    {
        if (!empty($_POST['com']))
        {
            $id_pub = htmlspecialchars($_GET['id_pub']);
            $contenu = htmlspecialchars($_POST['com']);
            $id_user= htmlspecialchars($_SESSION['id']);
            $insertpub = $dbh->prepare("INSERT INTO comment (id_pub,id_user,contenu) VALUES  (?,?,?)");
            $insertpub->execute(array($id_pub,$id_user,$contenu));
            header("Location:../interfaces/publication.php");
        }
        else
        {
            $erreur = " les champs doivent être complété!";
            header("Location:../interfaces/publication.php");
        }  
    }
}
 ?>