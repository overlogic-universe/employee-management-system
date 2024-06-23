<?php

include_once "./core/render/view_rendered.php";
include_once "./core/config/connection.php";

class EmployeeController
{

    public static function index()
    {
        global $conn;
        $employees = self::fetchEmployees($conn);
        return view("employee", "index", ['employees' => $employees]);
    }

    public static function employee()
    {
        global $conn;
        $employees = self::fetchEmployees($conn);
        return view("employee", "employee", ['employees' => $employees]);
    }

    public static function addEmployee()
    {
        global $conn;
        $divisions = self::fetchDivisions($conn);
        return view("employee", "add_employee", ['divisions' => $divisions]);
    }

    public static function addEmployeeProcess()
    {
        global $conn;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $employee_name = $_POST['employee_name'];
            $division_id = $_POST['division_id'];
            $email = $_POST['email'];

            if (!empty($employee_name) && !empty($division_id) && !empty($email)) {
                $sql = "INSERT INTO employee (employee_name, division_id, email) VALUES ('$employee_name', '$division_id', '$email')";
                $stmt = mysqli_prepare($conn, $sql);

                if (mysqli_stmt_execute($stmt)) {
                    echo "Employee added successfully.";
                } else {
                    echo "Error: " . mysqli_error($conn);
                }

                mysqli_stmt_close($stmt);
            } else {
                echo "All fields are required.";
            }
        }

        mysqli_close($conn);
    }

    public static function editEmployee()
    {
        return view("employee", "edit");
    }

    public static function permission()
    {
        return view("employee", "permission");
    }

    public static function fetchEmployees($conn)
    {
        $sql = "SELECT * FROM employee";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    public static function fetchDivisions($conn)
    {
        $sql = "SELECT * FROM division";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {
            return [];
        }
    }
}
