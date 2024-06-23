<?php

class AuthMiddleware
{
    public static function checkLogin()
    {
        session_start();
        if (!isset($_SESSION['email'])) {
            header('Location: /login'); // Redirect ke halaman login jika belum login
            exit();
        }
        return true;
    }
}
