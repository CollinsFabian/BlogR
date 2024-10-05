<?php
if (basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"]) && !isset($_SERVER['HTTP_REFERER']))
{
    header("Location: ../");
    exit;
}

class User
{
    private $conn;
    // Constructor to initialize DB connection
    public function __construct($db)
    {
        $this->conn = $db;
    }
    // Function to handle user signup
    public function signup($username, $email, $password)
    {
        // Hash the password
        $hashedPassword = password_hash($password,
        PASSWORD_BCRYPT);
        $stmt = $this->conn->prepare("SELECT email, username FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        $stmt2 = $this->conn->prepare("SELECT email, username FROM users WHERE email = ?");
        $stmt2->bind_param("s", $email);
        $stmt2->execute();
        $result2 = $stmt2->get_result();
        if (!$result || !$result2)
        {
            $output = "Error occurred!";
        }
        elseif ($result->num_rows > 0)
        {
            $_SESSION['output'] ="<p style=\"color: red;font-weight: bold;\">The username ". $username . " is already taken!</p>";
        }
        elseif ($result2->num_rows > 0)
        {
            $_SESSION['output'] = "<p style=\"color: red;font-weight: bold;\">The email is in use!</p>";
        }
        else
        {
            // Prepare the SQL statement to prevent SQL injection
            $stmt = $this->conn->prepare("INSERT INTO users(username, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $username, $email,
            $hashedPassword);
            if ($stmt->execute())
            {
            $_SESSION['output'] = "<p style=\"font-weight: bold;color: green;\">Registration successful. <br> Login</p>";
                return true;
            }
            else
            {
            $_SESSION['output'] = "<p style=\"font-weight: bold;color: red;\">Signup Error.</p>";
                return false;
            }
        }
    }

    // Function to handle user login
    public function login($email, $password)
    {
        // Prepare the SQL statement
        $stmt = $this->conn->prepare("SELECT user_id, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 1)
        {
            $user = $result->fetch_assoc();
            // Verify the password
            if (password_verify($password, $user['password']))
            {
                $_SESSION['user_id'] = $user['user_id'];
                return true;
            }
        }
        return false;
    }
    // Function to check if a user is logged in
    public function isLoggedIn()
    {
        return isset($_SESSION['user_id']);
    }
    // Function to log the user out
    public function logout()
    {
        session_start();
        session_destroy();
    }
}
?>