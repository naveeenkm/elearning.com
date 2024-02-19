<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="stylelogin.css">
</head>
<body>
	<section>
  <div class="header">
  	
  </div>
	
  <form method="post" action="register.php">
  <h1>Register</h1>
  	<?php include('errors.php'); ?>
  	<div class="inputbox">
		  <input type="text" name="username" value="<?php echo $username; ?>" required>
		  <label for="">Username</label>
  	</div>
  	<div class="inputbox">
	  <ion-icon name="mail-outline"></ion-icon>
		  <input type="email" name="email" value="<?php echo $email; ?>" required>
		  <label for="">Email</label>
  	</div>
  	<div class="inputbox">
	  <ion-icon name="lock-closed-outline"></ion-icon>
		  <input type="password" name="password_1" required>
		  <label for="">Password</label>
  	</div>
  	<div class="inputbox">
	  <ion-icon name="lock-closed-outline"></ion-icon>
		  <input type="password" name="password_2" required>
		  <label for="">Confirm password</label>
  	</div>
  	<div class="register">
  	  <button type="submit" class="btn" name="reg_user" >Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
  </section>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>