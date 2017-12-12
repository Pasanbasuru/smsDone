<?php 

if(isset($_SESSION['type']) && isset($_SESSION['user'])){

  $type = $_SESSION['type'];
  
  switch ($type) {
    case 'admin':
      header("Location:../controller/admin_controller.php");
      break;

    case 'student':
      header("Location:../controller/student_controller.php");
      break;

    case 'ar':
      
      header("Location:../controller/ar_controller.php");
      break;  
    default:
      header( 'location: ../index.php' ) ;
      break;
  }
  
 }

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/Login_page.css"></link>
  <meta name="google-signin-client_id" content="1052956449818-4kepfekionm9s1v2918rc4nf3ubp7n1n.apps.googleusercontent.com">
  <script src="https://apis.google.com/js/platform.js" async defer></script>
</head>
<style>
  .error-text{
      color: #f00;
    }
</style>
<body>
	<header>
  <nav>
    <div id="logo"><img src="img/logo.png"/></div>
  </nav>
</header>
	<div id="login-box">
  	<div class="left">
    <h1>Log in</h1>
    <?php if(@$_GET['err']==1){ ?>
    <div class ="error-text">Login incorrect</div>
  <?php } ?>
    <br>
    <form method="POST" action="../index.php">
    <input type="email" name="user" id="user_id" placeholder="example@email.com" />
    <br>
    <div id = "uname_check"></div>
    <input type="password" name="pass" placeholder="Password" required />


    <input type="submit" name="op" value="login" />
    </form>
	</br>
	<a href="forget.html"><p style="font-size:13px;">Forgot password ?</p></a>
  </div>
  
  <div class="right">
    <span class="loginwith">Log in with<br />social network</span>
    <form action="../index.php" method="POST">
    <div class=""> 
    <input class="social-signin google" type="submit" name="op" value="google sign in">
    </div>
    </form>
  </div>
  <div class="or">OR</div>
</div>
</body>
</html>