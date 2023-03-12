<?php 
   
   if (isset($_POST['login-submit'])) {
    $email = htmlspecialchars($_POST['email']);
    $mdp = sha1($_POST['password']);
        if (!empty($email) AND !empty($mdp) )
        {
            $requser = $dbh->prepare("SELECT * FROM membres WHERE email = ? AND mdp = ?");
            $requser ->execute(array($email, $mdp));
            $userexist = $requser->rowCount();
                if ($userexist == 1)
                {
                    $userinfo = $requser->fetch();
                    $_SESSION['id'] = $userinfo['id'];
                    $_SESSION['pseudo'] = $userinfo['pseudo'];
                    $_SESSION['email'] = $userinfo['email'];
                    header("Location: interfaces/acceuil.php?id=".$_SESSION['id']);
                }
                else
                {
                    $erreur = "Mauvais email ou mot de passe!";
                }
        }
        else 
        {
            $erreur = "Tous les champs doivent être complétés";
        }
   }
?>