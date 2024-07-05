<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('check-db', function() {
    try {
        $db = \Config\Database::connect();
        $db->initialize();
        echo "Koneksi Database berhasil.";
    } catch (\Throwable $e) {
        echo "Koneksi Database gagal: " . $e->getMessage();
    }
});

$routes->get('create/class', function() {
    $classModel = new App\Models\Classes;
    $resp = $classModel->insert([
        "name" => "Class A"
    ]);

    var_dump("Class ID: {$resp}");
});

$routes->get('create/student', function() {
    $studentModel = new App\Models\Student;
    $resp = $studentModel->insert([
        "class_id" => 1,
        "name" => "Budi"
    ]);

    var_dump("Student ID: {$resp}");
});

$routes->post('/create/teacher', 'TeacherController::createTeacher');
$routes->get('/get/teacher', 'TeacherController::getTeachers');
$routes->get('/all-class-teacher', 'TeacherController::getAllClassTeacher');
$routes->get('/get-class-teacher/(:segment)', 'TeacherController::getClassTeacher/$1');
