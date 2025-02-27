<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClouserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Route::get('/adminDashboard', function () {
//     return view('admin_dashboard');
// })->middleware(['auth', 'verified'])->name('adminDashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::post('/dashboard/store', [ClouserController::class, 'store'])->name('dashboard.store');

// Route::post('/clouser/store', [ClouserController::class, 'store'])->name('clouser.store');

// Route::get('admin/dashboard',[AdminController::class, 'index'])->middleware(['auth', 'admin']);

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin_dashboard', [AdminController::class, 'index'])->name('admin_dashboard');
});

  
Route::get('/add-clouersbyadmin', [AdminController::class, 'addClouersbyadmin'])->name('addClouersbyadmin');

Route::get('/view-messages', [AdminController::class, 'viewMessages'])->name('viewMessages');

Route::get('/view-total-technicians', [AdminController::class, 'viewTechnicians'])->name('viewTechnicians');

Route::get('/view-total-admins', [AdminController::class, 'viewAdmins'])->name('viewAdmins');

Route::get('/total-accounts', [AdminController::class, 'viewAccounts'])->name('viewAccounts');

Route::get('/example', [AdminController::class, 'example'])->name('example');

// Route::get('/admin/dashboard', [AdminController::class, 'showDashboard'])->name('adminDashboard');


Route::get('/admin/dashboard', [ClouserController::class, 'dashboard'])->name('admin.Dashboard');
// Route::get('/clouser-details', [ClouserController::class, 'showClouserDetails'])->name('showClouserDetails');


Route::get('/clouser-details', [ClouserController::class, 'go_Clouserdetails'])->name('go_Clouserdetails');




Route::get('clouser-edit/{id}', [ClouserController::class, 'editClouser'])->name('editClouser');

Route::get('/add-clouersbyadmin', [ClouserController::class, 'go_Adminclouseradd'])->name('go_Adminclouseradd');




Route::post('update_clouser/{id}', [ClouserController::class, 'updateClouser'])->name('updateClouser');

Route::get('clouser-delete/{id}', [ClouserController::class, 'deleteClouser'])->name('deleteClouser');


// Route::get('/general_information', [AdminController::class, 'general_information'])->name('general_information');

Route::get('/connectionType_maintainance', [AdminController::class, 'connectionType_maintainance'])->name('connectionType_maintainance');

Route::get('/connectionType_new', [AdminController::class, 'connectionType_new'])->name('connectionType_new');




// Route::match(['get', 'post'], '/general_information', 'YourController@yourMethod')->name('general_information');

// Route::post('/location/store', [LocationController::class, 'store'])->name('location.store');
// Route::get('/closure/details', [LocationController::class, 'showClosureDetails'])->name('closure.details');


Route::post('/dashboard', [AdminController::class, 'handleDashboardSubmission'])->name('dashboard.submit');






// Route::get('/connectionType_new', function () {
//     return view('connectionType_new');
// })->name('connectionType_new');

Route::post('/location/store', [LocationController::class, 'storeFromNewBlade'])->name('connectionType_news');

// Route::get('/connectionType_maintainance', function () {
//     return view('connectionType_maintainance');
// })->name('connectionType_maintainance');

Route::post('/connectionType_maintainance', [LocationController::class, 'storeFromNewBlade'])->name('connectionType_maintainances');
