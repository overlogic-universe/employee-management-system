<?php

include_once "./core/render/view_rendered.php";
include_once "./core/config/connection.php";
include_once "./features/auth/repositories/auth_repository.php";

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
        $loginSuccessful = AuthRepository::isLoginValidated();

        if ($loginSuccessful) {
            header("Location: /dashboard");
            exit();
        } else {
            session_start();
            $_SESSION['error'] = "Invalid email or password";
            header("Location: /login");
            echo "<script>alert('Email or password is wrong')</script>";
        }
    }

    public static function logout()
    {
        session_start();
        session_destroy();
        header("Location: /login");
        exit();
    }
}
