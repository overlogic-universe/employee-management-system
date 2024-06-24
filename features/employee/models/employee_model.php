<?php

class Employee
{
    private $employee_id;
    private $employee_name;
    private $division_id;
    private $email;
    private $status;

    public function __construct($employee_id, $employee_name, $division_id, $email, $status)
    {
        $this->employee_id = $employee_id;
        $this->employee_name = $employee_name;
        $this->division_id = $division_id;
        $this->email = $email;
        $this->status = $status;
    }

    public function getId()
    {
        return $this->employee_id;
    }

    public function getName()
    {
        return $this->employee_name;
    }

    public function setName($employee_name)
    {
        $this->employee_name = $employee_name;
    }

    public function getDivisionId()
    {
        return $this->division_id;
    }

    public function setDivisionId($division_id)
    {
        $this->division_id = $division_id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getStatus()
    {
        return $this->status;
    }


    public function setStatus($status)
    {
        $this->status = $status;
    }
}
