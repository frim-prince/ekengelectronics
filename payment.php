<?php  include_once("settings.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();

}

  // Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    
    include_once("checkout.php");
}else{
	include_once("login.php");
}
proceedPayment();
 ?>