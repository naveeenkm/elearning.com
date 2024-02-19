
<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="stylelogin.css">
    <title>Document</title>
</head>

    <body>
	
        <section>
            <div class="header">
		
            </div>
            <form method="post" action="login.php">
                <?php include('errors.php'); ?>
                <h1>Login</h1>
                <div class="inputbox">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input type="text" name="username"required>
                    <label for="">username</label>
                </div>
                <div class="inputbox">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="password" name="password"required>
                    <label for="">Password</label>
                </div>
                <div class="forget">
                    <label for=""><input type="checkbox">Remember Me</label>
                  <a href="#">Forget Password</a>
                </div>
                <button type="submit" class="btn" name="login_user">Log in</button>
                <div class="register">
                    <p>Don't have a account <a href="register.php">Register</a></p>
                </div>
            </form>
			
        </section>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>

</html>