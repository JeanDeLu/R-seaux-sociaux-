<!DOCTYPE html>
<html lang="en">

<?php 
    include "../controleur/base-donne.php";
    
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
</head>

<body>
    <div class="container-perso">
        <div class="block">
            <a href="./acceuil.php"><span class="fas fa-arrow-left mb-2"></span></a>
            <div class="d-flex div-block2a mb-2">
                       <?php
                          $id = $_GET['id'];
                          $requser = $dbh->prepare('SELECT * FROM membres WHERE id = ? ');
                          $requser ->execute(array($id));
                          $user = $requser->fetch();
                       ?>
                        <a href="./profil.php?id=<?php echo $user['id'];?>">
                                    <?php
                                        if(!empty($user['avatar']))
                                        { 
                                    ?>
                                      <div class="div-block1a11"><img src="../assets/image/<?php echo $user['avatar']; ?>" alt="avatar"></div>
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
                        <div class="my-2 mx-3">
                            <p class=" ml-1 pseudo"><?php echo $user['pseudo'];?></p>
                            <p class="date">12-01-22</p>
                        </div>
            </div>
            <div class="d-flex div-block2a mb-2">
                <div class="row d-flex div-block2b0">
                        <?php
                           $id_pub = $_GET['id_pub'];
                           $requsers = $dbh->prepare('SELECT * FROM publication WHERE id_pub = ? ');
                           $requsers ->execute(array($id_pub));
                           $users = $requsers->fetch();
                        ?>
                        <div class="div-shadow">
                            <p class="ml-2 mr-2 text-pub"><?php echo $users['publication'];?></p>
                        </div>
                        <div class="col-12">
                            <div class="div-block2b1 ">
                              <img src="../assets/img/font.jpg" alt="image pub">
                            </div>
                        </div>   
                </div>
            </div>
            <div class="d-flex div-block2a mb-2">
                <div class="div-block2a1">
                   
                </div>
                <div class="div-block2a2">
                    <button class="btn btn-primary mt-2 btn-sm" data-toggle="modal" data-target="#myModal">Commenter</button>
                </div>
            </div>
            <div class="div-block2a ">
                <div class="d-flex mb-2 div-block2a">
                            <div class="ml-2">
                                <div class="div-block1a11"><span class="fas fa-user div2" ></span></div>
                            </div>
                            <div class="my-2 mx-3">
                                <p class=" ml-1 pseudo">RABIALAHY</p>
                                <p class="date">12-01-22</p>
                            </div>
                            

                </div>
                <div class="div-block3"> 
                    <div class="div-block3a1">
                       <p class="text-pub">Paragraph bbbbbbbbbbbbbb bbbbbbbbbbbbbb bbbbbbbbbbbbb bbbbbbbbbbbbbbbbbbbbbbbbbb dddd ddddd ssssss sssss</p>
                    </div>
                    <div class="div-block3a2">
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal1">Delete</button>
                    </div>
                </div>
            </div>
            <div class="div-block2a ">
                <div class="d-flex mb-2 div-block2a">
                            <div class="ml-2">
                                <div class="div-block1a11"><span class="fas fa-user div2" ></span></div>
                            </div>
                            <div class="my-2 mx-3">
                                <p class=" ml-1 pseudo">RABIALAHY</p>
                                <p class="date">12-01-22</p>
                            </div>
                            

                </div>
                <div class="div-block3"> 
                    <div class="div-block3a3">
                       <p class="text-pub">Paragraph bbbbbbbbbbbbbb bbbbbbbbbbbbbb bbbbbbbbbbbbb bbbbbbbbbbbbbbbbbbbbbbbbbb dddd ddddd ssssss sssss</p>
                    </div>
                </div>
            </div>
                        <!-- The Modal Delete-->
                        <div class="modal fade" id="myModal1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h2 class="ml-3 mt-4 text-center">Delete Comments</h2>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form action="">
                                        <p class="text-center">Are you sure you want to delete your comments?</p>
                                            
                                   

                                        <div class="block-modal">
                                            <div class="div-model">
                                              <input type="submit" value="Delete" class="btn btn-primary form-control btn-sm" name="login">
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
                         <!-- The Modal Comments-->
                         <div class="modal fade" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h5 class="modal-title ml-2 mt-4">Comments</h5>
                                        
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form action="../controleur/comment.php?id_pub=<?php echo $users['id_pub'];?>" method="post">
                                            <textarea name="com" id="" class="form-control" cols="30" rows="8"></textarea>
                                            
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <div class="div-model">
                                          <input type="submit" value="Comments" class="btn btn-primary form-control" name="form_com">
                                          </form>
                                        </div>
                                        <div class="div-model">
                                          <button type="button" class="btn btn-danger form-control" data-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
        </div>
    </div>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/aos.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/all.min.js"></script>
    <script src="../assets/js/app.js"></script>
</body>

</html>