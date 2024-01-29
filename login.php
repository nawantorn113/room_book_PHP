<?php include('server.php') ?>
<!DOCTYPE html>
<html>

<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="p-5">
	<div class="header">
		<h2>Login</h2>
	</div>

	<form method="post" action="login.php">
		<?php include('errors.php'); ?>
		
		<div class="form-floating my-3">
			<input type="text" class="form-control" id="floatingInput" placeholder="username" name="username">
			<label for="floatingInput">Username</label>
		</div>
		<div class="form-floating my-3">
			<input type="password" class="form-control mb-3 " id="floatingPassword" placeholder="Password" name="password">
			<label for="floatingPassword">Password</label>
		<!-- </div>
		<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div> -->
	  <button type="submit" class="btn btn-outline-success mb-3" name="login_user"> Login</button>
	  <!-- <button type="button" class="btn btn-link" href="register.php" >Sign up</button> -->
  	<!-- <div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div> -->
	<!-- <p>
		<a type="submit" class="btn btn-outline-primary" href="register.php">เพิ่มพนักงาน</a>
	</p> -->
	</form>
</body>

</html>