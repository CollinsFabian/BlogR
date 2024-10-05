<?php
function redirectIfDirectAccess()
{
    if (basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"]) && !isset($_SERVER['HTTP_REFERER']))
    {
        header("Location: /");
        exit;
    }
}
redirectIfDirectAccess();
class Database
{
    private $host = "127.0.0.1";
    private $db_name = "blogr";
    private $username = "root";
    private $password = "";
    public $conn;
    public function getConnection()
    {
        $this->conn = null;
        try
        {
            $this->conn = new mysqli($this->host,
            $this->username, $this->password, $this->db_name);
            if ($this->conn->connect_error)
            {
                die("Connection failed: " .
                $this->conn->connect_error);
            }
        }
        catch (Exception $e)
        {
            echo "Connection error: " . $e->getMessage();
        }
        return $this->conn;
    }
}
// Instantiate DB connection
$db = new Database();
$conn = $db->getConnection();
?>