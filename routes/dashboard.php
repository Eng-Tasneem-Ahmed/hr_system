<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\BranchController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\VacationController;
use App\Http\Controllers\Dashboard\DepartmentController;


####################  Auth #################################

Route::get('/login',[AuthController::class, 'login_form'])->name('login-form');
Route::post('/login',[AuthController::class, 'login'])->name('login');
Route::middleware('auth')->prefix('dashboard')->name('dashboard.')->group(function(){
// logout
Route::get('/logout', [AuthController::class,'logout'])->name('logout');
####################  Profile #################################
Route::controller(ProfileController::class)->prefix('profile')->group(function () {
    Route::get('/', 'edit')->name('profile.edit');
    //  Route::patch('/{user}', 'updateProfile')->name('profile.update');
      Route::put('/', 'updatePassword')->name('password.update');
});
#################### User #################################
Route::controller(UserController::class)->prefix('users')->name('users.')->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/show/{id}', 'show')->name('show');
    Route::get('/{user}', 'edit')->name('edit');
    Route::put('/{user}', 'update')->name('update');
    Route::delete('/{user}', 'destroy')->name('destroy');
    Route::get('/restore/{id}', 'restore')->name('restore');
    Route::post('/filter', 'filter')->name('filter');

});

#################### User #################################
Route::controller(RoleController::class)->prefix('roles')->name('roles.')->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{role}', 'edit')->name('edit');
    Route::put('/{role}', 'update')->name('update');

});

#################### Branch #################################
Route::controller(BranchController::class)->prefix('branches')->name('branches.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{branch}', 'edit')->name('edit');
    Route::put('/{branch}', 'update')->name('update');
    Route::delete('/{branch}', 'destroy')->name('destroy');
    Route::get('/restore/{id}', 'restore')->name('restore');

  
});

####################Department#################################
Route::controller(DepartmentController::class)->prefix('departments')->name('departments.')->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{department}', 'edit')->name('edit');
    Route::put('/{department}', 'update')->name('update');
    Route::delete('/{department}', 'destroy')->name('destroy');
    Route::get('/restore/{id}', 'restore')->name('restore');
  
});

#################### Vacation #################################
Route::controller(VacationController::class)->prefix('vacations')->name('vacations.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/accept/{vacation}', 'accept')->name('accept');
    Route::get('/reject/{vacation}', 'reject')->name('reject');
});
 });
