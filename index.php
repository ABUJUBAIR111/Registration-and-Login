<?php 

include 'config.php';
session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: welcome.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		
	 if($username)   
  {  
   if(!empty($_POST["remember"]))   
   {  
    setcookie ("email",$name,time()+ (10 * 365 * 24 * 60 * 60));  
    setcookie ("password",$password,time()+ (10 * 365 * 24 * 60 * 60));
    $_SESSION["username"] = $name;
   }  
   else  
   {  
    if(isset($_COOKIE["email"]))   
    {  
     setcookie ("email","");  
    }  
    if(isset($_COOKIE["password"]))   
    {  
     setcookie ("password","");  
    }  
   }  
		
  }	
		
		header("Location: welcome.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>


<!DOCTYPE html>
<html>
<head>
  <title>Login Form</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

  <div class="modal-dialog text-center">
    <div class="col-sm-9 main-section">
      <div class="modal-content">

        <div class="col-12 user-img">
          <img src="img/face.png">
        </div>
        <div class="col-11 please">
          <h4 href="#">Please Login Here</h4>
        </div>

        <div class="col-12 form-input">
         <form action="" method="POST" class="login-email">
			<div class="form-group">
				<input type="email" placeholder="E-mail" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="form-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="form-group">  
                <input type="checkbox" name="remember" <?php if(isset($_COOKIE["login"])) { ?> checked <?php } ?> />  
               <label for="remember-me">Remember me</label>  
                </div>
			<div class="form-group">
				<button name="submit" username="login" value="Login" class="btn btn-success">Login</button>
			</div>
		<p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>
		</form>
		 </div>
		 </div>
    </div>
  </div>

</body>
</html>