<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect('/employees/manage');
    }
    return view('auth/login');
})->middleware('guest');
Route::get('/login', function () {
    return view('auth/login');
});
Route::get('/register', function () {
    return view('auth/register');
});
Auth::routes();
Route::get('/employees/manage', [EmployeeController::class, 'index'])->name('index')->middleware('auth');
Route::get('/employee/id/add', [EmployeeController::class, 'create'])->name('create')->middleware('auth');
Route::resource('employee', EmployeeController::class)->middleware('auth');