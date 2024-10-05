<?php
session_start();
require '../Database/Config/config.php';
require 'Sanitizer/sanitizer.php';
require '../classes/User.php';
$output = '';
$_SESSION['output'] = '';

// Create a new instance of the User class
$user = new User($conn);
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = sanitize($_POST['username']);
    $email = sanitize($_POST['email']);
    $password = sanitize($_POST['password']);
    // Attempt to signup the user
    $user->signup($username, $email, $password);
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="images/favicon.jpg" type="image/x-icon">
<link rel="stylesheet" href="../styles/login.css">
<title>Login/Signup</title>
</head>
<body>
<h2>Anony</h2>
<div class="formdiv">
<form method="post" action="register.php" class="form1">
<legend>Sign Up </legend><br>
<?php echo $_SESSION['output'];
?>
<label>Username</label><br>
<input type="text" name="username" placeholder="Username" required autocomplete="true"><br><br>
<label>E-mail</label><br>
<input type="email" name="email" placeholder="E-mail" required autocomplete="true"><br><br>
<label>Password</label><br>
<input type="password" name="password" placeholder="Password" required><br>
<button type="submit" value="Submit">Register</button>
<h4>Already have an account? <a href="login.php">Log in</a></h4>
<h4><a href="rstpwd.php" class="rstpwd">Forgot password?</a></h4>
</form>
</div>
</body>
</html>