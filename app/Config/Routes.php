<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Authentication');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */
// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('auth', 'Auth::index');
// Data Kelas
$routes->post('process', 'Authentication::loginproses');
$routes->get('registrasi', 'admin\Siswa::registrasi');
$routes->post('registrasi', 'admin\Siswa::save');
// $routes->get('registrasi', 'admin\Siswa::get');

//Dashboar Administrasi
$routes->group('admin', function ($routes) {
    $routes->get('', 'home::index');
    $routes->get('siswa', 'admin\Siswa::index');
    $routes->get('kelas', 'admin\Kelas::index');
    $routes->get('kelas/add', 'admin\Kelas::create');
    $routes->post('kelas', 'admin\Kelas::save');
    $routes->put('kelas', 'admin\Kelas::edit');
    $routes->get('programkursus', 'admin\Programkursus::index');
    $routes->get('programkursus/add', 'admin\ProgramKursus::create');
    $routes->post('programkursus', 'admin\Programkursus::save');
    $routes->put('programkursus', 'admin\Programkursus::edit');
    
    
    $routes->get('instruktur', 'admin\instruktur::index');
    $routes->get('instruktur/add', 'admin\instruktur::create');
    $routes->post('instruktur', 'admin\instruktur::save');
    $routes->put('instruktur', 'admin\instruktur::edit');
    
    $routes->get('detailkelas', 'admin\detailkelas::index');
    $routes->get('detailkelas/add', 'admin\detailkelas::create');
    $routes->post('detailkelas', 'admin\detailkelas::save');
    $routes->put('detailkelas', 'admin\detailkelas::edit');
    
    $routes->get('alumni', 'admin/Alumni::index');
    $routes->get('alumni/add', 'admin/Alumni::create');
    $routes->post('alumni', 'admin/Alumni::save');
});

// Instruktur
$routes->group('instruktur', function ($routes) {
    $routes->get('', 'admin\home::index');
    $routes->get('absen', 'instruktur\Absen::index');
    $routes->get('laporan', 'instruktur\Laporan::index');
});

//Siswa
$routes->group('siswa', function ($routes) {
    $routes->get('', 'Home::index');
    $routes->get('biodata', 'siswa\Biodata::index');
    $routes->get('biodata/get', 'siswa\Biodata::read');
    $routes->post('biodata/post', 'Biodata::save');
    
    $routes->get('daftar', 'siswa\Daftar::index');
    $routes->get('daftar/read', 'siswa\Daftar::read');
    $routes->post('daftar/post', 'siswa\Daftar::post');
    
    $routes->get('absen', 'siswa\Absen::index');
    $routes->get('absen/read', 'siswa\Absen::read');
    $routes->post('absen/post', 'siswa\Absen::post');
});

// Login
// $routes->get('login', 'Auth::login');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}