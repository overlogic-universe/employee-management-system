<?php

include_once "route.php";
include_once "./features/auth/controllers/auth_controller.php";
include_once "./features/employee/controllers/employee_controller.php";

Route::get('/', [AuthController::class, "index"]);
Route::get('/login', [AuthController::class, "login"]);

Route::get('/dashboard', [EmployeeController::class, "index"]);
Route::get('/employee', [EmployeeController::class, "employee"]);
Route::get('/edit-employee', [EmployeeController::class, "editEmployee"]);
Route::get('/add-employee', [EmployeeController::class, "addEmployee"]);
Route::get('/permission', [EmployeeController::class, "permission"]);
