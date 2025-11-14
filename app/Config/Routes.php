<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
# ====== USER ==========================
$routes->get('/', 'Home::index');
$routes->get('/prestasi', 'Home::prestasi');
$routes->get('/about', 'Home::about');
$routes->get('/quiz', 'Home::quiz');
$routes->get('quiz/start', 'Home::startQuiz');
$routes->get('/pengurus', 'Home::pengurus');
$routes->get('/laporan', 'Home::laporan');

# ====== ADMIN =========================
$routes->get('/admin', 'Admin::index');
$routes->post('/admin/updateHero', 'Admin::updateHero');
$routes->post('/admin/addAchievement', 'Admin::addAchievement');
$routes->post('/admin/addGallery', 'Admin::addGallery');
$routes->get('/admin/deleteAchievement/(:num)', 'Admin::deleteAchievement/$1');
$routes->get('/admin/deleteGallery/(:num)', 'Admin::deleteGallery/$1');
$routes->post('/admin/addDivision', 'Admin::addDivision');
$routes->get('/admin/deleteDivision/(:num)', 'Admin::deleteDivision/$1');