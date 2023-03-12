<!DOCTYPE html>
<html lang="en">

<?php 

include "../controleur/base-donne.php";
if(isset($_SESSION['id']))
{
include "../controleur/affiche-profil.php";
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Publication</title>

    <link href="../assets/css/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/pub.css">
    <link rel="stylesheet" href="../assets/css/profil.css">
</head>

<body>
    <div class="container-perso">
        <div class="block">
           <div class="blockA">
              <div id="retour"><a href="./acceuil.php" ><span class="fas fa-arrow-left mb-2"></span></a></div>
              <div class="couverture">
                          <?php
                             if(!empty($userinfo['avatar']))
                             { 
                           ?>
                              <img src="../assets/image2/<?php echo $userinfo['avatar2']; ?>" alt="avatar2">
                              <?php     
                              }
                              else
                              {
                          ?>
                             <img src="../assets/img/bg_1.jpg" alt="Photo de couverture">
                          <?php
                              }
                          ?>
                  <div class="icon-couver" data-toggle="modal" data-target="#myModal2">
                    <span class="fas fa-camera font-photo"></span>
                  </div>
              </div>
              <div>
                <div class="photo-profil">
                           <?php
                             if(!empty($userinfo['avatar']))
                             { 
                           ?>
                               <img src="../assets/image/<?php echo $userinfo['avatar']; ?>" alt="avatar">
                           <?php       
                            }
                            else
                            {
                           ?>
                               <span class="fas fa-user div2" ></span>
                           <?php
                           }
                           ?>
                </div>
                <div class="icon-profil" data-toggle="modal" data-target="#myModal1">
                    <span class="fas fa-camera font-photo"></span>
                </div>
              </div>
              <div class="porte-pseudo">
                    <p class="pseudo"><?php echo $userinfo['pseudo'];?></p>
                    <p class="date"><?php echo $userinfo['email'];?></p>
                    <?php
                        if (isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
                        {
                    ?>
                    <div>
                    <a href="./modifier-profil.php">
                        <button class="btn btn-primary mb-3 form-control"><span class="fas fa-pen mr-1 text-danger"></span>Edit profile
                        </button>
                    </a>
                    </div>
                    <?php    
                        }
                    ?>
              </div>
              
           </div>
        </div>
                         <!-- The Modal Galerie 1-->
                        <div class="modal fade" id="myModal1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <img src="../assets/img/bg1.jpg" alt="Gallerie">
                                    </div>
                                    <div class="modal-footer">
                                        <p>Galerie</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- The Modal Galerie 2-->
                        <div class="modal fade" id="myModal2">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <img src="../assets/img/bg1.jpg" alt="Gallerie">
                                    </div>
                                    <div class="modal-footer">
                                        <p>Galerie</p>
                                    </div>

                                </div>
                            </div>
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
    <script>
        var img = document.getElementById("myImg");
        var modalImg = document.getElementById("img01");
        img.onclick = function(){
        modalImg.src = this.src;
        }
    </script>
</body>

</html>