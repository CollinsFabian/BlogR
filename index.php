<?php
session_start();
?>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="favicon.png" type="image/x-icon">
<title>BlogR</title>
</head>
<body>
<?php
echo "Hello World!<br><br>";
if (isset($_SESSION['user_id']))
{
    echo "<p> <a href='logout.php'>Logout</a></p>";
}
else
{
    echo "<a href='auth/login.php'>Login</a>";
}
?>
</body>
</html>