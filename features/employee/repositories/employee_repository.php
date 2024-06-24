<?php

include_once "./core/config/connection.php";
include_once "./features/employee/models/employee_model.php";

class EmployeeRepository
{
    public static function fetchEmployees()
    {
        global $conn;
        $sql = "SELECT * FROM employee";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $employees = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $employee = new Employee($row['employee_id'], $row['employee_name'], $row['division_id'], $row['email'], $row['status']);
                $employees[] = $employee;
            }
            return $employees;
        } else {
            return [];
        }
    }

    public static function fetchEmployeeById($id)
    {
        global $conn;
        $sql = "SELECT * FROM employee WHERE employee_id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);

        if ($row) {
            $employee = new Employee($row['employee_id'], $row['employee_name'], $row['division_id'], $row['email'], $row['status']);
            return $employee;
        } else {
            return null;
        }
    }

    public static function insertEmployee($employee)
    {
        global $conn;
        $sql = "INSERT INTO employee (employee_name, division_id, email) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sis", $employee->getName(), $employee->getDivisionId(), $employee->getEmail());

        $result = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return $result;
    }

    public static function updateEmployee($employee)
    {
        global $conn;
        $sql = "UPDATE employee SET employee_name = ?, division_id = ?, email = ? WHERE employee_id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sisi", $employee->getName(), $employee->getDivisionId(), $employee->getEmail(), $employee->getId());

        $result = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return $result;
    }

    public static function deleteEmployee($id)
    {
        global $conn;
        $sql = "DELETE FROM employee WHERE employee_id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);

        $result = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return $result;
    }

    public static function updateEmployeeStatusAndActivity($qrCode)
    {
        $qrParts = explode('-', $qrCode);

        if (count($qrParts) === 3) {
            $employee_id = $qrParts[0];
            $email = $qrParts[1];
            $division_id = $qrParts[2];

            global $conn;
            $sql = "UPDATE employee SET status = 'present', last_activity = NOW() WHERE employee_id = ? AND email = ? AND division_id = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "isi", $employee_id, $email, $division_id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            return true;
        } else {
            return false;
        }
    }

    public static function resetStatus()
    {
        global $conn;
        $sql = "UPDATE employee 
                SET status = 'absent' 
                WHERE status = 'present'";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
}
