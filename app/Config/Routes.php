<?php

namespace Config;

$routes = Services::routes();

if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

$routes->group('user', ['filter' =>  'not_auth_user_filter'],       function ($routes) {
    $routes->get('',                        'UserDashboard::index',                                     ['as' => 'dashboard-user']);
    $routes->get('profile/(:any)',          'UserKelolaProfile::editIndex/$1',                          ['as' => 'users-edit-profile']);
    $routes->put('profile/(:any)',          'UserKelolaProfile::update/$1',                             ['as' => 'users-update-profile']);
    $routes->group('tr-kost', function ($routes) {
        $routes->get('',                    'UserTransaksiKost::index',                                 ['as' => 'tr-kost-user']);
        $routes->get('(:any)',              'UserTransaksiKost::indexDetailTransaksi/$1',               ['as' => 'tr-kost-user-detail']);
        $routes->post('',                   'UserTransaksiKost::store',                                 ['as' => 'tr-kost-store-user']);
        $routes->put('(:any)',              'UserTransaksiKost::updateBuktiPembayaran/$1',              ['as' => 'tr-kost-update-bukti-user']);
    });
    $routes->group('tr-catering', function ($routes) {
        $routes->get('',                    'UserTransaksiCatering::index',                             ['as' => 'tr-catering-user']);
        $routes->get('(:any)',              'UserTransaksiCatering::indexDetailTransaksi/$1',           ['as' => 'tr-catering-user-detail']);
        $routes->post('',                   'UserTransaksiCatering::store',                             ['as' => 'tr-catering-store-user']);
        $routes->put('(:any)',              'UserTransaksiCatering::updateBuktiPembayaran/$1',          ['as' => 'tr-catering-update-bukti-user']);
    });
    $routes->group('tr-cs', function ($routes) {
        $routes->get('',                    'UserTransaksiCS::index',                                   ['as' => 'tr-cs-user']);
        $routes->get('(:any)',              'UserTransaksiCS::indexDetailTransaksi/$1',                 ['as' => 'tr-cs-user-detail']);
        $routes->post('',                   'UserTransaksiCS::store',                                   ['as' => 'tr-cs-store-user']);
        $routes->put('(:any)',              'UserTransaksiCS::updateBuktiPembayaran/$1',                ['as' => 'tr-cs-update-bukti-user']);
    });
    $routes->group('tr-laundry', function ($routes) {
        $routes->get('',                    'UserTransaksiLaundry::index',                                   ['as' => 'tr-laundry-user']);
        $routes->get('(:any)',              'UserTransaksiLaundry::indexDetailTransaksi/$1',                 ['as' => 'tr-laundry-user-detail']);
        $routes->post('',                   'UserTransaksiLaundry::store',                                   ['as' => 'tr-laundry-store-user']);
        $routes->put('(:any)',              'UserTransaksiLaundry::updateBuktiPembayaran/$1',                ['as' => 'tr-laundry-update-bukti-user']);
    });
});

// ================>> <<||>>

