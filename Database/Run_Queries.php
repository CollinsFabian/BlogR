<?php
/*if (basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"]) && !isset($_SERVER['HTTP_REFERER']))
{
    header("Location: ../");
    exit;
}
*/

require_once "Config/config.php";
// Create data table

$sql = 'DELETE FROM users';
$result = $conn->query($sql);
if ($result == TRUE)
do
{
    echo "Done!";
    exit();
}
while ($result == TRUE);
else
{
    echo "Fault in querying!" . $conn->error;
}


/*
$stmt = $conn->prepare("SELECT message FROM content ORDER BY id DESC");
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($content);
while ($stmt->fetch())
{
    echo "<div><p>" . htmlspecialchars($content)."</p></div>" . "<hr>";
}
*/

$conn->close();
?>