<!DOCTYPE html>
<html lang="en">

<?php 

include "controleur/base-donne.php";
include "controleur/insertion.php";

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Pretty-Login-Form.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <section class="login-clean">
        <form method="post">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration">
                <i class="icon ion-ios-navigate"></i>
            </div>
            <!-- Affichage d'errer  -->
            <?php 
                if (isset($erreur))
                {
             ?>
            <div class="alert alert-success alert-dismissible bg-danger" id="alert">
                <button type="button" class="close text-white" data-dismiss="alert">×</button>
                <p class='ml-3 text-white'><?php echo $erreur ;?></p>
            </div>
            <?php 
             } 
            ?>
            <div class="form-group">
                <input class="form-control"  id="email"  type="email" name="email" placeholder="Email" autocomplete="off" value="<?php if (isset($_POST['email'])) echo $_POST['email'];?>">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" id="mdp" name="password" placeholder="Password" autocomplete="off">
            </div>
            <div class="form-group">
                 <input type="checkbox" class="mr-2" value="Show password" id="eye">Show password
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit" name="login-submit" >Log In</button>
            </div>
            <p class="forgot">Are you don't have account?<a  href="interfaces/inscription.php" class="ml-3">Sign Up</a></p>
        </form>
    </section>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/all.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script>
        var mdp = document.getElementById('mdp');
        var email = document.getElementById('email');
        var eye = document.getElementById('eye');
        var alert = document.getElementById('alert');

        eye.addEventListener('click', function() {
            if (mdp.type === "password"){
                mdp.type = "text";
            }
            else{
                mdp.type = "password";
            }
        })
        mdp.addEventListener('click', function() {
            alert.style.display = "none";
        })
        email.addEventListener('click', function() {
            alert.style.display = "none";
        })
    </script>
</body>

</html>