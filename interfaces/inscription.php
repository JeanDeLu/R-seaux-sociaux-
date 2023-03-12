<!DOCTYPE html>
<html lang="en">

<?php 
    include "../controleur/base-donne.php";
    include "../controleur/inscription-req.php";
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="../assets/css/Pretty-Login-Form.css">
    <link rel="stylesheet" href="../assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <section class="register-photo">
        <div class="form-container">
            <form method="post">
                <h2 class="text-center"><strong>Create</strong> an account.</h2>
                <?php 
                   if (isset($erreur))
                   {
                ?>
                 <div class="alert alert-success alert-dismissible bg-danger">
                    <button type="button" class="close text-white" data-dismiss="alert">×</button>
                    <p class='ml-3 text-white'><?php echo $erreur ;?></p>
                 </div>
                <?php 
                   }
                ?>
                <div class="form-group">
                    <input class="form-control" type="text" name="pseudo" placeholder="Pseudo" autocomplete="off" value="<?php if (isset($_POST['pseudo'])) echo $_POST['pseudo'];?>">
                </div>
                <div class="form-group">
                    <input class="form-control" type="email" name="email1" placeholder="Email" autocomplete="off" value="<?php if (isset($_POST['email1'])) echo $_POST['email1'];?>">
                </div>
                <div class="form-group">
                    <input class="form-control" type="email" name="email2" placeholder="Email (repeat)" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="password1" placeholder="Password" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="password2" placeholder="Password (repeat)" autocomplete="off">
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend"></div>
                        <div class="input-group-append"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox">I agree to the license terms.
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit" name="forminscription">Sign Up</button>
                </div>
                <p class="already">You already have an account?<a  href="../index.php" class="ml-3">Login here.</a></p>
            </form>
        </div>
    </section>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>