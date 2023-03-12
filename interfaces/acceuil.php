<?php 
  
  include "../controleur/base-donne.php";
  if(isset($_SESSION['id']))
  {
        include "../controleur/affichage-pub.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>page d'acceuil</title>

    <!-- File css -->
    <link href="../assets/css/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">

</head>
    <?php 
       include "header.php";
    ?>
    <div class="container">
      <div class="row " id="div-content-acceuil">
        <div class="col-md-2"></div>

        <div class="col-md-8 ">
            <div class="div-block1">
              <div class="div-block1a">
                <div >
                  <a href="./profil.php?id=<?php echo $_SESSION['id'];?>">
                            <?php
                                $requser = $dbh->prepare('SELECT * FROM membres WHERE id = ? ');
                                $requser ->execute(array($_SESSION['id']));
                                $user = $requser->fetch();
                                if(!empty($user['avatar']))
                                { 
                            ?>
                            <div class="div-block1a11"><img src="../assets/image/<?php echo $user['avatar']; ?>" alt="avatar" class=""></div>
                            <?php     
                                }
                                else
                                {
                            ?>
                           <div class="div-block1a11"><span class="fas fa-user div2" ></span>
                           </div>
                           <?php
                            }
                            ?>
                  </a>
                </div>
                <a href="#" data-toggle="modal" data-target="#myModal0"><input type="text" placeholder="What's on your mind"></a>
                <div class="fa-input-icon">
                  <i class="fas fa-image"></i>
                </div>
              </div>
            </div>
            <!-- Debut de carousel -->
            <div class="carousel slide d-flex" data-ride="carousel" id="carousel-1" >
                    <div class="carousel-inner" >
                        <div class="carousel-item active">
                          <img class="w-100 d-block" src="../assets/img/champs.jpg" alt="Slide Image1">
                        </div>
                        <div class="carousel-item">
                          <img class="w-100 d-block" src="../assets/img/bg1.jpg" alt="Slide Image2">
                        </div>
                        <div class="carousel-item">
                          <img class="w-100 d-block" src="../assets/img/fruits.jpg" alt="Slide Image3">
                        </div>
                        <div class="carousel-item">
                          <img class="w-100 d-block" src="../assets/img/fruits.jpg" alt="Slide Image3">
                        </div>
                    </div>
                    <div>
                      <a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-1" data-slide-to="1"></li>
                        <li data-target="#carousel-1" data-slide-to="2"></li>
                        <li data-target="#carousel-1" data-slide-to="3"></li>
                    </ol>
            </div>
            <!-- Fin de carousel -->
            <?php 
               foreach($userinfo as $row)
               {
            ?>
            <div class="div-block2">
                    <div class="d-flex div-block2a">
                        <div class="shadow-text">
                            <div class="ml-2">
                                <a href="./profil.php?id=<?php echo $row['id'];?>">
                                    <?php
                                        if(!empty($row['avatar']))
                                        { 
                                    ?>
                                      <div class="div-block1a11"><img src="../assets/image/<?php echo $row['avatar']; ?>" alt="avatar"></div>
                                    <?php     
                                        }
                                        else
                                        {
                                    ?>
                                    <div class="div-block1a11"><span class="fas fa-user div2" ></span></div>
                                    <?php
                                      }
                                    ?>
                                  </a>
                            </div>
                            <div class="my-3 mx-3">
                                <p class=" ml-1 pseudo"><?php echo $row['pseudo'];?></p>
                                <p class="date">12-01-22</p>
                            </div>
                        </div>
                    </div>
                    <!-- 1er condition -->
                    <?php
                  if (isset($_SESSION['id']) AND $row['id'] == $_SESSION['id'])
                  {
                    ?>
                    <div class="div-block2b">
                        <div class="row d-flex">
                              <div class="d-flex div-block2b0">
                                    <div class="shadow-text1"><p class="ml-5 mr-4 text-pub"><?php echo $row['publication'];?></p></div>
                              </div>
                              <div class="col-9">
                                  <div class="div-block2b1">
                                    <img src="../assets/img/font.jpg" alt="image pub">
                                  </div>
                              </div>
                              <div class="col-3">
                                  <div class="div-block2b2" >
                                    <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#myModal">
                                      <i class="fas fa-pen mr-1 text-danger"></i>EDIT
                                    </button>
                                    <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#myModal1">
                                      <i class="fas fa-trash-alt mr-1 text-danger" ></i>DELETE
                                    </button>
                                  </div>
                              </div>
                        </div>

                       <!--Start The Modal Delete-->
                       <div class="modal fade" id="myModal1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h2 class="ml-3 mt-4 text-center">Delete Publication</h2>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form  action="../controleur/suprimer-pub.php?id_pub=<?php echo $row['id_pub'];?> " method="POST">
                                        <p class="text-center">Are you sure you want to delete your publication?</p>
                                            
                                        <div class="block-modal">
                                            <div class="div-model">
                                            <a href=""><input type="submit" value="Delete" class="btn btn-primary form-control btn-sm" name="form_delete"></a>
                                            </form>
                                            </div>
                                            <div class="div-model">
                                              <button type="button" class="btn btn-danger form-control btn-sm" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- End The Modal Delete-->

                        <!-- Start The Modal Update-->
                        <div class="modal fade" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h5 class="modal-title ml-2 mt-4">Modification</h5>
                                        
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form action="../controleur/modification-pub-req.php?id_pub=<?php echo $row['id_pub'];?>" method="POST">
                                            <textarea name="newpub" id="" class="form-control" cols="30" rows="8">
                                               
                                            </textarea>
                                            
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <div class="div-model">
                                          <input type="submit" value="update" class="btn btn-primary form-control" name="submit-update">
                                          </form>
                                        </div>
                                        <div class="div-model">
                                          <button type="button" class="btn btn-danger form-control" data-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- End The Modal Update-->

                        <div class="row div-block2b3">
                            <div class="col-9 mb-1" >
                                <div class="d-flex justify-content-around mt-2 ml-2">
                                    <div class=" shadow-text3">
                                      <button class="btn btn-primary btn-sm" type="button">
                                        <i class="far fa-thumbs-up mr-1 "></i>Like
                                      </button>
                                    </div>
                                    <div class=" shadow-text3">
                                      <button class="btn btn-primary btn-sm" type="button">
                                        <i class="far fa-thumbs-down mr-1"></i>Dislike
                                      </button>
                                    </div>
                                    <div class="shadow-text3">
                                      <!-- <a href="./publication.php?id_pub=<?php //echo $row['id_pub'];?>&id=<?php //echo $row['id'];?>" > -->
                                        <button class="d-flex btn btn-primary btn-sm " type="button">
                                            <i class="far fa-comment-alt mr-1 "></i>Comment
                                        </button>
                                      
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div></div>
                            </div>
                        </div>
                    </div>
                    <?php
                  }
                  else 
                  {
              ?>
                    <!-- 2ieme condition -->
                    <div class="div-block2b">
                        <div class="row d-flex">
                            <div class="d-flex div-block2b0">
                                  <div class="shadow-text1"><p class="ml-5 mr-4 text-pub"><?php echo $row['publication'];?></p></div>
                            </div>
                            <div class="col-12">
                                <div class="div-block2b11">
                                  <img src="../assets/img/font.jpg" alt="image pub">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row div-block2b3">
                            <div class="col-12 mb-1" >
                                <div class="d-flex justify-content-around mt-2 ml-2">
                                  <div class=" shadow-text3">
                                    <button class="btn btn-primary btn-sm" type="button">
                                      <i class="far fa-thumbs-up mr-1 "></i>Like
                                    </button>
                                  </div>
                                  <div class=" shadow-text3">
                                    <button class="btn btn-primary btn-sm" type="button">
                                      <i class="far fa-thumbs-down mr-1"></i>Dislike
                                    </button>
                                  </div>
                                  <div class="shadow-text3">
                                    <!-- <a href="./publication.php?id_pub=<?php //echo $row['id_pub'];?>&id=<?php //echo $row['id'];?>&id=<?php //echo $row['id'];?>" > -->
                                    <a href="" class="href">
                                      <button class="d-flex btn btn-primary btn-sm shadow-text-1 href1" type="button" >
                                        <i class="far fa-comment-alt mr-1 "></i>Comment
                                      </button>
                                    </a>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                  }
              ?>
                </div>
                <?php
                }
              ?>
        </div>
   </div> 

                            

                        <!-- The Modal Publication -->
                        <div class="modal fade" id="myModal0">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h5 class="modal-title ml-2 mt-4">Publication</h5>
                                        
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form action="../controleur/pub.php" method="POST">
                                            <textarea name="pub" id="" class="form-control" cols="30" rows="8" placeholder="What's in your mind"></textarea>
                                            
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <div class="div-model">
                                          <input type="submit" value="Post" class="btn btn-primary form-control" name="form_pub">
                                          </form>
                                        </div>
                                        <div class="div-model">
                                          <button type="button" class="btn btn-danger form-control" data-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        
                        
        
        <div class="col-md-2"></div>
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