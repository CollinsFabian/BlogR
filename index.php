<?php
session_start();

?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="styles/home.css" media="print, screen">
    <link rel="stylesheet" href="styles/css/all.css" media="all">
    <title>BlogR</title>
</head>

<body id="body">
    <div>
        <header id="header">
            <img class="logo" src="../favicon.png" width="10%" alt="Logo">
            <h1>BlogR</h1>
            <a class="search" href="search.php"><i class="fas fa-search"></i></a>
        </header><br>

        <nav id="navContent">
            <a href="#" class="active"><i class="fa-solid fa-house fa-1x"></i></a>
            <a href="#"><i class=" fas fa-user"></i></a>
            <a href="#"><i class=" fas fa-envelope"></i></a>
            <a href="files/settings.php"><i class=" fas fa-cog"></i></a>
        </nav><br><br><br><br><br>
        <div class="toggle-container">
            <input type="checkbox" id="darkModeCheckbox" class="toggle-checkbox" onclick="swap()">
        </div>
        <div class="postdiv">
            <input type="text" class="createpost" placeholder="Create a post...">
        </div>
    </div>

    <div class="content">
        <section class="blog-section">
            <h2>Latest Posts</h2>
            <article class="blog-entry">
                <div class="blogimgcntnr"><img class="blogimg" src="../images/fiveUA.jpg.webp" alt="Blog Entry 1 Image"></div>
                <h3>{{Post Title}}</h3>
                <p>
                    This is a short description of the first blog entry. Users can click to read the full entry.
                </p>
                <a href="#">Read More</a>
            </article>
            <article class="blog-entry">
                <div class="blogimgcntnr"><img class="blogimg" src="../images/wakanda.jpg" alt="Blog Entry 2 Image"></div>
                <h3>{{Post Title}}</h3>
                <p>
                    Another blog entry with a brief description. Users can click to read the full entry.
                </p>
                <a href="#">Read More</a>
            </article>
            <!-- Add more blog entries as needed -->
        </section>
    </div>

    <?php
if (isset($_SESSION['user_id']))
{
    echo "";
}else {
    echo "<p class='register'><a href='../auth/login.php'>Create </a>an account</p>";
}
?>
    <?php include "files/footer.php"; ?>
    <script defer src="../Javascript/index.js"></script>
</body>

</html>