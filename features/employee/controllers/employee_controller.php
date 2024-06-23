<?php

include_once "./core/render/view_rendered.php";

class EmployeeController
{

    public static function index()
    {
        return view("employee", "index");
    }

    public static function employee()
    {
        return view("employee", "employee");
    }

    public static function addEmployee()
    {
        return view("employee", "add_employee");
    }

    public static function editEmployee()
    {
        return view("employee", "edit");
    }

    public static function permission()
    {
        return view("employee", "permission");
    }

    public static function logout()
    {
    }
}
