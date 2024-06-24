<?php

class Employee
{
    private $employee_id;
    private $employee_name;
    private $division_id;
    private $email;
    private $status;

    // Constructor untuk inisialisasi objek Employee
    public function __construct($employee_id, $employee_name, $division_id, $email, $status)
    {
        $this->employee_id = $employee_id;
        $this->employee_name = $employee_name;
        $this->division_id = $division_id;
        $this->email = $email;
        $this->status = $status;
    }

    // Getter untuk mendapatkan ID karyawan
    public function getId()
    {
        return $this->employee_id;
    }

    // Getter untuk mendapatkan nama karyawan
    public function getName()
    {
        return $this->employee_name;
    }

    // Setter untuk mengubah nama karyawan
    public function setName($employee_name)
    {
        $this->employee_name = $employee_name;
    }

    // Getter untuk mendapatkan ID divisi
    public function getDivisionId()
    {
        return $this->division_id;
    }

    // Setter untuk mengubah ID divisi
    public function setDivisionId($division_id)
    {
        $this->division_id = $division_id;
    }

    // Getter untuk mendapatkan email karyawan
    public function getEmail()
    {
        return $this->email;
    }

    // Setter untuk mengubah email karyawan
    public function setEmail($email)
    {
        $this->email = $email;
    }

    // Getter untuk mendapatkan status karyawan
    public function getStatus()
    {
        return $this->status;
    }


    // Setter untuk mengubah status karyawan
    public function setStatus($status)
    {
        $this->status = $status;
    }
}
