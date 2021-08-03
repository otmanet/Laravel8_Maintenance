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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/setting/{id}', [App\Http\Controllers\SettingController::class, 'edit'])->middleware('auth');
Route::post('/updateSetting/{id}', [App\Http\Controllers\SettingController::class, 'updateSetting'])->middleware('auth');
Route::get('/Admin/Departement', [App\Http\Controllers\AdminController::class, 'index'])->middleware('auth');
Route::post('/Admin/AddDepartement', [App\Http\Controllers\AdminController::class, 'AddDepartement'])->middleware('auth');
Route::post('/Admin/AddDepartement', [App\Http\Controllers\AdminController::class, 'AddDepartement'])->middleware('auth');
Route::get('/Delete/Departement/{id}', [App\Http\Controllers\AdminController::class,'DeleteDepartement'])->middleware('auth');
Route::get('/edit/Departement/{id}',[App\Http\Controllers\AdminController::class,'EditDepartement'])->middleware('auth');
Route::post('/update/Departement/{id}',[App\Http\Controllers\AdminController::class,'UpdateDepartement'])->middleware('auth');
Route::get('/Admin/Machine/Ajouter',[App\Http\Controllers\AdminController::class,'Machine'])->middleware('auth');
Route::post('/Admin/AjouterMachine',[App\Http\Controllers\AdminController::class,'AjouterMachine'])->middleware('auth');
Route::get('/Admin/DeleteMachine/{id}',[App\Http\Controllers\AdminController::class,'DeleteMachine'])->middleware('auth');
Route::get('/Admin/EditMachine/{id}',[App\Http\Controllers\AdminController::class,'EditMachine'])->middleware('auth');
Route::post('/Admin/UpdateMachine/{id}',[App\Http\Controllers\AdminController::class,'UpdateMachine'])->middleware('auth');
Route::get('/Admin/Machine',[App\Http\Controllers\AdminController::class,'getMachine'])->middleware('auth');
Route::get('/Admin/maintancesNonValide',[App\Http\Controllers\AdminController::class,'maintancesNonValid'])->middleware('auth');
Route::get('/Admin/maintancesValide',[App\Http\Controllers\AdminController::class,'maintancesValid'])->middleware('auth');
Route::get('/Admin/PDF/Maintance/{id}',[App\Http\Controllers\AdminController::class,'PDFmaintance'])->middleware('auth');
Route::get('/valide/Maintance/{id}',[App\Http\Controllers\AdminController::class,'ValideMaintance'])->middleware('auth');
Route::get('/Nonvalide/Maintance/{id}',[App\Http\Controllers\AdminController::class,'NonValideMaintance'])->middleware('auth');
Route::get('/users',[App\Http\Controllers\AdminController::class,'getUsers'])->middleware('auth');
Route::get('/Delete/User/{id}',[App\Http\Controllers\AdminController::class,'deleteUsers'])->middleware('auth');
Route::get('/Update/User/{id}',[App\Http\Controllers\AdminController::class,'updateUsers'])->middleware('auth');
Route::get('/delete/Maintances/{id}',[App\Http\Controllers\TechController::class,'DeleteMaintance'])->middleware('auth');
Route::get('create/maintance',[App\Http\Controllers\TechController::class,'createMaintance'])->middleware('auth');
Route::post('/Ajouter/Maintance',[App\Http\Controllers\TechController::class,'AjouterMaintance'])->middleware('auth');
Route::get('/edit/maintance/{id}',[App\Http\Controllers\TechController::class,'editMaintance'])->middleware('auth');
Route::post('/Modifier/Maintance/{id}',[App\Http\Controllers\TechController::class,'updateMaintance'])->middleware('auth');
Route::get('/PDF/rapport',[App\Http\Controllers\TechController::class,'pdfRapport'])->middleware('auth');






Route::get('Admin/Form/Ajouter/Departement',function(){
     return view('AjouterDepartement');
});