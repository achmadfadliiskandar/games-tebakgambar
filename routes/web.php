<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome'); // halaman utama
// });

Auth::routes();
// untuk pemain
Route::get('/', [App\Http\Controllers\HomeController::class, 'welcome'])->name('welcome');
Route::post('/demo/coba/menjawab',[App\Http\Controllers\HomeController::class, 'demo'])->name('demo');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/saran/tambah', [App\Http\Controllers\HomeController::class, 'tambahsaran'])->middleware('guest');
Route::get('/pemain/start',[App\Http\Controllers\HomeController::class, 'start'])->middleware('checkRole:pemain');
Route::get('/pemain/tebak-rintangan/{id}',[App\Http\Controllers\HomeController::class, 'tebak'])->middleware('checkRole:pemain');
Route::get('/pemain/answer/jawab/{id}',[App\Http\Controllers\HomeController::class, 'tebakjawaban'])->middleware('checkRole:pemain');
Route::get('/pemain/jawab/jawaban/{id}',[App\Http\Controllers\HomeController::class, 'tebakanjawaban'])->middleware('checkRole:pemain');
Route::post('/pemain/kirim/jawaban',[App\Http\Controllers\HomeController::class, 'jawab'])->middleware('checkRole:pemain');
Route::post('/pemain/kirim/jawaban/coba/lagi',[App\Http\Controllers\HomeController::class, 'jawablagi'])->middleware('checkRole:pemain');
Route::get('/pemain/get/result',[App\Http\Controllers\HomeController::class, 'result'])->middleware('checkRole:pemain');
Route::get('/pemain/data/profile',[App\Http\Controllers\HomeController::class, 'profile'])->middleware('checkRole:pemain');
Route::post('/pemain/update/password',[App\Http\Controllers\HomeController::class, 'pemainupdate'])->middleware('checkRole:pemain');
Route::patch('/pemain/update/data/diri/{getuserlogin}',[App\Http\Controllers\HomeController::class, 'editdd'])->middleware('checkRole:pemain');
// end pemain

// khusus admin
Route::get('/admin',[App\Http\Controllers\HomeController::class, 'admin'])->middleware('checkRole:admin');
// udah nggak ada Route::get('/admin/informasiumum',[App\Http\Controllers\HomeController::class, 'admininformasi'])->middleware('checkRole:admin');
Route::get('/admin/saran',[App\Http\Controllers\HomeController::class, 'adminsaran'])->middleware('checkRole:admin');
Route::delete('/admin/saran/hapus/{id}', [App\Http\Controllers\HomeController::class, 'adminhapussaran'])->middleware('checkRole:admin');
Route::get('/admin/users',[App\Http\Controllers\HomeController::class, 'adminusers'])->middleware('checkRole:admin');
Route::get('/admin/tambah/users',[App\Http\Controllers\HomeController::class, 'admintambahusers'])->middleware('checkRole:admin');
Route::get('/admin/reset-password',[App\Http\Controllers\HomeController::class, 'adminresetpassword'])->middleware('checkRole:admin');
Route::post('/admin/update/password',[App\Http\Controllers\HomeController::class, 'adminupdatepassword'])->middleware('checkRole:admin');
Route::post('admin/tambah/user',[App\Http\Controllers\HomeController::class, 'admintambahuser'])->middleware('checkRole:admin');
Route::delete('/admin/user/hapus/{id}', [App\Http\Controllers\HomeController::class, 'adminhapususer'])->middleware('checkRole:admin');
Route::get('/admin/rintangangame', [App\Http\Controllers\HomeController::class, 'adminrintangan'])->middleware('checkRole:admin');
Route::get('/admin/rintangangame/tambah', [App\Http\Controllers\HomeController::class, 'adminrintangantambah'])->middleware('checkRole:admin');
Route::post('/admin/rintangangame/store', [App\Http\Controllers\HomeController::class, 'adminrintanganstore'])->middleware('checkRole:admin');
Route::get('/admin/rintangangame/detail/{id}',[App\Http\Controllers\HomeController::class, 'adminrintangandetail'])->middleware('checkRole:admin');
Route::get('/admin/rintangangame/edit/{id}',[App\Http\Controllers\HomeController::class, 'adminrintanganedit'])->middleware('checkRole:admin');
Route::put('admin/rintangangame/update/{id}',[App\Http\Controllers\HomeController::class, 'adminrintanganupdate'])->middleware('checkRole:admin');
Route::delete('admin/rintangangame/hapus/{id}',[App\Http\Controllers\HomeController::class, 'adminrintanganhapus'])->middleware('checkRole:admin');
Route::get('/admin/levelgame',[App\Http\Controllers\HomeController::class, 'adminlevelgame'])->middleware('checkRole:admin');
Route::get('/admin/levelgame/tambah',[App\Http\Controllers\HomeController::class, 'adminlevelgametambah'])->middleware('checkRole:admin');
Route::post('/admin/levelgame/store',[App\Http\Controllers\HomeController::class, 'adminlevelgamestore'])->middleware('checkRole:admin');
Route::get('/admin/levelgame/edit/{id}',[App\Http\Controllers\HomeController::class, 'adminlevelgameedit'])->middleware('checkRole:admin');
Route::put('/admin/levelgame/update/{id}',[App\Http\Controllers\HomeController::class, 'adminlevelgameupdate'])->middleware('checkRole:admin');
Route::delete('admin/levelgame/hapus/{id}',[App\Http\Controllers\HomeController::class, 'adminlevelgamehapus'])->middleware('checkRole:admin');
Route::get('/admin/levelgame/detail/{id}',[App\Http\Controllers\HomeController::class, 'adminlevelgamedetail'])->middleware('checkRole:admin');
Route::get('/admin/groupgame',[App\Http\Controllers\HomeController::class, 'admingroupgame'])->middleware('checkRole:admin');
Route::get('/admin/groupgame/tambah',[App\Http\Controllers\HomeController::class, 'admingroupgametambah'])->middleware('checkRole:admin');
Route::post('/admin/groupgame/store',[App\Http\Controllers\HomeController::class, 'admingroupgamestore'])->middleware('checkRole:admin');
Route::get('/admin/groupgame/edit/{id}',[App\Http\Controllers\HomeController::class, 'admingroupgamesedit'])->middleware('checkRole:admin');
Route::put('/admin/groupgame/update/{id}',[App\Http\Controllers\HomeController::class, 'admingroupgameupdate'])->middleware('checkRole:admin');
Route::delete('admin/groupgame/hapus/{id}',[App\Http\Controllers\HomeController::class, 'admingroupgamehapus'])->middleware('checkRole:admin');
// end admin