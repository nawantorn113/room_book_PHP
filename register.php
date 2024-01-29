<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
	  <div class="form-floating my-3">
			<input type="text" class="form-control" id="floatingInput" placeholder="username" name="username" value="<?php echo $username; ?>">
			<label for="floatingInput">Username</label>
		</div>
  	<!-- <div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div> -->
	  <div class="form-floating my-3">
			<input type="email" class="form-control" id="floatingInput" placeholder="email" name="email" value="<?php echo $email; ?>">
			<label for="floatingInput">Email</label>
		</div>
  	<!-- <div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div> -->
	  <div class="form-floating my-3">
			<input type="Password" class="form-control" id="floatingInput" placeholder="Password" name="password_1">
			<label for="floatingInput">Password</label>
		</div>
  	<!-- <div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div> -->
	  <div class="form-floating my-3">
			<input type="Password" class="form-control" id="floatingInput" placeholder="Password" name="password_2">
			<label for="floatingInput">Password com</label>
		</div>

		
  	<!-- <div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div> -->
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php" >Sign in</a>
  	</p>
  </form>
</body>
</html>