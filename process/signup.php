<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


session_start();
require 'core/pdo.php';
require('core/mail.php');
require 'PHP/octaValidate-PHP-main/src/Validate.php';


use Validate\octaValidate;

$db = new DatabaseClass();

//set configuration
$options = array(
     "stripTags" => true,
     "strictMode" => true
);
//create new instance
$myForm = new octaValidate('register', $options);
//define rules for each form input name
$valRules = array(
     "email" => array(
          ["R", "Your Email Address is required"],
          ["EMAIL", "Your Email Address is invalid!"]
     ),
     "fullName" => array(
          ["R", "Your full name is required"],
          ["ALPHA_SPACES", "full name must have spaces"]
     ),
     "pass" => array(
          ["R", "Your password is required"],
          ["PWD", "Password must contain a capital, lowercase and unique character or special character"]
     ),
     "phone" => array(
          ["R", "Your phone number is required"],
          ["DIGITS", "Number Must contain digits"]
     ),
     "address" => array(
          ["R", "Your address address is required"],
          ["TEXT", "Input a valid address"],
     ),
     "bankAccName" => array(
          ["R", "Your sate number is required"],
          ["ALPHA_SPACES", "Bank account name must be an alphabets"]
     ),
     "bankAccNumber" => array(
          ["R", "Your sate number is required"],
          ["DIGITS", "Number Must contain digits"]
     ),
       "bankName" => array(
          ["R", "Your sate number is required"],
          ["ALPHA_SPACES", "Bank name must be an alphabets"]
     ),
     "confirmPass" => array(
          ["R", "Your password is required"],
          ["EQUALTO", "pass", "password must equal to password",]
     ),
);
// validate the form //
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     //begin validation on form fields from $_POST array
     if ($myForm->validateFields($valRules, $_POST)) {

          // check if the email exists//
          $email = strtolower($_POST['email']);
          $result = $db->SelectOne("SELECT email FROM agent WHERE email = :email", ['email' => $email]);

          //If $row is FALSE, then no row was returned.
          if ($result) {
               $errMsg = array(
                    'register' => array(
                         'email' => 'Email has been taken'
                    )
               );
               print('<script>
                    document.addEventListener("DOMContentLoaded", function(){
                         showErrors(' . json_encode($errMsg) . ');
                    });</script>');
          } else {
               //process form data here //
               $fullName = $_POST['fullName'];
               $password = $_POST['pass'];
               $user_id = md5(time() . $email);
               $phone = $_POST['phone'];
               $address = $_POST['address'];
               $bankAccName = $_POST['bankAccName'];
               $bankAccNumber = $_POST['bankAccNumber'];
               $bankName = $_POST['bankName'];

               $query = "INSERT INTO agent (user_id, fullName, email, password, phone, address, bank_acc_name, bank_acc_number, bank_name) 
                     VALUES (:user_id, :fullName, :email, :password, :phone, :address, :bank_acc_name, :bank_acc_number, :bank_name)";

               $data = [
                     'user_id' => $user_id,
                     'fullName' => $fullName,
                     'email' => $email,
                     'password' => $password,
                     'phone' => $phone,
                     'address' => $address,
                     'bank_acc_name' => $bankAccName,
                     'bank_acc_number' => $bankAccNumber,
                     'bank_name' => $bankName,
              ];


               $result = $db->Insert($query, $data);
               // echo $result;
               // die();
               if (!$result) {
                    $_SESSION['auth'] = true;
                    $_SESSION['start'] = time();
                    $_SESSION['expire'] = $_SESSION['start'] + (40 * 60);
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['fullName'] = $fullName;
                    $subject = "Thanks for signing up";
                    // sendMail($email, $fullName, $subject, str_replace(["##fullname##", "##username##", '##password##'], [$fullName, $fullName, $password], file_get_contents("welcom-email.php")));
                    header("Location:agent/");
                     exit();

               } else {
                    $_SESSION['error'] = 1;
                    $_SESSION['errorMassage '] = "Signup was not successful";
                    header("Location:signup.php");
                    exit();
               };
          };
     } else {
          //return errors

          print('<script>
               document.addEventListener("DOMContentLoaded", function(){
                    showErrors(' . json_encode($myForm->getErrors()) . ');
          });</script>');
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
                    <a href="../index.php" class="js-logo-clone">CHIFOUR AGENT</a>
               </div>
          </div>

          <!-- Login Form -->
          <form id="register" action="" method="post" autocomplete="off">
               <input type="email" id="email" class="fadeIn second" name="email" placeholder="email" value="<?php (isset($_POST) && isset($_POST['email'])) ? print($_POST['email']) : '' ?>">
               <input type="text" id="fName" class="fadeIn second" name="fullName" placeholder="Full-Name">

               <input type="tel" id="phone" class="fadeIn second" name="phone" placeholder="Phone Number">
             
               <input type="text" id="address" class="fadeIn second" name="address" placeholder="Contact Address">
               <input type="text" id="bankAccName" class="fadeIn second" name="bankAccName" placeholder="Bank Account Name">
               <input type="tel" id="bankAccNumber" class="fadeIn second" name="bankAccNumber" placeholder="Bank Account Number">
               <input type="text" id="bankName" class="fadeIn second" name="bankName" placeholder="Bank Name">


               <input type="password" id="password" class="fadeIn third" name="pass" placeholder="password">
               <input type="password" id="password" class="fadeIn third" name="confirmPass" placeholder="Confirm your password">
               <input type="submit" class="fadeIn fourth mt-3" value="Signup"><br>
          </form>

          <!-- Remind Password -->
          <div id="formFooter">
               <a class="underlineHover" href="login.php">Login instead</a>
          </div>

     </div>
</div>
</body>

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
