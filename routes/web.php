<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

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
    return view('pages.admin');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//Route::get('/users', function (){
////
//    $users = DB::table('users')->get();//lay toan bo dữ liệu từ bảng user, nhớ bổ sung namespace cho DB,
//    //tạm thời chưa học nên lấy dữ liệu tại file web.php nhưng sau này viết tại controller
//    //var_dump($users);
//    return view('pages.user.userlist',  ['users' => $users]);
//});

//Route::get('/check_fail', function (){
//    echo "checkfail page";
//    return view('pages.admin');
//});
//Route::get('check_age/{age?}', function ($age) {
//    echo $age;
//    return view('pages.admin');
//})->middleware(\App\Http\Middleware\CheckAge::class);

Route::resource('products', ProductController::class)->middleware(['auth']);
Route::resource('users', UserController::class)->middleware(['auth', 'role:admin']);
Route::resource('profiles',ProfileController::class)->middleware(['auth', 'role:admin']);
Route::resource('category', CategoryController::class)->middleware(['auth', 'role:admin']);


