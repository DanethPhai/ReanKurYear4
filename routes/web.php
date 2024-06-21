<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FilterSubjectController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PopularPostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/** for side bar menu active */

function set_active( $route ) {
    if( is_array( $route ) ){
        return in_array(Request::path(), $route) ? 'active' : '';
    }
    return Request::path() == $route ? 'active' : '';
}


Route::delete('/teacher/products/delete/{id}', [ProductController::class, 'teacherDeleteProduct'])->name('teacher.product.delete');
Route::resource('teacher', TeacherController::class);
Route::resource('product', ProductController::class);
//Route::resource('subject', SubjectController::class);


Route::prefix('/')->middleware(['auth'])->group(function(){
    Route::get('/create', function(){
        return view('teacher.create');
    });
    // Route::get('/products/{id}', [CommentController::class, 'addComment']);
    Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');
});

Route::get('about', function(){
    return view('about');
});

Route::get('subject', function(){
    return view('subject');
});

Route::get('/', [ProductController::class, 'index'])->name('product.indexs');
Route::get('/home', [ProductController::class, 'index'])->name('product.index');
Route::post('/products/store', [ProductController::class, 'store'])->name('product.store');

// admin group routes
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/products', [AdminController::class, 'adminShowDashboard'])->name('admin.product.index');
    Route::get('/teachers', [AdminController::class, 'adminShowAllTeacher'])->name('admin.product.teacher');
    Route::get('/posts', [AdminController::class, 'adminShowAllProduct'])->name('admin.product.post');
    Route::get('/users', [AdminController::class, 'adminShowAllUser'])->name('admin.product.user');
    Route::get('/products/comments', [AdminController::class, 'adminGetAllComments'])->name('admin.comment.index');
    Route::delete('/products/delete/{id}', [AdminController::class, 'adminDeleteProduct'])->name('admin.product.delete');
    Route::delete('/products/comments/{id}', [AdminController::class, 'adminDeleteComment'])->name('admin.comment.delete');
});

Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/products/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::get('/products/{id}', [ProductController::class, 'countlike']);

//Route::get('/subject', [SubjectController::class, 'show'])->name('product.subject');
//Route::get('/subjects/{subject}', [SubjectController::class, 'productsBySubject'])->name('products.by_subject');

//Route::get('/', [FilterSubjectController::class, 'index']);

//Route::get('products/{id}', [CommentController::class, 'loadComments'])->name('product.show');
Route::post('/products/{id}', [CommentController::class, 'addComment'])->middleware('auth')->name('products.comment');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('products/{product}/like', [LikeController::class, 'like'])->middleware('auth')->name('products.like');
Route::post('products/{product}/unlike', [LikeController::class, 'unlike'])->middleware('auth')->name('products.unlike');


// Route::get('/categories', [SubjectController::class, 'index'])->name('categories.index');
// Route::get('/categories/{subject}', [SubjectController::class, 'showByCategory'])->name('product.showByCategory');


// routes/web.php
//Route::get('/subjects/{subject_id}', [SubjectController::class, 'show'])->name('products.showsubject');
Route::get('/products-by-category/{category}', [ProductController::class, 'productsByCategory'])->name('products.by.category');

Route::get('/products/subject/{id}', [ProductController::class, 'bySubject'])->name('products.bySubject');

Route::get('/productbysubject/{subject_id}', [ProductController::class, 'productbysubject'])->name('product.productbysubject');


Route::get('/subject/{id}', [ProductController::class, 'filterBySubject']);
Route::get('/level/{id}', [ProductController::class, 'filterByLevel']);

Route::get('/postyoulike/{id}', [TeacherController::class, 'postyoulike']);
