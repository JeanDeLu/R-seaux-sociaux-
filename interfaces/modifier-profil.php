<!DOCTYPE html>
<html lang="en">

<?php 
  
  include "../controleur/base-donne.php";
   
  if(isset($_SESSION['id']))
  {
   $getid = intval($_SESSION['id']);
   $requser = $dbh->prepare('SELECT * FROM membres WHERE id = ?');
   $requser ->execute(array($getid));
   $user = $requser->fetch();
 ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Modification Profil</title>

    <link href="../assets/css/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/modifier-profil.css">
</head>

<body>
    <div class="container-perso">
        <div class="block">
           <form action="../controleur/modification-profil-req.php" method="post">
               <div class="d-flex ml-3">
                  <a href="./acceuil.php" class="mt-2 mr-2"><span class="fas fa-arrow-left mb-2"></span></a>
                  <h3>Edit your info</h3>
               </div>
                  <!-- Affichage d'errer  -->
                     <?php 
                        if (isset($smg))
                        {
                     ?>
                     <div class="alert alert-success alert-dismissible my-3 ml-1 mr-2">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <p class='ml-3 text-danger'><?php echo "error" ;?></p>
                     </div>
                     <?php 
                        } 
                     ?>
               
               <div class="blockA my-2">
                  <div class="blockA1">
                     <p>Profile picture</p>
                     <?php
                        if(!empty($user['avatar']))
                           { 
                     ?>
                      <div class="porte-photos-profil"><img src="../assets/image/<?php echo $user['avatar']; ?>" alt="avatar"></div>
                     <?php     
                           }
                           else
                           {
                     ?>
                     <div class="porte-photos-profil">
                        <img src="../assets/img/bg1.jpg" alt="photo profil"> 
                     </div>
                     <?php
                         }
                     ?>
                  </div>
                  <div class="blockA2">
                     <input type="file" value="Edit" class="btn btn-primary d-none" name="avatar" id="file">
                     <label for="file"><span class="btn btn-primary">Edit</span></label>
                  </div>    
               </div>
               <div class="blockA my-2">
                  <div class="blockA1">
                     <p>Cover photo</p>
                     <?php
                        if(!empty($user['avatar']))
                           { 
                     ?>
                      <div class="porte-photos"><img src="../assets/image2/<?php echo $user['avatar2']; ?>" alt="avatar2"></div>
                     <?php     
                           }
                           else
                           {
                     ?>
                     <div class="porte-photos">
                        <img src="../assets/img/bg1.jpg" alt="photo Couverture">
                     </div>
                     <?php
                         }
                     ?>
                  </div>
                  <div class="blockA2">
                     <input type="file" value="Edit" class="btn btn-primary d-none" name="avatar2" id="file">
                     <label for="file"><span class="btn btn-primary">Edit</span></label>
                  </div>
               </div>
               <div class="blockA my-2">
                     <div class="blockA1">
                        <p>Pseudo name</p>
                        <input type="text" class="form-control"  name="newpseudo" value="<?php  echo $user['pseudo'] ;?>">
                     </div>
                     <div class="blockA2">
                        <input type="submit" value="Edit" class="btn btn-primary">
                     </div>
               </div>
               <div class="blockA my-2">
                     <div class="blockA1">
                        <p>E-mail Adress</p> 
                        <input type="text" class="form-control my-2" name="newmail"  value="<?php  echo $user['email']; ?>">
                     </div>
                     <div class="blockA2">
                        <input type="submit" value="Edit" class="btn btn-primary">
                     </div>
               </div>
               <div class="blockA my-2">
                     <div class="blockA1">
                        <p>Password</p>
                        <input type="text" class="form-control my-2" name="newmdp1">
                        <input type="text" class="form-control" name="newmdp2">
                     </div>
                     <div class="blockA2">
                        <input type="submit" value="Edit" class="btn btn-primary">
                     </div>
               </div>
               <div class="blockA my-2">
                  <button type="submit" class="form-control" style="background:blue;color:white" >Edit your info</button>
               </div>
           </form>
        </div>
    </div>
    <?php
      }
      else 
      {
         header ("Location:../index.php");
      }
   ?>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/aos.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/all.min.js"></script>
    <script src="../assets/js/app.js"></script>
</body>

</html>