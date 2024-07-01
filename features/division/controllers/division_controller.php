<?php

include_once "./core/render/view_rendered.php";
include_once "./core/config/connection.php";
include_once "./features/employee/models/division_model.php";
include_once "./features/employee/repositories/division_repository.php";

class DivisionController
{

    public static function division()
    {
        $divisions = DivisionRepository::fetchDivisions();
        return view("division", "division", ['divisions' => $divisions]);
    }

    public static function addDivision()
    {
        $divisions = DivisionRepository::fetchDivisions();
        return view("division", "add_division", ['divisions' => $divisions]);
    }

    public static function addDivisionProcess()
    {
        global $conn;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $division_name = $_POST['division_name'];

            if (!empty($division_name)) {
                $division = new Division(null, $division_name);
                if (DivisionRepository::insertDivision($division)) {
                    header("Location: /division");
                } else {
                    echo "Error: Unable to add division.";
                }
            } else {
                echo "All fields are required.";
            }
        }

        mysqli_close($conn);
    }

    public static function editDivision($id)
    {
        $division = DivisionRepository::fetchDivisionById($id);
        return view("division", "edit", ['division' => $division]);
    }

    public static function editDivisionProcess()
    {
        global $conn;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $division_id = $_POST['division_id'];
            $division_name = $_POST['division_name'];

            if (!empty($division_name) && !empty($division_id)) {
                $division = new Division($division_id, $division_name);
                if (DivisionRepository::updateDivision($division)) {
                    header("Location: /division");
                } else {
                    echo "Error: Unable to update division.";
                }
            } else {
                echo "All fields are required.";
            }
        }

        mysqli_close($conn);
    }

    public static function deleteDivisionProcess($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (DivisionRepository::deleteDivision($id)) {
                header("Location: /division");
            } else {
                echo "Error: Unable to delete division.";
            }
        }
    }
}
