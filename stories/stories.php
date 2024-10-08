<?php
session_start();
require '../Database/Config/config.php';
require '../auth/Sanitizer/sanitizer.php';
require '../classes/User.php';
?>
<html>
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>

    <?php
        echo "Hello World!";
    ?>
	
    </body>
</html>		