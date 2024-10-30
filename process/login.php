<?php
ob_start();
include_once 'core/pdo.php';

//check if session is started already
if (session_status() === PHP_SESSION_NONE)
     session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $email = trim($_POST['email']);
     $password = $_POST['password'];

     if ($email == "myadmin@admain.com" && $password == "admin12345") {
          $_SESSION['admin-auth'] = true;
          $_SESSION['start'] = time();
          $_SESSION['expire'] = $_SESSION['start'] + (40 * 60);
          header("Location:admin/");
          exit();
     } else {
          $result = $db->SelectOne("SELECT * FROM agent WHERE email = :email", ['email' => $email]);
          if (($result)) {
               if ($password == $result['password']) {
                    $_SESSION['auth'] = true;
                    $_SESSION['start'] = time();
                    $_SESSION['expire'] = $_SESSION['start'] + (40 * 60);
                    $_SESSION["user_id"] = $result['user_id'];
                    $_SESSION["email"] = $result['email'];
                    $_SESSION["fullName"] = $result['fullName'];
                    print('<script>
                              setTimeout(() => {
                                   toastr.success("Welcome youve been logged in");
                              },5000)
                              window.location = "agent/";
                         </script>');
               } else {
                    print('<script>
                                   document.addEventListener("DOMContentLoaded", function() {
                                   toastr.error("Wrong Email or Password",{timeOut: 5000});
                              })
                         </script>');
               }
          } else {
               print('<script>
                         document.addEventListener("DOMContentLoaded", function() {
                         toastr.error("Wrong Email or Password",{timeOut: 5000});    
                    })
               </script>');
          }
     }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <title>Chifour</title>
     <meta charset="utf-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

     <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet" />
     <link rel="shortcut icon" href="favicon.ico" />
     <link rel="stylesheet" href="fonts/icomoon/style.css" />

     <link rel="stylesheet" href="css/bootstrap.min.css" />
     <link rel="stylesheet" href="css/magnific-popup.css" />
     <link rel="stylesheet" href="css/jquery-ui.css" />
     <link rel="stylesheet" href="css/owl.carousel.min.css" />
     <link rel="stylesheet" href="css/owl.theme.default.min.css" />

     <link rel="stylesheet" href="css/aos.css" />

     <link rel="stylesheet" href="css/style.css" />
     <link rel="stylesheet" href="js/toastr-master/build/toastr.min.css" />
     <!-- fluterwave -->
     <script src="https://checkout.flutterwave.com/v3.js"></script>
     <!-- loader script -->
     <script>
          window.addEventListener('load', () => {
               const loader = document.querySelector('.loader');
               loader.classList.add('loader--hidden');
               loader.addEventListener('transitionend', () => {
                    document.body.removeChild(loader);
               })
          });
     </script>
</head>

<body>

<div class="wrapper fadeInDown formSection">
     <div id="formContent">
          <!-- Tabs Titles -->

          <!-- Icon -->
          <div class="fadeIn first">
               <div class="site-logo">
                    <a href="index.html" class="js-logo-clone">Welcome To Chifour</a>
               </div>
          </div>

          <!-- Login Form -->
          <form autocomplete="off" action="" method="post">
               <input type="email" id="login" class="fadeIn second" name="email" placeholder="email" required>
               <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" required>
               <input type="submit" class="fadeIn fourth mt-3" value="Log In"><br>
               <a href="signup.php">Don't have an account yet</a>
          </form>

          <!-- Remind Passowrd -->
          <div id="formFooter">
               <a class="underlineHover" href="#">Forgot Password?</a>
          </div>

     </div>
</div>

</body>

			<script src="js/jquery-3.3.1.min.js"></script>
			<script src="js/jquery-ui.js"></script>
			<script src="js/popper.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<script src="js/owl.carousel.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>
			<script src="js/aos.js"></script>
			<script src="https://kit.fontawesome.com/678ed16258.js" crossorigin="anonymous"></script>
			<script src="js/main.js"></script>
			<script src="PHP/octaValidate-PHP-main//frontend/helper.js"></script>
			<script src="js/toastr-master/build/toastr.min.js"></script>
<?php
ob_end_flush();
?>