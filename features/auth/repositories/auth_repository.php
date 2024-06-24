<?php
include_once "./core/config/connection.php";

class AuthRepository
{
    public static function isLoginValidated()
    {
        global $conn;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Sanitize input
            $email = mysqli_real_escape_string($conn, $email);
            $password = mysqli_real_escape_string($conn, $password);

            // Query SQL untuk memeriksa apakah email dan password cocok
            $sql = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Start session and store admin information
                session_start();
                $_SESSION['email'] = $email;
                return true;
            } else {
                return false;
            }
        }
    }
}
