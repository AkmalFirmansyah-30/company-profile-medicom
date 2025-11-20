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
$routes->get('/', 'MainUsers::index');
$routes->get('/prestasi', 'MainUsers::prestasi');
$routes->get('/about', 'MainUsers::about');
$routes->get('/quiz', 'MainUsers::quiz');
$routes->get('quiz/start', 'MainUsers::startQuiz');
$routes->get('/pengurus', 'MainUsers::pengurus');
$routes->get('/laporan', 'MainUsers::laporan');

$routes->get('/login', 'AuthController::index');
$routes->post('/login/process', 'AuthController::loginProcess');
$routes->get('/logout', 'AuthController::logout');

# ====== ADMIN =========================
$routes->group('admin', ['filter' => 'auth'], function($routes) {
    
    // --- BERANDA PAGE ---
    $routes->get('/', 'Admin::index'); // Default
    $routes->get('hero', 'Admin::hero');
    $routes->get('partners', 'Admin::partners');
    $routes->get('programs', 'Admin::programs');
    $routes->get('achievements', 'Admin::achievements');
    $routes->get('divisions', 'Admin::divisions');
    $routes->get('gallery', 'Admin::gallery');

    $routes->post('updateHero', 'Admin::updateHero');
    
    $routes->post('addPartner', 'Admin::addPartner');
    $routes->get('deletePartner/(:num)', 'Admin::deletePartner/$1');
    
    $routes->post('addProgram', 'Admin::addProgram');
    $routes->get('deleteProgram/(:num)', 'Admin::deleteProgram/$1');

    $routes->post('addAchievement', 'Admin::addAchievement');
    $routes->get('deleteAchievement/(:num)', 'Admin::deleteAchievement/$1');
    
    $routes->post('addDivision', 'Admin::addDivision');
    $routes->get('deleteDivision/(:num)', 'Admin::deleteDivision/$1');

    $routes->post('addGallery', 'Admin::addGallery');
    $routes->get('deleteGallery/(:num)', 'Admin::deleteGallery/$1');
    $routes->post('gallery/update', 'Admin::updateGallery');

    // ==== ABOUT PAGE ====
    $routes->get('about', 'Admin::about');
    $routes->post('updateAbout', 'Admin::updateAbout');
    $routes->post('addObjective', 'Admin::addObjective');
    $routes->get('deleteObjective/(:num)', 'Admin::deleteObjective/$1');

    // ==== PRESTASI PAGE (HEADER AJA CUY)====
    $routes->get('prestasiPage', 'Admin::prestasiPage');
    $routes->post('updatePrestasiPage', 'Admin::updatePrestasiPage');
    
    // ==== PENGURUS PAGE ====
    $routes->get('pengurus', 'Admin::pengurus');
    $routes->post('addMember', 'Admin::addMember');
    $routes->get('deleteMember/(:num)', 'Admin::deleteMember/$1');
    
    // ==== LAPORAN PAGE ====
    $routes->get('laporan', 'Admin::laporan');
    $routes->post('updateLaporan', 'Admin::updateLaporan');
});