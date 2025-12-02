<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

# ============================================
#                 USER ROUTES
# ============================================

// Halaman umum
$routes->get('/', 'MainUsers::index');
$routes->get('/prestasi', 'MainUsers::prestasi');
$routes->get('/about', 'MainUsers::about');
$routes->get('/pengurus', 'MainUsers::pengurus');
$routes->get('/laporan', 'MainUsers::laporan');

// Program kerja
$routes->get('/program-kerja/1', 'MainUsers::proker1');
$routes->get('/program-kerja/2', 'MainUsers::proker2');
$routes->get('/program-kerja/3', 'MainUsers::proker3');

# ============================================
#                 QUIZ ROUTES
# ============================================

// Halaman daftar divisi kuis
$routes->get('/quiz', 'QuizController::quiz');

// Tombol mulai
$routes->get('/quiz/start', 'QuizController::startQuiz');

// Isi data peserta
$routes->get('/quiz/isidata', 'QuizController::isiDataQuiz');
$routes->post('/quiz/isidata', 'QuizController::saveDataQuiz');

// Mulai proses kuis
$routes->post('/quiz/start-process', 'QuizController::startQuizProcess');

// Redirect default pertanyaan → ke nomor 1
$routes->get('/quiz/pertanyaan', fn() => redirect()->to('/quiz/pertanyaan/1'));

// Proses jawaban pertanyaan N
$routes->post('/quiz/jawab/(:num)', 'QuizController::prosesJawaban/$1');

// Hasil kuis
$routes->post('/quiz/result', 'QuizController::hasilQuiz');

# ============================================
#                 AUTH ROUTES
# ============================================
$routes->get('/login', 'AuthController::index');
$routes->post('/login/process', 'AuthController::loginProcess');
$routes->get('/logout', 'AuthController::logout');

# ============================================
#                 ADMIN ROUTES
# ============================================
$routes->group('admin', ['filter' => 'auth'], function($routes) {

    // Dashboard
    $routes->get('/', 'Admin::index');

    // Beranda editor
    $routes->get('hero', 'Admin::hero');
    $routes->post('updateHero', 'Admin::updateHero');

    $routes->get('partners', 'Admin::partners');
    $routes->post('addPartner', 'Admin::addPartner');
    $routes->get('deletePartner/(:num)', 'Admin::deletePartner/$1');

    $routes->get('programs', 'Admin::programs');
    $routes->post('addProgram', 'Admin::addProgram');
    $routes->get('deleteProgram/(:num)', 'Admin::deleteProgram/$1');

    $routes->get('achievements', 'Admin::achievements');
    $routes->post('addAchievement', 'Admin::addAchievement');
    $routes->get('deleteAchievement/(:num)', 'Admin::deleteAchievement/$1');

    $routes->get('divisions', 'Admin::divisions');
    $routes->post('addDivision', 'Admin::addDivision');
    $routes->get('deleteDivision/(:num)', 'Admin::deleteDivision/$1');

    $routes->get('gallery', 'Admin::gallery');
    $routes->post('addGallery', 'Admin::addGallery');
    $routes->get('deleteGallery/(:num)', 'Admin::deleteGallery/$1');
    $routes->post('gallery/update', 'Admin::updateGallery');

    // About Page
    $routes->get('about', 'Admin::about');
    $routes->post('updateAbout', 'Admin::updateAbout');
    $routes->post('addObjective', 'Admin::addObjective');
    $routes->get('deleteObjective/(:num)', 'Admin::deleteObjective/$1');

    // Prestasi Page
    $routes->get('prestasiPage', 'Admin::prestasiPage');
    $routes->post('updatePrestasiPage', 'Admin::updatePrestasiPage');

    // Pengurus
    $routes->get('pengurus', 'Admin::pengurus');
    $routes->post('addMember', 'Admin::addMember');
    $routes->get('deleteMember/(:num)', 'Admin::deleteMember/$1');

    // Laporan
    $routes->get('laporan', 'Admin::laporan');
    $routes->post('updateLaporan', 'Admin::updateLaporan');
});