$routes->group('admin', ['filter' => 'not_auth_admin_filter'],  function ($routes) {
    $routes->get('',                        'AdminDashboard::index',                                    ['as' => 'dashboard-admin']);

    $routes->group('users', function ($routes) {
        $routes->get('',                    'AdminKelolaUser::index',                                   ['as' => 'users-admin']);
        $routes->get('add',                 'AdminKelolaUser::storeIndex',                              ['as' => 'users-store-index-admin']);
        $routes->get('(:any)',              'AdminKelolaUser::editIndex/$1',                            ['as' => 'users-edit-index-admin']);
        $routes->post('',                   'AdminKelolaUser::store',                                   ['as' => 'users-store-admin']);
        $routes->put('(:any)',              'AdminKelolaUser::update/$1',                               ['as' => 'users-update-admin']);
        $routes->delete('(:any)',           'AdminKelolaUser::delete/$1',                               ['as' => 'users-delete-admin']);
    });

    $routes->group('kost', function ($routes) {
        $routes->get('',                    'AdminKelolaKost::index',                                   ['as' => 'kost-admin']);
        $routes->get('add',                 'AdminKelolaKost::addIndex',                                ['as' => 'kost-add-index-admin']);
        $routes->get('(:any)',              'AdminKelolaKost::editIndex/$1',                            ['as' => 'kost-edit-index-admin']);
        $routes->post('',                   'AdminKelolaKost::store',                                   ['as' => 'kost-store-admin']);
        $routes->put('(:any)',              'AdminKelolaKost::update/$1',                               ['as' => 'kost-update-admin']);
        $routes->delete('(:any)',           'AdminKelolaKost::delete/$1',                               ['as' => 'kost-delete-admin']);
    });

    $routes->group('catering', function ($routes) {
        $routes->get('',                    'AdminKelolaCatering::index',                               ['as' => 'catering-admin']);
        $routes->get('add',                 'AdminKelolaCatering::addIndex',                            ['as' => 'catering-add-index-admin']);
        $routes->get('(:any)',              'AdminKelolaCatering::editIndex/$1',                        ['as' => 'catering-edit-index-admin']);
        $routes->post('',                   'AdminKelolaCatering::store',                               ['as' => 'catering-store-admin']);
        $routes->put('(:any)',              'AdminKelolaCatering::update/$1',                           ['as' => 'catering-update-admin']);
        $routes->delete('(:any)',           'AdminKelolaCatering::delete/$1',                           ['as' => 'catering-delete-admin']);
    });

    $routes->group('cs', function ($routes) {
        $routes->get('',                    'AdminKelolaCS::index',                                     ['as' => 'cs-admin']);
        $routes->get('add',                 'AdminKelolaCS::addIndex',                                  ['as' => 'cs-add-index-admin']);
        $routes->get('(:any)',              'AdminKelolaCS::editIndex/$1',                              ['as' => 'cs-edit-index-admin']);
        $routes->post('',                   'AdminKelolaCS::store',                                     ['as' => 'cs-store-admin']);
        $routes->put('(:any)',              'AdminKelolaCS::update/$1',                                 ['as' => 'cs-update-admin']);
        $routes->delete('(:any)',           'AdminKelolaCS::delete/$1',                                 ['as' => 'cs-delete-admin']);
    });

    $routes->group('laundry', function ($routes) {
        $routes->get('',                    'AdminKelolaLaundry::index',                                     ['as' => 'laundry-admin']);
        $routes->get('add',                 'AdminKelolaLaundry::addIndex',                                  ['as' => 'laundry-add-index-admin']);
        $routes->get('(:any)',              'AdminKelolaLaundry::editIndex/$1',                              ['as' => 'laundry-edit-index-admin']);
        $routes->post('',                   'AdminKelolaLaundry::store',                                     ['as' => 'laundry-store-admin']);
        $routes->put('(:any)',              'AdminKelolaLaundry::update/$1',                                 ['as' => 'laundry-update-admin']);
        $routes->delete('(:any)',           'AdminKelolaLaundry::delete/$1',                                 ['as' => 'laundry-delete-admin']);
    });

    $routes->group('tr-kost', function ($routes) {
        $routes->get('',                    'AdminTransaksiKost::index',                                ['as' => 'tr-kost-admin']);
        $routes->put('(:any)',              'AdminTransaksiKost::updateStatus/$1',                      ['as' => 'tr-kost-update-status-admin']);
    });

    $routes->group('tr-catering', function ($routes) {
        $routes->get('',                    'AdminTransaksiCatering::index',                            ['as' => 'tr-catering-admin']);
        $routes->put('(:any)',              'AdminTransaksiCatering::updateStatus/$1',                  ['as' => 'tr-catering-update-status-admin']);
    });

    $routes->group('tr-cs', function ($routes) {
        $routes->get('',                    'AdminTransaksiCS::index',                                  ['as' => 'tr-cs-admin']);
        $routes->put('(:any)',              'AdminTransaksiCS::updateStatus/$1',                        ['as' => 'tr-cs-update-status-admin']);
    });

    $routes->group('tr-laundry', function ($routes) {
        $routes->get('',                    'AdminTransaksiLaundry::index',                                  ['as' => 'tr-laundry-admin']);
        $routes->put('(:any)',              'AdminTransaksiLaundry::updateStatus/$1',                        ['as' => 'tr-laundry-update-status-admin']);
    });
});

