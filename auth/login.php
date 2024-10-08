<?php
session_start();
require '../Database/Config/config.php';
require 'Sanitizer/sanitizer.php';
require '../classes/User.php';
$output = '';
//If user session started (logged-in), redirect to homepage.
if (isset($_SESSION['user_id']))
{
    header("location: ../");
    exit;
}

// Create a new instance of the User class
$user = new User($conn);
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $email = sanitize($_POST['email']);
    $password = sanitize($_POST['password']);
    // Attempt to login the user
    if ($user->login($email, $password))
    {
        header("Location: ../");
        exit();
    }
    else
    {
        $output = "<p style='color: red;font-weight: bold;'>Login failed. Invalid credentials.</p>";
    }
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
<h2>BlogR</h2>
<div class="formdiv">
<form method="post" class="form1">
<legend>Login</legend><br>
<?php echo $output;
?>
<label>E-mail </label><br>
<input type="email" name="email" placeholder=" E-mail" required="required" autocomplete="true"><br><br>
<label>Password </label><br>
<input type="password" name="password" id="password" placeholder=" Password" required><br>
<button type="submit" value="Submit">Login</button><br><br />
<h4>Don't have an account? <a href="register.php">Signup</a></h4>
<h4><a href="rstpwd.php" class="rstpwd">Forgot password?</a></h4>
</form>
</div>
</body>
</html>