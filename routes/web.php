<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IntarnalFilesController;
use App\Http\Controllers\ProcessesController;

//use App\Http\Controllers\ShippingPortController;
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
use App\Http\Controllers\AdminController;

//use App\Http\Controllers\CountriesController;
//use App\Http\Controllers\StatesController;






Route::get('/', function () {
    return view('auth.login');
   //return view('temp.accordion');
} );
Route::get('/temp', function () {
     return view('temp.accordion');
     //return view('temp.collapse');

  } );

Route::get('/login', 'App\Http\Controllers\LoginController@login')->name('login');

Route::get('logouts', 'App\Http\Controllers\HomeController@logout')->name('logouts');
Route::get('userGuid', 'App\Http\Controllers\HomeController@userGuid')->name('userGuid');


//Auth::routes(['register' => false]);
Auth::routes();



 
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function() {
Route::resource('roles','App\Http\Controllers\RoleController');
Route::resource('users','App\Http\Controllers\UserController');
});
Route::post('updatepassword/{id}','App\Http\Controllers\UserController@updatepassword')->name('users.updatepassword');
Route::get('profile','App\Http\Controllers\UserController@profile')->name('profile');

Route::post('updateprofile/{id}','App\Http\Controllers\UserController@updateprofile')->name('users.updateprofile');

Route::get('/intarnals', [ProcessesController::class, 'beforeintarnalCars'])->name('intarnals');

Route::get('/beforeintarnalCars', [ProcessesController::class, 'beforeintarnalCars'])->name('beforeintarnalCars');
Route::get('/afterintarnalCars', [ProcessesController::class, 'afterintarnalCars'])->name('afterintarnalCars');
Route::get('/intarnalCars', [ProcessesController::class, 'intarnalCars'])->name('intarnalCars');
Route::get('/leavingCars', [ProcessesController::class, 'leavingCars'])->name('leavingCars');
Route::get('/notLeaving', [ProcessesController::class, 'notLeaving'])->name('notLeaving');
Route::post('/traheel', [ProcessesController::class, 'traheel'])->name('traheel');
Route::get('/increase', [ProcessesController::class, 'increase'])->name('increase');
Route::post('/update_increase', [ProcessesController::class, 'update_increase'])->name('update_increase');
Route::post('/leavingCars_update', [ProcessesController::class, 'leavingCars_update'])->name('leavingCars_update');
Route::get('/letters/{id}', [ProcessesController::class, 'letters'])->name('letters');
Route::get('/ShowLetters', [ProcessesController::class, 'ShowLetters'])->name('ShowLetters');
Route::post('/SearchLetters', [ProcessesController::class, 'SearchLetters'])->name('SearchLetters');




Route::get('/takhlees', [App\Http\Controllers\ReportsController::class, 'takhlees'])->name('takhlees');
Route::get('/alerts', [App\Http\Controllers\ReportsController::class, 'alerts'])->name('alerts');
Route::post('/update_takhlees', [ProcessesController::class, 'update_takhlees'])->name('update_takhlees');
Route::post('/update_alerts', [ProcessesController::class, 'update_alerts'])->name('update_alerts');


Route::get('/process', [ProcessesController::class, 'process'])->name('process');

Route::post('/Search_process', [ProcessesController::class, 'Search_process'])->name('Search_process');

Route::post('/Search_customers', [App\Http\Controllers\ReportsController::class, 'Search_customers'])->name('Search_customers');


Route::post('/Search_isueDate', [App\Http\Controllers\ReportsController::class, 'Search_isueDate'])->name('Search_isueDate');

Route::get('/customerReports', [App\Http\Controllers\ReportsController::class, 'customer'])->name('customerReport');
Route::get('/carReport/{id}', [App\Http\Controllers\ReportsController::class, 'cars'])->name('carReport');
Route::get('/luggagesReport/{id}', [App\Http\Controllers\ReportsController::class, 'luggages'])->name('luggagesReport');
Route::get('/leavingCarsReport', [App\Http\Controllers\ReportsController::class, 'leavingCars'])->name('leavingCarsReport');
Route::get('/traheelReport', [App\Http\Controllers\ReportsController::class, 'traheel'])->name('traheelReport');
Route::get('/intarnalCarsReport', [App\Http\Controllers\ReportsController::class, 'intarnalCars'])->name('intarnalCarsReport');
Route::get('/guarantor_report', [App\Http\Controllers\ReportsController::class, 'guarantor'])->name('guarantor_report');
Route::get('/revenues', [App\Http\Controllers\AmountsController::class, 'revenue'])->name('revenues');


//Route::get('/show', [App\Http\Controllers\CustomersController::class, 'index']);


Route::resource('countries', App\Http\Controllers\CountriesController::class);
Route::resource('states', App\Http\Controllers\StatesController::class);
Route::resource('shippingport', App\Http\Controllers\ShippingPortController::class);
Route::resource('ships', App\Http\Controllers\ShipsController::class);
Route::resource('car_marks', App\Http\Controllers\CarMarksController::class);
Route::resource('vehicles', App\Http\Controllers\VehiclesController::class);
Route::resource('customers', App\Http\Controllers\CustomersController::class);
Route::resource('emportcars', App\Http\Controllers\EmportcarsController::class);
Route::resource('reports', App\Http\Controllers\ReportsController::class);
Route::resource('amounts', App\Http\Controllers\AmountsController::class);

Route::post('/markibat', [App\Http\Controllers\CustomersController::class, 'markibat'])->name('markibat');

Route::resource('guarantors', App\Http\Controllers\GuarantorsController::class);

Route::resource('cars', App\Http\Controllers\CarsController::class);


Route::get('/page', [AdminController::class, 'index']);


Route::resource('intarnal_files', App\Http\Controllers\IntarnalFilesController::class);
/*

Route::group([
     'prefix' => '',
 ], function () {
     Route::get('/', [ShippingPortController::class, 'index'])
          ->name('shippingport.index');
     Route::get('/create', [ShippingPortController::class, 'create'])
          ->name('shippingport.create');
     Route::get('/show/{intarnalFiles}',[ShippingPortController::class, 'show'])
          ->name('shippingport.show');
     Route::get('/edit',[ShippingPortController::class, 'edit'])
          ->name('shippingport.edit');

     Route::post('/store', [ShippingPortController::class, 'store'])
          ->name('shippingport.store');

     Route::put('/shippingport', [ShippingPortController::class, 'update'])
          ->name('shippingport.update');
     Route::delete('/shippingport',[ShippingPortController::class, 'destroy'])
          ->name('shippingport.destroy');
 });


Route::group([
    'prefix' => '',
], function () {
    Route::get('/', [IntarnalFilesController::class, 'index'])
         ->name('intarnal_files.index');
    Route::get('/create', [IntarnalFilesController::class, 'create'])
         ->name('intarnal_files.create');
    Route::get('/show/{intarnalFiles}',[IntarnalFilesController::class, 'show'])
         ->name('intarnal_files.show');
    Route::get('/{intarnalFiles}/edit',[IntarnalFilesController::class, 'edit'])
         ->name('intarnal_files.edit');
    Route::post('/', [IntarnalFilesController::class, 'store'])
         ->name('intarnal_files.store');
    Route::put('intarnal_files/{intarnalFiles}', [IntarnalFilesController::class, 'update'])
         ->name('intarnal_files.update');
    Route::delete('/intarnal_files/{intarnalFiles}',[IntarnalFilesController::class, 'destroy'])
         ->name('intarnal_files.destroy');
});

*/
