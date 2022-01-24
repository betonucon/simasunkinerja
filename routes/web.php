<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('Hashmake',[MasterController::class, 'hashmake']);
Route::get('/cache-clear', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Cache facade value cleared</h1>';
});
Route::get('a/{personnel_no}/', 'Auth\LoginController@programaticallyEmployeeLogin')->name('login.a');
Auth::routes();

Route::group(['middleware'    => 'auth'],function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/', 'HomeController@index')->name('home');

});

Route::group(['middleware'    => 'auth'],function(){
    Route::get('/Lhe', 'LheController@index');
    Route::get('/Kke1', 'LheController@index_kke1');
    Route::get('/Kke2', 'LheController@index_kke2');
    Route::get('/Kke31', 'LheController@index_kke31');
    Route::get('/Kke32', 'LheController@index_kke32');
    Route::get('/Kke33', 'LheController@index_kke33');
    Route::get('/Lhe/create', 'LheController@create');
    Route::get('/Lhe/hapus', 'LheController@hapus');
    Route::get('/Lhe/hapus_kke1', 'LheController@hapus_kke1');
    Route::get('/Lhe/hapus_kke2', 'LheController@hapus_kke2');
    Route::get('/Lhe/hapus_kke31', 'LheController@hapus_kke31');
    Route::get('/Lhe/hapus_kke32', 'LheController@hapus_kke32');
    Route::get('/Lhe/hapus_kke33', 'LheController@hapus_kke33');
    Route::get('/Lhe/tampil_nilai', 'LheController@tampil_nilai');
    Route::post('/Lhe', 'LheController@save');
    Route::post('/Lhe/penilaian', 'LheController@save_penilaian');
    Route::post('/Lhe/save_kke1', 'LheController@save_kke1');
    Route::post('/Lhe/save_kketiga1', 'LheController@save_kketiga1');
    Route::post('/Lhe/save_kketiga1_sasaran', 'LheController@save_kketiga1_sasaran');
    Route::post('/Lhe/save_kketiga2', 'LheController@save_kketiga2');
    Route::post('/Lhe/save_kketiga2_sasaran', 'LheController@save_kketiga2_sasaran');
    Route::post('/Lhe/save_kketiga3', 'LheController@save_kketiga3');
    Route::post('/Lhe/save_kketiga3_sasaran', 'LheController@save_kketiga3_sasaran');
    Route::post('/Lhe/save_kke1_sasaran', 'LheController@save_kke1_sasaran');
    Route::post('/Lhe/save_kke2_sasaran', 'LheController@save_kke2_sasaran');
    Route::post('/Lhe/update_kke1', 'LheController@update_kke1');
    Route::post('/Lhe/save_kke2', 'LheController@save_kke2');
    Route::post('/Lhe/update_kke2', 'LheController@update_kke2');
    Route::post('/Lhe/save_kke31', 'LheController@save_kke31');
    Route::post('/Lhe/update_kke31', 'LheController@update_kke31');
    Route::post('/Lhe/save_kke32', 'LheController@save_kke32');
    Route::post('/Lhe/update_kke32', 'LheController@update_kke32');
    Route::post('/Lhe/save_kke33', 'LheController@save_kke33');
    Route::post('/Lhe/update_kke33', 'LheController@update_kke33');

});

Route::group(['middleware'    => 'auth'],function(){
    Route::get('/Transaksilhe', 'TransaksilheController@index');
    Route::get('/Transaksilherekap', 'TransaksilheController@index_rekap');
    Route::get('/Transaksilhe/inspektorat', 'TransaksilheController@index_inspektorat');
    Route::get('/Transaksilherekap/cetak', 'TransaksilheController@cetak_rekap');
    Route::get('/Transaksilhe/cetak', 'TransaksilheController@cetak');
    Route::get('/Transaksilhe/kirim_auditor', 'TransaksilheController@kirim_auditor');
    Route::get('/Transaksilhe/create', 'TransaksilheController@create');
    Route::get('/Transaksilhe/detail_opd', 'TransaksilheController@detail_opd');
    Route::get('/Transaksilhe/save_lhe', 'TransaksilheController@save_lhe');
    Route::get('/Transaksilhe/saran', 'TransaksilheController@saran');
    Route::get('/Transaksilhe/tampil_nilai', 'TransaksilheController@tampil_nilai');
    Route::post('/Transaksilhe', 'TransaksilheController@save');
    Route::post('/Transaksilhe/penilaian', 'TransaksilheController@save_penilaian');
    Route::post('/Transaksilhe/save_saran', 'TransaksilheController@save_saran');
    Route::post('/Transaksilhe/proses_buka', 'TransaksilheController@proses_buka');
    

});

