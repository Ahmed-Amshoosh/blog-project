<?php

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

//Route::view('/', 'login');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';


Route::middleware('auth')->group(function (){
   Route::get('admin/home' ,[\App\Http\Controllers\AuthController::class,'index'])->name('admin/home');
   Route::get('admin/logout' ,[\App\Http\Controllers\AuthController::class,'logout'])->name('logout');
   Route::get('logout' ,[\App\Http\Controllers\AuthController::class,'user_logout'])->name('user_logout');



//   ==================================PasswordReset========================================
    Route::get('password/forgot', [\App\Http\Controllers\AuthController::class, 'showForgotForm'])->name('password.forgot');
    Route::post('password/forgot', [\App\Http\Controllers\AuthController::class, 'sendResetLink'])->name('password.email');

    Route::get('password/reset/{token}', [\App\Http\Controllers\AuthController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [\App\Http\Controllers\AuthController::class, 'resetPassword'])->name('password.update');
//   ==================================PasswordReset========================================

//   ==================================AdminInfo========================================

    Route::get('users/info' ,[\App\Http\Controllers\AdminController::class,'user_info'])->name('user.info');
    Route::get('delete_user/{id}' ,[\App\Http\Controllers\AdminController::class,'delete_user'])->name('delete_user');



    Route::get('admin/info' ,[\App\Http\Controllers\AdminController::class,'admin_info'])->name('admin.info');
    Route::post('admin/update_admin_info' ,[\App\Http\Controllers\AdminController::class,'update_admin_info'])->name('update_admin_info');
    Route::get('admin/change_password' ,[\App\Http\Controllers\AdminController::class,'change_password'])->name('admin_change_password');

    Route::get('admin/change-password', [\App\Http\Controllers\AdminController::class,'change_password'])->name('admin_password.change');
    Route::post('admin/change-password', [\App\Http\Controllers\AdminController::class,'update_password'])->name('admin_password.update');



    Route::get('admin/admin_social_links', [\App\Http\Controllers\SocialMediaController::class,'admin_social_links'])->name('admin_social_links');

    Route::post('admin/social-media', [\App\Http\Controllers\SocialMediaController::class, 'store'])->name('social-media.store');

    Route::get('admin/delete_social_link/{id}', [\App\Http\Controllers\SocialMediaController::class, 'delete_social_link'])->name('admin.delete_social_link');


    //   ==================================AdminInfo========================================

//   ==================================contact========================================

    Route::get('admin/contact', [\App\Http\Controllers\ContactController::class, 'contact_inquiries'])->name('admin.contact');
    Route::get('admin/delete_contact_inquirie/{id}', [\App\Http\Controllers\ContactController::class, 'delete_contact_inquirie'])->name('admin.delete_contact_inquirie');


    //   ==================================contact========================================

//   ==================================Categories========================================

    Route::get('admin/categories' ,[\App\Http\Controllers\CategoriesController::class,'categories'])->name('admin.categories');

    Route::get('admin/add_category' ,[\App\Http\Controllers\CategoriesController::class,'add_category'])->name('admin.add_category');

    Route::post('admin/create_category' ,[\App\Http\Controllers\CategoriesController::class,'create_category'])->name('admin.create_category');

    Route::get('admin/edit_category/{id}' ,[\App\Http\Controllers\CategoriesController::class,'edit_category'])->name('admin.edit_category');

    Route::post('admin/update/{id}' ,[\App\Http\Controllers\CategoriesController::class,'update_category'])->name('admin.update_category');

    Route::get('admin/delete_category/{id}' ,[\App\Http\Controllers\CategoriesController::class,'delete_category'])->name('admin.delete_category');


//   ==========================================================================

//   ==================================Categories========================================

    Route::post('admin/post/commint/{id}' ,[\App\Http\Controllers\CommentController::class,'store'])->name('add_commint');
    Route::get('admin/post/delete_commint/{id}' ,[\App\Http\Controllers\CommentController::class,'delete_commint'])->name('admin.delete_commint');


//   ==================================Categories========================================

//   ==================================Likes========================================
//    Route::post('/posts/{post}/like', [\App\Http\Controllers\LikeController::class, 'toggleLike'])->name('posts.like');
    Route::post('/like-or-dislike', [\App\Http\Controllers\LikeController::class, 'likeOrDislike'])->name('like.or.dislike');

//   ==================================Likes========================================

//   ==================================Setting========================================
    Route::get('admin/setting', [\App\Http\Controllers\SettingController::class, 'setting'])->name('setting');

   Route::post('admin/setting_update', [\App\Http\Controllers\SettingController::class, 'setting_update'])->name('website.setting');

//   ==================================Setting========================================



//
//   Route::get('admin/appointments' ,[\App\Http\Controllers\AuthController::class,'appointments'])->name('admin.appointments');
//
//   Route::get('admin/appointments/search_appoit' ,[\App\Http\Controllers\AuthController::class,'search_appoit'])->name('search_appoit');
//
//   Route::get('admin/add_appointment' ,[\App\Http\Controllers\AuthController::class,'add_appointment'])->name('admin.add_appointment');
//   Route::post('admin/create_appointment' ,[\App\Http\Controllers\AuthController::class,'create_appointment'])->name('admin.create_appointment');
//
//
//   Route::get('admin/edit_appointment/{id}' ,[\App\Http\Controllers\AuthController::class,'edit_appointment'])->name('admin.edit_appoint');
//
//
//   Route::post('admin/edit_appointment/{id}' ,[\App\Http\Controllers\AuthController::class,'update_appointment'])->name('admin.update_appointment');
//
//   Route::get('admin/delete_appointment/{id}' ,[\App\Http\Controllers\AuthController::class,'delete_appointment'])->name('admin.delete_appoint');
//
//   Route::get('admin/complate_appointment/{id}' ,[\App\Http\Controllers\AuthController::class,'complate_appointment'])->name('admin.complate_appoint');


//    Route::post('admin/appointments/search_appoit' ,[\App\Http\Controllers\AuthController::class,'appointments'])->name('search_appoit');

    Route::get('admin/posts' ,[\App\Http\Controllers\PostsController::class,'index'])->name('admin.posts');
    Route::get('admin/add_post' ,[\App\Http\Controllers\PostsController::class,'add_post'])->name('admin.add_post');
    Route::post('admin/create_post' ,[\App\Http\Controllers\PostsController::class,'create_post'])->name('admin.create_post');
    Route::get('admin/edit_post/{id}' ,[\App\Http\Controllers\PostsController::class,'edit_post'])->name('admin.edit_post');
    Route::get('admin/post_detail/{id}' ,[\App\Http\Controllers\PostsController::class,'post_detail'])->name('admin.post_detail');
    Route::post('admin/update_post/{id}' ,[\App\Http\Controllers\PostsController::class,'update_post'])->name('admin.update_post');
    Route::get('admin/delete_post/{id}' ,[\App\Http\Controllers\PostsController::class,'delete_post'])->name('admin.delete_post');



    //doctors

//    Route::get('admin/doctors' ,[\App\Http\Controllers\DoctorsController::class,'index'])->name('admin.doctors');
//    Route::get('admin/add_doctor' ,[\App\Http\Controllers\DoctorsController::class,'add_doctor'])->name('admin.add_doctor');
//    Route::post('admin/create_doctor' ,[\App\Http\Controllers\DoctorsController::class,'create_doctor'])->name('admin.create_doctor');
//    Route::get('admin/edit_doctor/{id}' ,[\App\Http\Controllers\DoctorsController::class,'edit_doctor'])->name('admin.edit_doctor');
//    Route::post('admin/update_doctor/{id}' ,[\App\Http\Controllers\DoctorsController::class,'update_doctor'])->name('admin.update_doctor');
//    Route::get('admin/delete_doctor/{id}' ,[\App\Http\Controllers\DoctorsController::class,'delete_doctor'])->name('admin.delete_doctor');
//    Route::get('admin/show_doctor/{id}' ,[\App\Http\Controllers\DoctorsController::class,'show_doctor'])->name('admin.show_doctor');
//


    //departments
//
//    Route::get('admin/departments' ,[\App\Http\Controllers\DepartmentsController::class,'index'])->name('admin.departments');
//    Route::get('admin/add_department' ,[\App\Http\Controllers\DepartmentsController::class,'add_department'])->name('admin.add_department');
//    Route::post('admin/create_department' ,[\App\Http\Controllers\DepartmentsController::class,'create_department'])->name('admin.create_department');
//    Route::get('admin/edit_department/{id}' ,[\App\Http\Controllers\DepartmentsController::class,'edit_department'])->name('admin.edit_department');
//    Route::post('admin/update_department/{id}' ,[\App\Http\Controllers\DepartmentsController::class,'update_department'])->name('admin.update_department');
//    Route::get('admin/delete_department/{id}' ,[\App\Http\Controllers\DepartmentsController::class,'delete_department'])->name('admin.delete_department');
//
//
//    Route::get('admin/notices' ,[\App\Http\Controllers\NoticesController::class,'index'])->name('admin.notices');
//    Route::get('admin/add_notice' ,[\App\Http\Controllers\NoticesController::class,'add_notice'])->name('admin.add_notice');
//    Route::post('admin/create_notice' ,[\App\Http\Controllers\NoticesController::class,'create_notices'])->name('admin.create_notice');
//    Route::get('admin/edit_notice/{id}' ,[\App\Http\Controllers\NoticesController::class,'edit_notice'])->name('admin.edit_notice');
//    Route::post('admin/update_notice/{id}' ,[\App\Http\Controllers\NoticesController::class,'update_notice'])->name('admin.update_notice');
//    Route::get('admin/delete_notice/{id}' ,[\App\Http\Controllers\NoticesController::class,'delete_notice'])->name('admin.delete_notice');
//

});

//   ==================================PasswordReset========================================
Route::get('password/forgot', [\App\Http\Controllers\AuthController::class, 'showForgotForm'])->name('password.forgot');
Route::post('password/forgot', [\App\Http\Controllers\AuthController::class, 'sendResetLink'])->name('password.email');

Route::get('password/reset/{token}', [\App\Http\Controllers\AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset/{token}', [\App\Http\Controllers\AuthController::class, 'resetPassword'])->name('password.update');


//   ==================================PasswordReset========================================


Route::get('login' ,[\App\Http\Controllers\AuthController::class,'login'])->name('login');
Route::post('login' ,[\App\Http\Controllers\AuthController::class,'loginPost'])->name('login.post');

Route::get('register' ,[\App\Http\Controllers\AuthController::class,'register'])->name('register');
Route::post('register' ,[\App\Http\Controllers\AuthController::class,'registerPost'])->name('register.post');


//====================website

Route::get('/' ,[\App\Http\Controllers\FrontEndController::class,'home'])->name('home');
Route::get('/category/{name}' ,[\App\Http\Controllers\FrontEndController::class,'categories'])->name('category.show');

Route::get('/post_detail/{id}' ,[\App\Http\Controllers\FrontEndController::class,'post_detail'])->name('post_detail');

Route::get('about' ,[\App\Http\Controllers\FrontEndController::class,'about'])->name('about');

Route::get('contact' ,[\App\Http\Controllers\FrontEndController::class,'contact'])->name('contact');

Route::post('/contact', [\App\Http\Controllers\ContactController::class, 'submit'])->name('contact.submit');

Route::post('/like-or-dislike', [\App\Http\Controllers\LikeController::class, 'likeOrDislike'])->name('like.or.dislike');












