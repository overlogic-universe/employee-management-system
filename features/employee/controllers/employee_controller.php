<?php

include_once "./core/render/view_rendered.php";
include_once "./core/config/connection.php";
include_once "./features/employee/models/employee_model.php";
include_once "./features/employee/repositories/employee_repository.php";
include_once "./features/employee/repositories/division_repository.php";

class EmployeeController
{
    public static function index()
    {
        $employees = EmployeeRepository::fetchEmployees();
        return view("employee", "index", ['employees' => $employees]);
    }

    public static function employee()
    {
        $employees = EmployeeRepository::fetchEmployees();
        return view("employee", "employee", ['employees' => $employees]);
    }

    public static function addEmployee()
    {
        $divisions = DivisionRepository::fetchDivisions();
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
                $employee = new Employee(null, $employee_name, $division_id, $email, null);
                if (EmployeeRepository::insertEmployee($employee)) {
                    header("Location: /employee");
                } else {
                    echo "Error: Unable to add employee.";
                }
            } else {
                echo "All fields are required.";
            }
        }

        mysqli_close($conn);
    }

    public static function editEmployee($id)
    {
        global $conn;
        $employee = EmployeeRepository::fetchEmployeeById($id);
        $divisions = DivisionRepository::fetchDivisions();
        return view("employee", "edit", ['employee' => $employee, 'divisions' => $divisions]);
    }

    public static function editEmployeeProcess()
    {
        global $conn;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $employee_id = $_POST['employee_id'];
            $employee_name = $_POST['employee_name'];
            $division_id = $_POST['division_id'];
            $email = $_POST['email'];
            $status = $_POST['status']; // tambahkan pengambilan status

            if (!empty($employee_name) && !empty($division_id) && !empty($email) && !empty($status)) {
                $employee = new Employee($employee_id, $employee_name, $division_id, $email, $status);
                if (EmployeeRepository::updateEmployee($employee)) {
                    header("Location: /employee");
                } else {
                    echo "Error: Unable to update employee.";
                }
            } else {
                echo "All fields are required.";
            }
        }

        mysqli_close($conn);
    }

    public static function permission()
    {
        return view("employee", "permission");
    }
}
