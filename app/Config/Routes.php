<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/search', 'Home::searchPosts');

$routes->get('/berita/', 'Postingan::berita');
$routes->get('/berita/(:any)', 'Postingan::detail/$1');

$routes->get('/pengumuman/', 'Postingan::pengumuman');
$routes->get('/pengumuman/(:any)', 'Postingan::detail/$1');

$routes->get('/pengajian/', 'Postingan::pengajian');
$routes->get('/pengajian/(:any)', 'Postingan::detail/$1');

$routes->get('/kegiatan/', 'Postingan::kegiatan');
$routes->get('/kegiatan/(:any)', 'Postingan::detail/$1');


$routes->group('admin', ['filter' => 'role:dev,admin,superadmin'], function ($routes) {
	$routes->get('dashboard', 'Admin\Dashboard::index');
	$routes->get('profile', 'Admin\Profile::index');
	$routes->get('kepengurusan', 'Admin\Kepengurusan::index');
	$routes->get('kontak', 'Admin\Kontak::index');
	$routes->get('galeri', 'Admin\Galeri::index');
	$routes->get('keuangan', 'Admin\Keuangan::index');
	$routes->get('banner', 'Admin\Banner::index');

	$routes->get('postingan/tambahpostingan', 'Admin\Postingan::tambahPostingan');
	$routes->get('postingan/editpost/(:segment)', 'Admin\Postingan::editPost/$1');

	$routes->get('postingan/berita', 'Admin\Postingan::berita');
	$routes->get('postingan/pengumuman', 'Admin\Postingan::pengumuman');
	$routes->get('postingan/pengajian', 'Admin\Postingan::pengajian');
	$routes->get('postingan/kegiatan', 'Admin\Postingan::kegiatan');

	$routes->delete('postingan/(:num)', 'Admin\Postingan::deletePost/$1');

	$routes->delete('keuangan/', 'Admin\Keuangan::deleteKeuangan');

	$routes->delete('kepengurusan/', 'Admin\Kepengurusan::deleteKepengurusan');

	$routes->delete('kontak/', 'Admin\Kontak::deleteKontak');

	$routes->delete('galeri/', 'Admin\Galeri::deleteGaleri');

	$routes->delete('banner/', 'Admin\Banner::deleteBanner');
});

$routes->group('admin', ['filter' => 'role:dev,superadmin'], function ($routes) {
	$routes->get('user-management', 'Admin\User::index');
	$routes->get('user-management/(:num)', 'Admin\User::show/$1');
	$routes->put('user-management', 'Admin\User::update');
});

/**
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
