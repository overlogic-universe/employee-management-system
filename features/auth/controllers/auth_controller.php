<?php

include_once "./core/render/view_rendered.php";

class AuthController
{

    public static function index()
    {
        session_start();
        if (isset($_SESSION['email'])) {
            header("Location: /dashboard");
            exit();
        }

        return view("auth", "index");
    }

    public static function login()
    {
        session_start();
        if (isset($_SESSION['email'])) {
            header("Location: /dashboard");
            exit();
        }

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

            // Hash the password before comparison if you are using hashed passwords
            // $password = md5($password); // or password_hash($password, PASSWORD_BCRYPT)

            // Query SQL untuk memeriksa apakah email dan password cocok
            $sql = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Start session and store user information
                session_start();
                $_SESSION['email'] = $email;

                // Login berhasil, redirect ke halaman dashboard atau halaman selanjutnya
                header("Location: /dashboard");
                exit();
            } else {
                // Login gagal, set session jadi erro
                session_start();
                $_SESSION['error'] = "Invalid email or password";
                header("Location: /login");
            }
        }
        $conn->close();
    }

    public static function logout()
    {
        session_start();
        session_destroy();
        header("Location: /login");
        exit();
    }
}
