<?php

include_once "./core/config/connection.php";
include_once "./features/employee/models/employee_model.php";
require_once './vendor/autoload.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

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
        $sql = "SELECT * FROM employee WHERE employee_id = $id";

        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

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
        $sql = "INSERT INTO employee (employee_name, division_id, email) VALUES ('{$employee->getName()}', {$employee->getDivisionId()}, '{$employee->getEmail()}')";
        $result = mysqli_query($conn, $sql);

        return $result;
    }

    public static function updateEmployee($employee)
    {
        global $conn;
        $sql = "UPDATE employee SET employee_name = '{$employee->getName()}', division_id = {$employee->getDivisionId()}, email = '{$employee->getEmail()}' WHERE employee_id = {$employee->getId()}";
        $result = mysqli_query($conn, $sql);

        return $result;
    }

    public static function deleteEmployee($id)
    {
        global $conn;
        $sql = "DELETE FROM employee WHERE employee_id = $id";

        $result = mysqli_query($conn, $sql);
        return $result;
    }

    public static function updateEmployeeStatusAndActivity($qrCode)
    {
        // format "employee_id-email-division_id"
        $qrParts = explode('-', $qrCode);

        if (count($qrParts) === 3) {
            $employee_id = $qrParts[0];
            $email = $qrParts[1];
            $division_id = $qrParts[2];

            global $conn;
            $sql = "UPDATE employee SET status = 'present', last_activity = NOW() WHERE employee_id = $employee_id AND email = '$email' AND division_id = $division_id";
            mysqli_query($conn, $sql);

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

    public static function sendQRCodeEmail($recipientEmail, $employeeId, $divisionId, $name)
    {
        $qrContent = "employee_{$employeeId}-{$recipientEmail}-{$divisionId}";
        $qrCode = "https://api.qrserver.com/v1/create-qr-code/?data=" . urlencode($qrContent) . "&size=150x150";
        $emailBody = '<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Attendance QR Code</title><style>body{font-family:\'Segoe UI\',Tahoma,Geneva,Verdana,sans-serif;background:linear-gradient(135deg,#041433 0%,#0a2a5e 100%);color:#fff;margin:0;padding:0;display:flex;justify-content:center;align-items:center;min-height:100vh}.container{max-width:600px;padding:40px;background:linear-gradient(45deg,rgba(255,255,255,0.1),rgba(255,255,255,0.2));border-radius:30px;box-shadow:0 8px 32px rgba(0,0,0,0.1);backdrop-filter:blur(10px);}h2{color:#7fdbff;text-align:center;margin-bottom:30px;font-size:28px;text-shadow:2px 2px 4px rgba(0,0,0,0.3)}p{text-align:center;line-height:1.6;margin-bottom:20px}.qr-code{text-align:center;margin-bottom:30px;padding:20px;background:linear-gradient(45deg,#0a2a5e,#1e3a6d);border-radius:20px;box-shadow:0 4px 15px rgba(0,0,0,0.2)}.qr-code img{max-width:100%;height:auto;border-radius:15px}.date{font-weight:700;color:#7fdbff}</style></head><body><div class="container"><h2>Welcome, ' . htmlspecialchars($name) . '!</h2><p>Here\'s your attendance QR code for <span class="date">' . htmlspecialchars(date('Y-m-d')) . '</span>:</p><div class="qr-code"><img src="' . $qrCode . '" alt="Attendance QR Code"></div><p>Scan this QR code to mark your attendance.</p></div></body></html>';

        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'overlogicuniverse@gmail.com';
            $mail->Password = 'vcntpnqwsjdxulhh';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Disable SSL verification for testing
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true,
                ),
            );

            //Recipients
            $mail->setFrom('overlogicuniverse@gmail.com', 'Overlogic');
            $mail->addAddress($recipientEmail, $name);

            //Content
            $mail->isHTML(true);
            $mail->Subject = 'Overlogic Presence QR Code - ' . htmlspecialchars(date('Y-m-d'));
            $mail->Body = $emailBody;

            $mail->send();
            echo 'Message has been sent to ' . $recipientEmail . '<br>';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}<br>";
        }
    }
}
