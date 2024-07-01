<?php

include_once "route.php";
include_once "./core/middleware/auth_middleware.php";
include_once "./features/auth/controllers/auth_controller.php";
include_once "./features/employee/controllers/employee_controller.php";
include_once "./features/division/controllers/division_controller.php";

// Authentication routes
Route::get('/', [AuthController::class, "index"]);
Route::get('/login', [AuthController::class, "login"]);
Route::post('/login-process', [AuthController::class, "loginProcess"]);
Route::get('/logout', [AuthController::class, "logout"]);

// Employee routes
Route::middleware('')->group(function () {
    Route::get('/dashboard', [EmployeeController::class, "index"]);
    Route::get('/employee', [EmployeeController::class, "employee"]);
    Route::get('/edit-employee/{id}', [EmployeeController::class, "editEmployee"]);
    Route::post('/edit-employee-process', [EmployeeController::class, "editEmployeeProcess"]);
    Route::get('/add-employee', [EmployeeController::class, "addEmployee"]);
    Route::post('/add-employee-process', [EmployeeController::class, "addEmployeeProcess"]);
    Route::post('/delete-employee-process/{id}', [EmployeeController::class, "deleteEmployeeProcess"]);
    Route::get('/division', [DivisionController::class, "division"]);
    Route::get('/edit-division/{id}', [DivisionController::class, "editDivision"]);
    Route::post('/edit-division-process', [DivisionController::class, "editDivisionProcess"]);
    Route::get('/add-division', [DivisionController::class, "addDivision"]);
    Route::post('/add-division-process', [DivisionController::class, "addDivisionProcess"]);
    Route::post('/delete-division-process/{id}', [DivisionController::class, "deleteDivisionProcess"]);
    Route::get('/permission', [EmployeeController::class, "permission"]);
    Route::get('/scan', [EmployeeController::class, "scan"]);
    Route::post('/scan-process', [EmployeeController::class, "scanProcess"]);
    Route::post('/reset-status-process', [EmployeeController::class, "resetStatusProcess"]);
    Route::post('/send-qr-code-process', [EmployeeController::class, "sendQRCodeEmailProcess"]);
});
