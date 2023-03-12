<?php
if (isset($_POST['forminscription'])) {
    $pseudo = htmlspecialchars_decode($_POST['pseudo'], ENT_QUOTES);
    $email1 = htmlspecialchars($_POST['email1']);
    $email2 = htmlspecialchars($_POST['email2']);
    $mdp1 = sha1($_POST['password1']);
    $mdp2 = sha1($_POST['password2']);


    if (!empty($_POST['pseudo']) AND !empty($_POST['email1']) AND !empty($_POST['email2']) AND !empty($_POST['password1']) AND !empty($_POST['password2'])) {
        $pseudolength = strlen($pseudo);
        if ($pseudolength <=255)
        {
             if ($email1 == $email2)
             {
                if (filter_var($email1, FILTER_VALIDATE_EMAIL)) 
                {
                    $reqmail = $dbh->prepare("SELECT * FROM membres WHERE email = ?");
                    $reqmail ->execute(array($email1));
                    $mailexit = $reqmail->rowCount();
                       if ($mailexit == 0)
                       {
                            if ($mdp1 == $mdp2)
                            {   $date_inscrit = date("Y-m-d H:i:sa");
                                $insertmbr = $dbh->prepare("INSERT INTO membres (pseudo,email,mdp) VALUES  (?,?,?)");
                                $insertmbr->execute(array($pseudo, $email1, $mdp1));
                                $erreur = "Votre compte a bien été crée!";
                                $msg ="<a href='../index.php'>Me connecter</a>";
                                header("Location:../index.php");
                            }
                            else
                            {
                                $erreur = "Vos mots de passes ne correspondent pas!";
                            }
                        }
                        else 
                        {
                             $erreur = "Adresse email déjà utilisée !";
                        }
                }
                else 
                {
                      $erreur = "Votre adresse email n'est pas Valide !";  
                }
             } 
             else
             {
                   $erreur = "Vos adresses email ne correspondent pas !";
             }
        }
        else 
        {
              $erreur = "Votre pseudo ne doit pas dépasser 255 caractères!";
        }
    }
    else {
        $erreur = "Tous les champs doivent être complété!";
    }
}
?>