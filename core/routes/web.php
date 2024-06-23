<?php

include_once "route.php";
include_once "./core/middleware/auth_middleware.php";
include_once "./features/auth/controllers/auth_controller.php";
include_once "./features/employee/controllers/employee_controller.php";

// Authentication routes
Route::get('/', [AuthController::class, "index"]);
Route::get('/login', [AuthController::class, "login"]);
Route::post('/login-process', [AuthController::class, "loginProcess"]);
Route::get('/logout', [AuthController::class, "logout"]);

// Employee routes
Route::middleware('')->group(function () {
    Route::get('/dashboard', [EmployeeController::class, "index"]);
    Route::get('/employee', [EmployeeController::class, "employee"]);
    Route::get('/edit-employee', [EmployeeController::class, "editEmployee"]);
    Route::get('/add-employee', [EmployeeController::class, "addEmployee"]);
    Route::post('/add-employee-process', [EmployeeController::class, "addEmployeeProcess"]);
    Route::get('/permission', [EmployeeController::class, "permission"]);
});
