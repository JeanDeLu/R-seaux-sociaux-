
   <?php 
   include "./base-donne.php";
   if(isset($_SESSION['id']))
   {
   if (isset($_POST['form_pub']))
   {
      if (!empty($_POST['pub']))
      {
         
         $pub = htmlspecialchars($_POST['pub']);
         $id_pub = htmlspecialchars($_SESSION['id']);
         $insertpub = $dbh->prepare("INSERT INTO publication (publication,id_user) VALUES  (?,?)");
         $insertpub->execute(array($pub,$id_pub));
         header("Location:../interfaces/acceuil.php");
      }
     else
     {
          $erreur = " les champs doivent être complété!";
          header("Location:../interfaces/acceuil.php?erreur=les_champs_doivent_être_complété!");
     }  
   }
}
 ?>