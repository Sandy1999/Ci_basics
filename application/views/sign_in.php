<!DOCTYPE html>
<html>
<head>
	<title>SignIn</title>
</head>
<body>
<h1>BlogServe</h1>
<h3>Welcome to Blogsite Please login here..</h3>
<?php echo validation_errors(); ?>
<form method="POST" action="hello/signup">
	<fieldset>
	<legend>Login/Signup</legend>
	<label for="username">User Name:</label>
	<input type="text" name="username" value = "<?php echo set_value('username') ?>" ><br/>
	<label for="password">Password:</label>
	<input type="password" name="password"><br/>
	<button type="submit" name="login" value="login" formaction = "hello/signin" >Login</button>
	<button name="signup" value="signup">SignUp</button>
	</fieldset>
	</form>
</form>
</body>
</html>