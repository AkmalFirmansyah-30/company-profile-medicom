<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/prestasi', 'Home::prestasi');
$routes->get('/about', 'Home::about');
$routes->get('/quiz', 'Home::quiz');
$routes->get('quiz/start', 'Home::startQuiz');
$routes->get('/pengurus', 'Home::pengurus');
$routes->get('/laporan', 'Home::laporan');