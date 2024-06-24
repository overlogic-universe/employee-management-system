<?php

class Division
{
    private $division_id;
    private $division_name;

    public function __construct($division_id, $division_name)
    {
        $this->division_id = $division_id;
        $this->division_name = $division_name;
    }

    public function getId()
    {
        return $this->division_id;
    }

    public function getName()
    {
        return $this->division_name;
    }

    public function setName($division_name)
    {
        $this->division_name = $division_name;
    }
}