// ================>> <<||>>            

$routes->get('/',                           'Home::index',                                              ['as' => 'index']);
$routes->get('detail-kost/(:any)',          'Home::detailKost/$1',                                      ['as' => 'detail-kost']);
$routes->get('detail-catering/(:any)',      'Home::detailCatering/$1',                                  ['as' => 'detail-catering']);
$routes->get('detail-cs/(:any)',            'Home::detailCS/$1',                                        ['as' => 'detail-cs']);
$routes->get('detail-laundry/(:any)',       'Home::detailLaundry/$1',                                   ['as' => 'detail-laundry']);
$routes->get('daftar-kost/',                'Home::indexDaftarKost',                                    ['as' => 'daftar-kost']);
$routes->get('daftar-catering/',            'Home::indexDaftarCatering',                                ['as' => 'daftar-catering']);
$routes->get('daftar-cs/',                  'Home::indexDaftarCS',                                      ['as' => 'daftar-cs']);
$routes->get('daftar-laundry/',             'Home::indexDaftarLaundry',                                 ['as' => 'daftar-laundry']);
$routes->get('login',                       'Home::auth',                                               ['as' => 'auth-user-view', 'filter' => 'auth_user_filter']);
$routes->get('register',                    'Home::register',                                           ['as' => 'regist-view']);

$routes->get('cek-tr-kost/(:any)',          'UserFormTransaksi::cekAuthKost/$1',                        ['as' => 'cek-tr-kost']);
$routes->get('cek-tr-catering/(:any)',      'UserFormTransaksi::cekAuthCatering/$1',                    ['as' => 'cek-tr-catering']);
$routes->get('cek-tr-cs/(:any)',            'UserFormTransaksi::cekAuthCS/$1',                          ['as' => 'cek-tr-cs']);
$routes->get('cek-tr-laundry/(:any)',       'UserFormTransaksi::cekAuthLaundry/$1',                     ['as' => 'cek-tr-laundry']);

$routes->get('form-tr-kost/(:any)',         'UserFormTransaksi::indexFormKost/$1',                      ['as' => 'form-tr-kost']);
$routes->get('form-tr-catering/(:any)',     'UserFormTransaksi::indexFormCatering/$1',                  ['as' => 'form-tr-catering']);
$routes->get('form-tr-cs/(:any)',           'UserFormTransaksi::indexFormCS/$1',                        ['as' => 'form-tr-cs']);
$routes->get('form-tr-laundry/(:any)',      'UserFormTransaksi::indexFormLaundry/$1',                   ['as' => 'form-tr-laundry']);

$routes->get('logout-user',                 'UserAuth::logout',                                         ['as' => 'logout-user']);
$routes->post('register',                   'UserAuth::register',                                       ['as' => 'regist-user']);
$routes->post('auth',                       'UserAuth::auth',                                           ['as' => 'auth-user']);

$routes->get('logout-admin',                'AdminAuth::logout',                                        ['as' => 'logout-admin']);
$routes->get('admin/login',                 'AdminAuth::index',                                         ['as' => 'auth-admin-view', 'filter' => 'auth_admin_filter']);
$routes->post('admin/auth',                 'AdminAuth::auth',                                          ['as' => 'auth-admin']);

if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
