<?php
  include "../controleur/base-donne.php"; 

  //update pseudo
  if (isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $user['pseudo']) 
  {
        $newpseudo = htmlspecialchars_decode($_POST['newpseudo'], ENT_QUOTES);
        $insertpseudo = $dbh->prepare("UPDATE membres SET pseudo = ? WHERE  id = ?");
        $insertpseudo ->execute(array($newpseudo, $_SESSION['id']));
        header("Location: ../interfaces/profil.php?id=".$_SESSION['id']);
  }

  //update email
  if (isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['email']) 
  {
        $newmail = htmlspecialchars($_POST['newmail']);
        $insertemail = $dbh->prepare("UPDATE membres SET email = ? WHERE  id = ?");
        $insertemail ->execute(array($newmail, $_SESSION['id']));
        header("Location: ../interfaces/profil.php?id=".$_SESSION['id']);
  }
 
  // update de Mot de passe
  if (isset($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp1']) AND !empty($_POST['newmdp2'])) 
  {
        $newmdp1 = sha1($_POST['newmdp1']);
        $newmdp2 = sha1($_POST['newmdp2']);
        if ($newmdp1 == $newmdp2) 
        {
          $insertmdp = $dbh->prepare("UPDATE membres SET mdp = ? WHERE  id = ?");
          $insertmdp ->execute(array($newmdp1, $_SESSION['id']));
          header("Location: ../interfaces/profil.php?id=".$_SESSION['id']);
        }
        else
        {
             $msg = "Vos deux mdp ne correspondent pas!";
             header("Location: ../interfaces/modifier-profil.php?smg=".$msg);
        }
  }

 
  // update d'image
  if (isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name']))
  {
       $taillemax = 2097152;
       $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
       if ($_FILES['avatar']['size'] <= $taillemax )
       {
             $extensionUpload = strtolower (substr(strrchr($_FILES['avatar']['name'], '.'), 1));
             if (in_array($extensionUpload, $extensionsValides))
             {
                   $chemin = "../assets/image/".$_SESSION['id'].".".$extensionUpload;
                   $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
                   if ($resultat)
                   {
                        $updateavatar = $dbh->prepare('UPDATE membres SET avatar = :avatar WHERE id = :id');
                        $updateavatar ->execute(array(
                                  'avatar' => $_SESSION['id'].".".$extensionUpload,
                                  'id' => $_SESSION['id']
                                  ));
                                  header("Location: ../interfaces/profil.php?id=".$_SESSION['id']);

                   }
                   else
                   {
                        $msg = "Erreur durant l'importation de votre de profil";
                   }
             }
             else
             {
                  $msg = "Votre photo de profil doit être au format jpg, jpeg, gif ou png";
             }
       }
       else
       {
            $msg = "Votre photo de profil ne doit pas depasser 2Mo";
       }
  }

   // update d'image
   if (isset($_FILES['avatar2']) AND !empty($_FILES['avatar2']['name']))
   {
        $taillemax = 2097152;
        $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
        if ($_FILES['avatar2']['size'] <= $taillemax )
        {
              $extensionUpload = strtolower (substr(strrchr($_FILES['avatar2']['name'], '.'), 1));
              if (in_array($extensionUpload, $extensionsValides))
              {
                    $chemin = "../assets/image2/".$_SESSION['id'].".".$extensionUpload;
                    $resultat = move_uploaded_file($_FILES['avatar2']['tmp_name'], $chemin);
                    if ($resultat)
                    {
                         $updateavatar = $dbh->prepare('UPDATE membres SET avatar2 = :avatar2 WHERE id = :id');
                         $updateavatar ->execute(array(
                                   'avatar2' => $_SESSION['id'].".".$extensionUpload,
                                   'id' => $_SESSION['id']
                                   ));
                                   header("Location: ../interfaces/profil.php?id=".$_SESSION['id']);

                    }
                    else
                    {
                         $msg = "Erreur durant l'importation de votre de Couverture";
                    }
              }
              else
              {
                   $msg = "Votre photo de couverture doit être au format jpg, jpeg, gif ou png";
              }
        }
        else
        {
             $msg = "Votre photo de couverture ne doit pas depasser 2Mo";
        }
   }

else 
{
     header("Location: ../interfaces/profil.php?id=".$_SESSION['id']);
}

?>
