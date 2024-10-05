<?php
include 'Database/Config/config.php';
include 'classes/User.php';
session_start();
if (!isset($_SESSION['user_id']))
{
    header("Location: auth/login.php");
    exit();
}
?>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php
echo "Welcome to your dashboard! <br><a href='logout.php'>Logout</a>";
?>

</body>
</html>