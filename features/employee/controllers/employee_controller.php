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
        $divisions = DivisionRepository::fetchDivisions();
        return view("employee", "index", ['employees' => $employees, 'divisions' => $divisions]);
    }

    public static function employee()
    {
        $employees = EmployeeRepository::fetchEmployees();
        $divisions = DivisionRepository::fetchDivisions();
        return view("employee", "employee", ['employees' => $employees, 'divisions' => $divisions]);
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

            if (!empty($employee_name) && !empty($division_id) && !empty($email)) {
                $employee = new Employee($employee_id, $employee_name, $division_id, $email, null);
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

    public static function deleteEmployeeProcess($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (EmployeeRepository::deleteEmployee($id)) {
                header("Location: /employee");
            } else {
                echo "Error: Unable to delete employee.";
            }
        }
    }

    public static function permission()
    {
        return view("employee", "permission");
    }

    public static function scan()
    {
        return view("employee", "scan");
    }

    public static function scanProcess()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents('php://input'), true);

            $qrCode = $data['qrCode'];

            $updateResult = EmployeeRepository::updateEmployeeStatusAndActivity($qrCode);

            if ($updateResult) {
                echo json_encode(['valid' => true]);
            } else {
                echo json_encode(['valid' => false, 'error' => 'Failed to update employee status']);
            }
        }
    }

    public static function resetStatusProcess()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (EmployeeRepository::resetStatus()) {
                header('Location: /dashboard');
                exit();
            } else {
                echo "Error: Unable to delete employee.";
            }
        }
    }

    public static function sendQRCodeEmailProcess()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $employees = EmployeeRepository::fetchEmployees();
            foreach ($employees as $employee) {
                EmployeeRepository::sendQRCodeEmail($employee->getEmail(), $employee->getId(), $employee->getDivisionId(), $employee->getName());
            }
            header("Location: /dashboard");
            exit();
        }
    }
}
