<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<style>
body
{
    background-color: #ddd;
}
.flex
{
    display: flex;
    justify-content: space-between;
    background-color: white;
    text-align: center;
    flex-wrap: wrap;
}

.flex>div {
    color: white;
    background-color: mediumblue;
    border-radius: 20%;
    text-align: center;
}
</style>
<?php
echo "Hello World!";
?>
<br><br>
<div class="flex">
<div>A lotta shit</div>
<div>A lotta shit</div>
<div>A lotta shit</div>
<div>A lotta shit</div>
</div>
</body>
</html>