<?php

include_once "./core/render/view_rendered.php";

class AuthController
{

    public static function index()
    {
        return view("auth", "index");
    }

    public static function login(){
        return view("auth", "login");
    }

    public static function loginProcess()
    {
        // Memeriksa apakah form telah disubmit
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            include_once "./core/config/connection.php";

            $email = $_POST['email'];
            $password = $_POST['password'];

            // Lakukan sanitasi data (penting untuk keamanan)
            $email = mysqli_real_escape_string($conn, $email);
            $password = mysqli_real_escape_string($conn, $password);

            // Query SQL untuk memeriksa apakah email dan password cocok
            $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Login berhasil, redirect ke halaman dashboard atau halaman selanjutnya
                header("Location: dashboard.php");
                exit();
            } else {
                // Login gagal
                echo "Invalid email or password";
            }
        }

        $conn->close();
    }
}
