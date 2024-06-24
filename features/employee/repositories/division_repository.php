<?php

include_once "./core/config/connection.php";
include_once "./features/employee/models/division_model.php";

class DivisionRepository
{
    public static function fetchDivisions()
    {
        global $conn;
        $sql = "SELECT * FROM division";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $divisions = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $divisions[] = new Division($row['division_id'], $row['division_name']);
            }
            return $divisions;
        } else {
            return [];
        }
    }

    public static function fetchDivisionById($id)
    {
        global $conn;
        $sql = "SELECT * FROM division WHERE division_id = $id";
        $result = mysqli_query($conn, $sql);

        $row = mysqli_fetch_assoc($result);

        if ($row) {
            return new Division($row['division_id'], $row['division_name']);
        } else {
            return null;
        }
    }
}
