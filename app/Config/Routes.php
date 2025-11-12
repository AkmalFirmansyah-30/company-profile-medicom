<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Route darurat untuk reset password admin
// $routes->get('/reset-admin', function() {
//     $db = \Config\Database::connect();
    
//     // 1. Kita buat hash baru menggunakan PHP Anda sendiri
//     $passwordBaru = password_hash('admin123', PASSWORD_DEFAULT);
    
//     // 2. Update database
//     $db->query("UPDATE cms_users SET password = '$passwordBaru' WHERE username = 'admin'");
    
//     return "Berhasil! Password user 'admin' telah direset menjadi 'admin123'. <br>Hash baru: " . $passwordBaru . "<br><a href='/login'>Klik disini untuk Login</a>";
// });

# ====== USER ==========================
$routes->get('/', 'Home::index');
$routes->get('/prestasi', 'Home::prestasi');
$routes->get('/about', 'Home::about');
$routes->get('/quiz', 'Home::quiz');
$routes->get('quiz/start', 'Home::startQuiz');
$routes->get('/pengurus', 'Home::pengurus');
$routes->get('/laporan', 'Home::laporan');

$routes->get('/login', 'AuthController::index');
$routes->post('/login/process', 'AuthController::loginProcess');
$routes->get('/logout', 'AuthController::logout');

# ====== ADMIN =========================
$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Admin::index');
    $routes->post('updateHero', 'Admin::updateHero');
    $routes->post('addAchievement', 'Admin::addAchievement');
    $routes->post('addGallery', 'Admin::addGallery');
    $routes->get('deleteAchievement/(:num)', 'Admin::deleteAchievement/$1');
    $routes->get('deleteGallery/(:num)', 'Admin::deleteGallery/$1');
    $routes->post('addDivision', 'Admin::addDivision');
    $routes->get('deleteDivision/(:num)', 'Admin::deleteDivision/$1');
    $routes->post('addProgram', 'Admin::addProgram');
    $routes->get('deleteProgram/(:num)', 'Admin::deleteProgram/$1');
});