Route::group(['middleware'    => 'auth'],function(){
    Route::get('/Transaksikkesatu', 'TransaksikkesatuController@index');
    Route::get('/Transaksikkesatu/create', 'TransaksikkesatuController@create');
    Route::get('/Transaksikkesatu/save_kkesatu', 'TransaksikkesatuController@save_kkesatu');
    Route::get('/Transaksikkesatu/saran', 'TransaksikkesatuController@saran');
    Route::get('/Transaksikkesatu/tampil_nilai', 'TransaksikkesatuController@tampil_nilai');
    Route::post('/Transaksikkesatu', 'TransaksikkesatuController@save');
    Route::post('/Transaksikkesatu/penilaian', 'TransaksikkesatuController@save_penilaian');
    Route::post('/Transaksikkesatu/save_saran', 'TransaksikkesatuController@save_saran');
    

});
Route::group(['middleware'    => 'auth'],function(){
    Route::get('/Transaksikkedua/save', 'TransaksikkeduaController@save');
    Route::get('/Transaksikkedua/saran', 'TransaksikkeduaController@saran');
    Route::get('/Transaksikkedua/tampil_nilai', 'TransaksikkeduaController@tampil_nilai');
    Route::get('/Transaksikkedua/save_kkedua', 'TransaksikkeduaController@save_kkedua');
    Route::post('/Transaksikkedua', 'TransaksikkeduaController@save');
    Route::post('/Transaksikkedua/penilaian', 'TransaksikkeduaController@save_penilaian');
    Route::post('/Transaksikkedua/save_saran', 'TransaksikkeduaController@save_saran');
    

});
Route::group(['middleware'    => 'auth'],function(){
    Route::post('/Transaksikrekomendasi/save', 'TransaksikrekomendasiController@save');
    Route::post('/Transaksikrekomendasi/upload', 'TransaksikrekomendasiController@upload');
    Route::get('/Transaksikrekomendasi/saran', 'TransaksikrekomendasiController@saran');
    

});
Route::group(['middleware'    => 'auth'],function(){
    Route::get('/Dokumennya', 'DokumenController@index');
    Route::get('/Dokumen/Create', 'DokumenController@create');
    Route::get('/Dokumen/hapus', 'DokumenController@hapus');
    Route::post('/Dokumennya', 'DokumenController@save');
    

});
Route::group(['middleware'    => 'auth'],function(){
    Route::get('/Transaksikketiga/save', 'TransaksikketigaController@save');
    Route::get('/Transaksikketiga/save_kketiga1', 'TransaksikketigaController@save_kketiga1');
    Route::get('/Transaksikketiga/save_kketiga2', 'TransaksikketigaController@save_kketiga2');
    Route::get('/Transaksikketiga/save_kketiga3', 'TransaksikketigaController@save_kketiga3');
    Route::get('/Transaksikketiga/save_ke3', 'TransaksikketigaController@save_ke3');
    Route::get('/Transaksikketiga/saran', 'TransaksikketigaController@saran');
    Route::get('/Transaksikketiga/tampil_nilai', 'TransaksikketigaController@tampil_nilai');
    Route::post('/Transaksikketiga', 'TransaksikketigaController@save');
    Route::post('/Transaksikketiga/penilaian', 'TransaksikketigaController@save_penilaian');
    Route::post('/Transaksikketiga/save_saran', 'TransaksikketigaController@save_saran');
    

});

Route::group(['middleware'    => 'auth'],function(){
    Route::get('/Pengguna', 'PenggunaController@index');
    Route::get('/Penggunaatas', 'PenggunaController@index_auditor');
    Route::get('/Pengguna/ubah', 'PenggunaController@ubah');
    Route::get('/Penggunaatas/ubah', 'PenggunaController@ubah_atas');
    Route::post('/Pengguna', 'PenggunaController@save');
    Route::post('/Pengguna/ubah', 'PenggunaController@save_ubah');
    Route::post('/Penggunaatas/ubah', 'PenggunaController@save_ubah_atas');
    Route::post('/Pengguna/hapus', 'PenggunaController@hapus');
    Route::post('/Pengguna/reset_password', 'PenggunaController@reset_password');
    Route::post('/Ubahpassword', 'PenggunaController@ubahpassword');

});
Route::group(['middleware'    => 'auth'],function(){
    Route::get('/Opd', 'OpdController@index');
    Route::get('/Opdatas', 'OpdController@index_auditor');
    Route::get('/Opd/ubah', 'OpdController@ubah');
    Route::get('/Opdatas/ubah', 'OpdController@ubah_atas');
    Route::post('/Opd', 'OpdController@save');
    Route::post('/Opd/ubah', 'OpdController@save_ubah');
    Route::post('/Opdatas/ubah', 'OpdController@save_ubah_atas');
    Route::post('/Opd/hapus', 'OpdController@hapus');
    Route::post('/Opd/reset_password', 'OpdController@reset_password');

});

Route::group(['middleware'    => 'auth'],function(){
    Route::get('Master',[MasterController::class, 'index']);

});

